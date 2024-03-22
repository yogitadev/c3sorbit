<?php

namespace App\Http\Controllers\admin\campaign\campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\campaign\Campus;
use App\Models\campaign\Institution;

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
        if(!Helper::checkPermission('campus.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $item = Campus::where('unique_id', $unique_id)->first();

        $institution_list = Institution::pluck('name','id');

        return view('admin.campaign.campus.edit', [
            'item' => $item,
            'institution_list'=>$institution_list
        ]);
    }
}