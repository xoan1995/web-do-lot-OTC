<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $roles = Role::all();
        return view('backend.usermanager.index',compact('user','roles'));
    }
    public function create()
    {
        return view('backend.usermanager.create');
    }
    public function store(Request $request)
    {
        $data=[
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ];
        $user = User::create($data);
        $role = Role::select('id')->where('name','user')->first();

        User::FindOrFail($user->id)->roles()->attach($role);
        return redirect()->route('admin.nguoi-dung.index')->with('success','Tạo thành công');
    }
    public function update(Request $request,$id)
    {
        $data=[
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ];
        User::FindOrFail($id)->roles()->sync($request->roles);
        User::FindOrFail($id)->update($data);
        return redirect()->route('admin.nguoi-dung.index')->with('update','Cập nhật thành công');
    }
    public function destroy($id)
    {
        User::FindOrFail($id)->roles()->detach();
        User::FindOrFail($id)->delete();
        return redirect()->route('admin.nguoi-dung.index')->with('delete','Xóa thành công');
    }
}
