<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\order;
use App\Models\Slider;

class ControllerCategory extends Controller
{
    public function index($slug,$categoryId)
    {
        $orders =  session() ->get('cart');
        // $products = product::Latest()->paginate(5);
        $products = Product::where('category_id',$categoryId)->paginate(1);
        $category = Category::all();
        $sliders = Slider::all();
        return view('Fontend.Product',compact('products','orders','category','sliders'));
    }
    public function productdetail($slug,$id){
        $category = Category::all();
        $sliders = Slider::all();
        $products = Product::where('id',$id)->get();
        $order = order::select('id')->get();;
        return view('Fontend.Category.Product',compact('category','sliders','products','order'));
    }
    public function order(Request $request,$id){

        $product = Product::find($id);
        $quantity = $request -> quantity;
        $total = $request -> total;
        $carts =  session()->get('oder');
        if(isset($carts[$id])){
            $carts[$id]['quantity']=$carts[$id]['quantity']+$request -> quantity;
        }else{
            $carts[$id]=[
               'id' => $product -> id,
               'quantity' =>$quantity
            ];
            
        }
        session()->put('oder',$carts);
        $carts =  session()->get('oder');
        dd($carts);

     }
}
