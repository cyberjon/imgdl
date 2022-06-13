<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Symfony\Component\HttpFoundation\File\File as UploadedFl;

class ImageController extends Controller
{
    private $targetDir = 'uploads';
    
    public function index(Request $request)
    {
        $images = Image::orderBy('created_at', 'desc');
        $total_images = $images->get()->count('id');
        $images = $images->paginate(10);
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
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $new = $this->targetDir.'/'.$name;
        if(!file_exists(public_path($new))){
            $file->move($this->targetDir, $name);
            $uploadedFile = new UploadedFl(public_path($new));
            $this->save($uploadedFile);
        }
        return redirect()->route('index');
    }

    public function storeDownload(Request $request)
    {
        $url = $request->get('url');
        $name = basename($url);
        $data = file_get_contents($url);
        $new = $this->targetDir.'/'.$name;
        if (!file_exists(public_path($new))) {
            file_put_contents(public_path($new), $data);
            $uploadedFile = new UploadedFl(public_path($new));
            $this->save($uploadedFile);
        }
        return redirect()->route('index');
    }

    private function save($imageFile)
    {
        try {
            $exif = exif_read_data($imageFile, 0, true);
            $brand = $exif["IFD0"]["Make"] ?? '';
            $camera = $exif["IFD0"]["Model"] ?? '';
            $software = $exif["IFD0"]["Software"] ?? '';
            $size = $exif["FILE"]["FileSize"] ?? '';
            $width = $exif["COMPUTED"]["Width"] ?? '';
            $height = $exif["COMPUTED"]["Height"] ?? '';
            $aperture = $exif["COMPUTED"]["ApertureFNumber"] ?? '';
            $shutterSpeed = $exif["EXIF"]["ExposureTime"] ?? '';
            $iso = $exif["EXIF"]["ISOSpeedRatings"] ?? '';
            $focalLength = $exif["EXIF"]["FocalLength"] ?? '';
            $lens = $exif["EXIF"]["UndefinedTag:0xA434"] ?? '';

            $image = new Image;
            $image->image_file = basename($imageFile);
            $image->brand = $brand;
            $image->camera = $camera;
            $image->software = $software;
            $image->size = $size;
            $image->width = $width;
            $image->height = $height;
            $image->aperture = $aperture;
            $image->shutter_speed = $shutterSpeed;
            $image->iso = $iso;
            $image->focal_length = $focalLength;
            $image->lens = $lens;
            $image->save();
        } catch (\Throwable $th) {
            //print_r($th);
        }
    }

    public function show(Request $request)
    {
        $id = $request->get('id');
        $image = Image::where('id', $id)->get();
        echo json_encode($image);
        die();
    }
}