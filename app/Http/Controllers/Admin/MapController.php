<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $maps = Map::FirstOrFail();
        return view('backend.map.index',compact('maps'));
    }
    public function update(Request $request,$id){
        $data = $request->all();
        Map::FindOrFail($id)->update($data);
        return redirect()->route('admin.maps.index');
    }
}
