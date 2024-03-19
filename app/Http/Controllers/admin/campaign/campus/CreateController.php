<?php

namespace App\Http\Controllers\admin\campaign\campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;
    
// Models
use App\Models\campaign\Institution;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $institution_list = Institution::pluck('name','id');
        return view('admin.campaign.campus.create', [
            'institution_list'=>$institution_list
        ]);
    }
}
