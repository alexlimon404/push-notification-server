<?php

namespace App\Http\Controllers\Image;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UploadImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
        return view('images.upload');
    }

    public function upload(ImageRequest $request)
    {
        $userId = Auth::id();
        $image = $request->file('imageFile');
        $result = Image::upload($image, $userId);
        return view('images.upload')
            ->with('success','Image Upload successfully')
            ->with('result', $result);
    }
}
