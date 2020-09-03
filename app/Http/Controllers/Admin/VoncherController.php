<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Voncher;
use Illuminate\Http\Request;
use App\Exports\VoncherExport;
use App\Imports\VoncherImport;
use App\Product;
use App\VoncherProduct;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class VoncherController extends Controller
{
    public function index()
    {
        $voncher = Voncher::paginate(10);
        return view('backend.voncher.index',compact('voncher'));
    }
    public function export()
    {
        return Excel::download(new VoncherExport,'voncher.xls');
    }
    public function import()
    {
        Excel::import(new VoncherImport,public_path('storage/voncher.xls'));
        return redirect()->route('admin.voncher.index')->with('success','Đã nhập thành công');
    }
    public function create()
    {
        $product =DB::table('products')->select('name','price2')->get();
        $voncher = Voncher::all();
        return view('backend.voncher.create',compact(['product','voncher']));
    }
}
