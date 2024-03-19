<?php

namespace App\Http\Controllers\admin\person\faculties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\person\Faculty;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id, Request $request)
    {
        if(!Helper::checkPermission('faculties.edit')){
            return redirect()->route('admin-dashboard');
        }

        $item = Faculty::where('unique_id', $unique_id)->first();

        return view('admin.person.faculties.edit', [
            'item' => $item,
        ]);
    }
}
