<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Media;


class FitWebpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($h = 100, $w = 100, $file_name = '', Request $request)
    {

        // Find Media Item from DB
             if ($file_name == 'no_image') {
            $file_path = 'uploads' . DIRECTORY_SEPARATOR . 'webp' . DIRECTORY_SEPARATOR . 'no_image.webp';
        }elseif ($file_name == 'no_team') {
            $file_path = 'uploads' . DIRECTORY_SEPARATOR . 'webp' . DIRECTORY_SEPARATOR . 'no_team.webp';
        } else {
            $media_item = Media::where('file_name', 'like', $file_name . '.%')->firstOrFail();
            $file_path = 'uploads' . DIRECTORY_SEPARATOR . 'webp' . DIRECTORY_SEPARATOR . $file_name . '.webp';
        }


        $img = Image::make($file_path)->fit($h, $w);

        return $img->response('webp');
    }
}
