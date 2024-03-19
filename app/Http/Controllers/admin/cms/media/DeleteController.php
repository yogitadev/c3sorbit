<?php

namespace App\Http\Controllers\admin\cms\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;


// Models
use App\Models\cms\Media;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id, Request $request)
    {
        $item = Media::where('unique_id', $unique_id)->firstOrFail();

        if ($item->file_name != '') {
            Helper::deleteFile($item);
        }

        flash('Media File deleted Successfully.')->success();
    }
}
