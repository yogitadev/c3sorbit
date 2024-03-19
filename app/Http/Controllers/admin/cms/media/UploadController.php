<?php

namespace App\Http\Controllers\admin\cms\media;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\media\UploadRequest;

// Models
use App\Models\cms\Media;


class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UploadRequest $request)
    {
        //

        if ($request->has('files') && count($request->file('files')) > 0) {
            foreach ($request->file('files') as $file) {
                Helper::uploadFile($file);
            }

            flash('Files has been uploaded Successfully.')->success();
            return redirect(route('media-list'));
        }
    }
}
