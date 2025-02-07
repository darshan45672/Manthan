<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    public function index(){
        $gallery = Cache::remember('gallery_index', 600, function () {
            return Gallery::all();
        });
        return view("gallery.index", compact("gallery"));
    }

    public function show($id){
        $gallery = Cache::remember("gallery_show_{$id}", 600, function () use ($id) {
            return Gallery::find($id);
        });
        
        return view('gallery.show', compact('gallery'));
    }
}
