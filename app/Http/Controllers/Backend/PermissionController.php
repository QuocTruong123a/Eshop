<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
class PermissionController extends Controller
{
    public function create(){
        return view('Backend.permission.add');
    }
    public function store(Request $request){
        $permission = Permission::create([
            'name' => $request -> module_parent,
            'display_name' => $request -> module_parent,
            'parent_id'=> 0
        ]); 
            foreach($request ->module_childrent as  $value){
                $permission = Permission::create( [
                    'name' => $value,
                    'display_name' => $value,
                    'parent_id'=> $permission -> id,
                    'key_code' => $request -> module_parent . '_' .$value
                ]);

            }


        return redirect()->back();
    }

}
