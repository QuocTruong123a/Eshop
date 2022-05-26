<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSetting;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this -> setting = $setting;
    }
    public function index()
    {
        $setting = $this -> setting -> paginate(5);
        return view('Backend.seting.list',compact('setting'));
    }


    public function create()
    {
      return view('Backend.seting.add');
    }

    public function store(RequestSetting $request)
    {
       $data = $request -> validated();
       $this -> setting ->create($data);
       return redirect()->back()->with('success','Thêm thành công');
    }


    public function edit($id)
    {
      $setting = $this->setting->find($id);
      return view('Backend.seting.edit',compact('setting'));
    }

    public function update(RequestSetting $request, $id)
    {
        $data = $request -> validated();
        $this -> setting ->find($id)->update($data);
        return redirect()->route('setting.list')->with('success','sửa thành công');
    }

    public function destroy($id)
    {
       $this->setting->find($id)->delete();
       return redirect()->route('setting.list')->with('success','Xóa thành công');
    }
}
