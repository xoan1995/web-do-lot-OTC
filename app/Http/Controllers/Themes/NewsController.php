<?php

namespace App\Http\Controllers\Themes;

use App\Banner;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $banner = Banner::orderBy('sort_by')->get();
        $content = Category::where('type',2)->get();
        return view('frontend.about.index',compact('content','banner'));
    }
}
