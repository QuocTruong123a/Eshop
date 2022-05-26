<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(user $user ,role $role)
    {
        $this -> user = $user;
        $this -> role = $role;
    }
    public function index()
    {
        $user = $this ->user ->paginate(5);
        return view('Backend.user.list',compact('user'));
    }


    public function create()
    {
        $role = $this ->role -> all();
        return view('Backend.user.add',compact('role'));
    }

    public function store(Request $request)
    {
        $user = $this -> user -> create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);
        $roleIds = $request ->role_id;
        $user ->roles()->attach( $roleIds);
        return redirect()->back()->with('success','thêm thành công');
    }




    public function edit($id)
    {
        $user = $this -> user -> find($id);
        $roles = $this -> role -> all();
        $rolesofuser = $user -> roles;
        return view('Backend.user.edit',compact('user','roles','rolesofuser'));
    }


    public function update(Request $request, $id)
    {
        $this -> user -> find($id) -> update([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);
        $user = $this -> user -> find($id);

        $user ->roles()->sync($request ->role_id);
        return redirect()->route('user.list')->with('success','sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
