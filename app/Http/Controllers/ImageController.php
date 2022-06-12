<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;

class ImageController extends Controller
{

    public function index(Request $request)
    {
        $images = Image::orderBy('created_at', 'desc');
        $total_images = $images->get()->count('id');
        $images = $images->paginate(20);
        return view('images.index', compact('images','total_images'));
    }

    public function download()
    {
        return view('images.download');
    }

    public function upload()
    {
        return view('images.upload');
    }

    public function storeUpload(Request $request)
    {
        Image::create($request->all());
        return redirect()->route('images.index');
    }

    public function storeDownload(Request $request)
    {
        Image::create($request->all());
        return redirect()->route('images.index');
    }

    public function show(Request $request)
    {
        $id = $request->get('id');
        $image = Image::where('id', $id)->get();
        echo json_encode($image);
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return back();
    }

}