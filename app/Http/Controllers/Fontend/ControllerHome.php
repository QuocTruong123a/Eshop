<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\category;
use App\Models\Slider;
use App\Models\Menu;
class ControllerHome extends Controller
{

    public function show(){
        $sliders = Slider::all();
        $category = Category::all();
        $menus = Menu::where('parent_id',0)->get();
        $categorys = category::where('parent_id',0)->paginate(4);
        $categoryss = category::where('parent_id',0)->get();
       return view('Fontend.Home',compact('category','sliders','menus','categorys','categoryss'));
    }

    public function addTocart($id,Request $request){

        $product = Product::find($id);
        $carts =  session()->get('cart');
        if(isset($carts[$id])){
            $carts[$id]['quantity']=$carts[$id]['quantity']+1;
        }else{
            $carts[$id]=[
               'id' => $product -> id,
               'name' => $product -> name,
               'price' => $product ->price,
               'quantity' => 1,
               'image' => $product ->feature_image_path,
            ];
        }
        session()->put('cart',$carts);

    }
    public function detail(Request $request){
        $orders =  session() ->get('cart');
         return view('Fontend.Cart',compact('orders'));
      }
      public function cart(Request $request){

        $orders = session() ->get('cart');

        $orders[$request -> id]['quantity']=$request -> quatity;

        session() ->put('cart',  $orders);

       $orders = session()->get('cart');
       session() -> order -> create([
         'customer_id' =>  auth() -> id(),
         'total' => $orders[$request -> id]['quantity'] *  $orders[$request -> id]['price']
       ]);

    }
    public function cartdelete(Request $request){
        $carts = session()->get('cart');

        unset($carts[$request -> id]);

        session()->put('cart',$carts);

        $carts = session()->get('cart');

      }
     public function checkout(){
        $orders =  session() ->get('cart');
         return view('Fontend.checkout',compact('orders'));
     }
     public function login(){
         return view('Fontend.login.login');
     }
     public function postlogin(Request $request)
     {
         $remember = $request -> has ('remember_me')?true:false;
         if(auth() -> attempt([
             'email'=>$request->email,
             'password' => $request ->password
         ],$remember)){
             return redirect()->to('/Eshop/Home');
         }
     }
     public function checkouts(Request $request){
          $orders = order::create([
              'customer_id' => auth()->id(),
              'total'=> $request->total
          ]);
         $carts =  session() ->get('cart');
          foreach($carts as $test){
            $orders ->details() ->create([
                    'product_id' => $test['id'],
                    'quantity' => $test['quantity'],
                    'price' => $test['price']*$test['quantity']
           ]);
        }
        return redirect()->route('home');
           //-- take array insert in on mysql -- \\

        // $orders =  session() ->get('cart');
        // foreach($orders as $test){
        //    orderdetail::create([
        //             'order_id'=> 1,
        //             'product_id' => $test['id'],
        //             'quantity' => $test['quantity'],
        //             'price' => $test['price']*$test['quantity']
        //    ]);
        // }


            // -- insert array in mysql --\\

        //  $orders = order::create([
        //       'customer_id' => 1,
        //       'total'=> $request->total
        //   ]);
        //    $data = $request -> all();
        //    foreach ($data['product_id'] as $index => $employeeNumber){
        //     $orders ->details()->create([
        //         'product_id' => $employeeNumber,
        //         'quantity' =>$data['quantity'][$index],
        //         'price' =>$data['price'][$index]
        //       ]);
        //    }
     }
}
