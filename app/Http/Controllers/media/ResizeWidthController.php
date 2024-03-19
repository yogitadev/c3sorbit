<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;


// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Media;


class ResizeWidthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($w = 100, $file_name = '', Request $request)
    {
        // Find Media Item from DB
        $media_item = Media::where('file_name', 'like', $file_name . '.%')->firstOrFail();

        $file_path = 'uploads' . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $media_item->file_name;

        $img = Image::make($file_path)->widen($w, function ($constraint) {
            $constraint->upsize();
        });

        return $img->response('jpg');
    }
}
