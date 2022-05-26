<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\category;
use App\Components\Recusive;
use App\Http\Requests\RequestCategory;

class CategoryController extends Controller
{
    private $category;
    public function __construct(category $categoy)
    {
        $this -> htmlSlelect='';
        $this -> category = $categoy;
    }
    public function getCategory($parent_id){
        $data = $this -> category -> all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
      }
    public function list(){
        $categories = $this->category->paginate(8); 
        return view('Backend.category.list',compact('categories'));
    }
    public function add(){
        $htmlOption = $this -> getCategory( $parent_id ="") ;
        return view('Backend.category.add',compact('htmlOption'));
    }
    public function store(RequestCategory $request){
        $data = $request->validated();

        $this -> category -> create($data);
        return redirect()->back()->with('success','Thêm thành công');
    }
    public function edit($id){
        $categories = $this->category->find($id);
        $htmlOption = $this -> getCategory( $categories -> parent_id) ;
        return view('Backend.category.edit',compact('htmlOption','categories'));
    }
    public function update($id,RequestCategory $request){
        $data = $request->validated();
        $this ->  category-> find($id) ->update($data);
        return redirect()->route('category.list')->with('success','Sửa thành công');
    }
    public function delete($id){
        $category = category::where('parent_id',$id)->count();

        if($category == 0 ){
          $this -> category ->find($id) -> delete();
          return redirect()->route('category.list')->with('success','Xóa thành công') ;
        }
        else{
            return redirect()->route('category.list')->with('error','Không thể xóa') ;
        }

    }
}
