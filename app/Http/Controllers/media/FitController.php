<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Media;


class FitController extends Controller
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
            $file_path = 'uploads' . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . 'no_image.jpg';

        }else if ($file_name == 'no_team') {
            $file_path = 'uploads' . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . 'no_team.jpg';

        } else {
            $media_item = Media::where('file_name', 'like', $file_name . '.%')->firstOrFail();
            $file_path = 'uploads' . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $media_item->file_name;
        }

        $img = Image::make($file_path)->fit($w, $h);

        return $img->response('png');
    }
}
