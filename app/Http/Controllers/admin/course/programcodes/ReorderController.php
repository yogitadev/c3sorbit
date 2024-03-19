<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\campaign\Campus;
use App\Models\campaign\Institution;
use App\Models\course\Programcode;

// Helper
use App\Helpers\Helper;

class ReorderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        $institution_list = Institution::order()->pluck('name', 'id');
        $data = [
            'institution_list' => $institution_list,
            'campus_list' => []
        ];

        if (($request->has('institution_id') && $request->get('institution_id') > 0)) {
            $data['program_code_list'] = Programcode::where('institution_id',$request->get('institution_id'))->where('campus_id',$request->get('campus_id'))->order()->get();
            $data['selected_institution_id'] = $request->get('institution_id');
        }
        if (($request->has('campus_id') && $request->get('campus_id') > 0)) {
            $campus_list = Campus::where('institution_id',$request->get('institution_id'))->order()->pluck('name','id');
            $data['campus_list'] = $campus_list;
            $data['program_code_list'] = Programcode::where('campus_id',$request->get('campus_id'))->where('campus_id',$request->get('campus_id'))->order()->get();
            $data['selected_campus_id'] = $request->get('campus_id');            
        }
        $list = Programcode::orderBy('sort_order', 'ASC')->get();
        return view('admin.course.programcodes.reorder', [
            'data' => $data
        ]);
    }
}
