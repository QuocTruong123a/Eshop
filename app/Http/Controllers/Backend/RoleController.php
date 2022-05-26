<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
class RoleController extends Controller
{
    private $role;
    private $permission;

    public function __construct( Role $role,Permission $permission)
    {
        $this -> role = $role;
        $this -> permission = $permission;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = $this -> role -> paginate(10);
        return view('Backend.role.list',compact('role'));
    }

       public function create()
    {
        $permissions = $this ->permission->where('parent_id',0)->get();
        return view('Backend.role.add',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $this -> role -> create([
            'name' => $request -> name,
            'display_name' => $request -> display_name
          ]);
          $role ->permissions()->attach($request -> permission_id);
          return redirect()->back();
    }



    public function edit($id)
    {
        $permissions = $this ->permission->where('parent_id',0)->get();
        $role = $this -> role -> find($id);
        $permissionchecked = $role ->permissions;
        return view('Backend.role.edit',compact('permissions','role','permissionchecked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = $this -> role ->find($id);
        $role -> update([
            'name' => $request -> name,
            'display_name' => $request -> display_name
          ]);
          $role ->permissions()->sync($request -> permission_id);
          return redirect()->route('role.list');
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
