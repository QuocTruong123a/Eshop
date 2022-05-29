<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestMenu;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Components\MenuRecusive;
class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(Menu $menu,MenuRecusive $menuRecusive){
        $this -> menu = $menu;
        $this -> menuRecusive = $menuRecusive;
    }

    public function index()
    {
        $menus = $this -> menu -> paginate(8);
        return view('Backend.menu.list',compact('menus'));
    }


    public function create()
    {
        $optionSelect = $this -> menuRecusive -> menuRecusiveAdd();
        return view('Backend.menu.add',compact('optionSelect'));
    }


    public function store(RequestMenu $requestMenu)
    {

        $data = $requestMenu-> validated();
        $this -> menu -> create($data);
        return redirect()->back()->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $menu = $this -> menu->find($id);
        $optionSelect = $this -> menuRecusive ->  menuRecusiveEdit($menu->parent_id);
        return view('Backend.menu.edit',compact('menu','optionSelect'));
    }

  
    public function update(RequestMenu $request, $id)
    {
        $data = $request -> validated();
        $this -> menu ->find($id)->update($data);
        return redirect()->route('menu.list')->with('success','Sửa thành công');
    }


    public function destroy($id)
    {
        $menu = menu::where('parent_id',$id)->count();

        if($menu == 0 ){
          $this -> menu ->find($id) -> delete();
          return redirect()->route('menu.list')->with('success','Xóa thành công') ;
        }
        else{
            return redirect()->route('menu.list')->with('error','Không thể xóa') ;
        }
    }
}
