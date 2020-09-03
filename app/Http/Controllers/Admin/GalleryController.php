<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function galleryIndex(){
        $gallery = Gallery::all();
        return view('backend.gallery.gallery',compact('gallery'));
    }
    public function gallery(Request $request)
    {
        $image = $request->file('file');
        foreach($image as $item)
        {
            $name = $item->getClientOriginalName();
            $item->move(public_path('storage/gallery'),$name);

            $upload = new Gallery();
            $upload->img=$name;
            $upload->save();
        }

        return redirect()->route('admin.thu-vien.gallery.show');
    }

    public function galleryDestroy(Request $request)
    {
        $deletefile= $request->productcarousel;
        foreach($deletefile as $item)
        {
            Gallery::FindOrFail($item)->delete();
        }
        return redirect()->back();
    }
}
