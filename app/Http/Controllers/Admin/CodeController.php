<?php

namespace App\Http\Controllers\Admin;

use App\Code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index()
    {
        $code = Code::paginate(10);
        return view('backend.code',compact('code'));
    }
    public function store(Request $request)
    {
        $data= $request->only([
            'name','header','body','footer'
        ]);
        $code = Code::create($data);
        $code->save();
        return redirect()->route('admin.code.index');
    }
    public function destroy($id)
    {
        Code::findOrFail($id)->delete();
        return redirect()->route('admin.code.index');
    }
}
