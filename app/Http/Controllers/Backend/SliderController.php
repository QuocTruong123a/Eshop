<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSlider;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
class SliderController extends Controller
{
    use StorageImageTrait;
    private $slider;

    public function __construct(slider $slider)
    {
        $this -> slider = $slider;
    }
    public function index()
    {
        $sliders = $this -> slider ->paginate(5);
        return view('Backend.slider.list',compact('sliders'));
    }


    public function create()
    {
         return view('Backend.slider.add');
    }

    public function store(RequestSlider $request)
    {
        $UploadSlider=[
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $uploadImage = $this -> storageTraitUpload($request,'image_path','slider');
        if(!empty( $uploadImage)){
            $UploadSlider['image_path']=$uploadImage['file_path'];
            $UploadSlider['image_name']=$uploadImage['file_name'];
         }
       $this -> slider -> create($UploadSlider);
       return redirect()->back()->with('success','Thêm Slider thành công');
    }


    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('Backend.slider.edit',compact('slider'));
    }

    public function update(RequestSlider $request, $id)
    {
        $UploadSlider=[
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $uploadImage = $this -> storageTraitUpload($request,'image_path','slider');
        if(!empty( $uploadImage)){
            $UploadSlider['image_path']=$uploadImage['file_path'];
            $UploadSlider['image_name']=$uploadImage['file_name'];
         }
       $this -> slider ->find($id)-> update($UploadSlider);
       return redirect()->route('slider.list')->with('success','Sửa thành công Slider');
    }

    public function destroy($id)
    {
        $this -> slider -> find($id)->delete();
        return redirect()->route('slider.list')->with('success','Xóa thành công ');
    }
}
