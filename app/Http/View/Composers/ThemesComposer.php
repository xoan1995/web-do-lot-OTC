<?php
namespace App\Http\View\Composers;

use App\Category;
use App\ParentCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ThemesComposer
{
    public function compose(View $view)
    {
        $view->with('themes', DB::table('themes')->first());
        $view->with('code',DB::table('codes')->get());
        $view->with('menu',ParentCategory::where('showindex',1)->orderBy('sort_id','ASC')->get());
        $view->with('menutop',Category::where('checkmenutop',1)->get());
        $view->with('categoriesfooter',Category::all());
        $view->with('user',Auth::user());
    }
}
