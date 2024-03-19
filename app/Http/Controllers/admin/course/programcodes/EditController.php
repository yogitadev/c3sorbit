<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\course\Programcode;
use App\Models\campaign\Campus;
use App\Models\campaign\Institution;
use App\Models\cms\AwardingBody;

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
        if(!Helper::checkPermission('programcodes.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $item = Programcode::where('unique_id', $unique_id)->first();

        $institution_list = Institution::pluck('name','id');
        $campus_list = Campus::where('institution_id',$item->institution_id)->pluck('name','id');
        $awarding_body_list = AwardingBody::pluck('title','id');
        $month_list = [];
        for($i=1;$i<70;$i++) {
            $month_list[$i.' Month'] = $i.' Month';
        }

        return view('admin.course.programcodes.edit', [
            'item' => $item,
            'institution_list'=>$institution_list,
            'campus_list'=>$campus_list,
            'awarding_body_list' => $awarding_body_list,
            'month_list' => $month_list,
        ]);
    }
}
