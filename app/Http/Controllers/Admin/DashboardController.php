<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{

    public function index()
    {
        if(Gate::allows('admin-users')){
            session()->flash('flash','Chào quản trị viên, bạn có tất cả quyền hạn !');
        };
        if(Gate::allows('edit-users')){
            session()->flash('flash','Chào biên tập viên, bạn chỉ có quyền đăng bài viết !');
        };
        if(Gate::allows('seller-users')){
            session()->flash('flash','Chào quản trị viên có mọi quyền / đại lý cấp 1 có quyền mua sản phẩm ưu đãi !');
        };
        if(Gate::allows('seller2-users')){
            session()->flash('flash','Chào đại lý cấp 2, bạn chỉ có quyền mua sản phẩm ưu đãi !');
        };
        if(Gate::allows('user-users')){
            session()->flash('flash','Chào user, bạn chờ admin duyệt quyền hạn nhé !');
        };
        return view('backend.index');
    }
}
