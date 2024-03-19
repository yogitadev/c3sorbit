<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\campaign\Institution;
use App\Models\cms\AwardingBody;

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
        if(!Helper::checkPermission('programcodes.add')){
            return redirect()->route('admin-dashboard');
        }
        
        $institution_list = Institution::pluck('name','id');
        $awarding_body_list = AwardingBody::pluck('title','id');
        $month_list = [];
        for($i=1;$i<70;$i++) {
            $month_list[$i.' Month'] = $i.' Month';
        }
       
        return view('admin.course.programcodes.create', [
            'institution_list'=>$institution_list,
            'campus_list' => [],
            'awarding_body_list' => $awarding_body_list,
            'month_list' => $month_list,
        ]);
    }
}
