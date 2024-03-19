<?php

namespace App\Http\Controllers\admin\cms\countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Country;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {

        $item = Country::where('id', $id)->first();

        return view('admin.cms.countries.edit', [
            'item' => $item,
        ]);
    }
}
