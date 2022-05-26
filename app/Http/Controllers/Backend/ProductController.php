<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Components\Recusive;
use App\Http\Requests\RequestProduct;
use App\Traits\StorageImageTrait;
class ProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $category;
    public function __construct(product $product, category $category)
    {
        $this->product = $product;
        $this->category = $category;
        $this->htmlSlelect='';
    }
    public function getCategory($parent_id){
        $request = $this -> category -> all();
        $recusive = new Recusive($request);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
      }
    public function index()
    {
        $products = $this -> product ->paginate(6);
        return view('Backend.product.list',compact('products'));
    }


    public function create()
    {
        $htmlOption = $this -> getCategory( $parent_id ="") ;
        return view('Backend.product.add',compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduct $request)
    {

          $ProductCreate=[
            'name' =>  $request -> name,
            'price' =>  $request-> price,
            'content' =>  $request -> content,
            'category_id' =>  $request -> category_id
          ];
          $Upload = $this ->storageTraitUpload($request ,'feature_image_path','product');
          if(!empty($Upload)){
            $ProductCreate['feature_image_path']=$Upload['file_path'];
            $ProductCreate['feature_image_name']=$Upload['file_name'];
        }
        $products = $this ->product -> create($ProductCreate);
        if($request -> hasfile('image_path')){
            foreach($request -> image_path as $fileItem){
                $ProductImage = $this -> storageTraitUploadMutiple($fileItem,'product');
                $products->images()->create([
                    'image_path' =>$ProductImage['file_path']
                ]);
            }
        }
            return redirect()->back()->with('success','Thêm thành công');
    }


    public function edit($id)
    {
        $products = $this -> product -> find($id);
        $htmlOption = $this -> getCategory( $products -> category_id) ;
        return view('Backend.product.edit',compact('products','htmlOption'));
    }


    public function update(RequestProduct $request, $id)
    {
        $Uploadproduct=[
            'name'=>$request->name,
            'price'=>$request->price,
            'content'=>$request->content,
            'category_id'=>$request->category_id
        ];
        $dataUpload = $this ->storageTraitUpload($request,'image_path','slider');
        if(!empty($dataUpload)){
            $Uploadproduct['feature_image_path']=$dataUpload['file_path'];
            $Uploadproduct['feature_image_name']=$dataUpload['file_name'];
        }
        $this->product->find($id)->update($Uploadproduct);
        $product = $this->product->find($id);
        if($request -> hasfile('image_path')){
            $this->productImage->where('product_id',$id)->delete();
            foreach($request->image_path as $fileItem){
                $ProductImage = $this->storageTraitUploadMutiple($fileItem,'product');
                $product->images()->create([
                    'image_path' =>$ProductImage['file_path']
                ]);
            }
        }
        return redirect()->route('product.list')->with('success','Sửa thành công');
    }

    public function destroy($id)
    {
        $this -> product -> find($id)->delete();
        return redirect()->route('product.list')->with('success','Xóa thành công ');
    }

}
