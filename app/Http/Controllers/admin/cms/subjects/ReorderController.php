<?php

namespace App\Http\Controllers\admin\cms\subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Subject;
use App\Models\course\Programcode;

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
        if(!Helper::checkPermission('subjects.edit')){
            return redirect()->route('admin-dashboard');
        }

        $programcode_list = Programcode::order()->pluck('program_name', 'id');
        $data = [
            'programcode_list' => $programcode_list
        ];

        if (($request->has('programcode_id') && $request->get('programcode_id') > 0)) {
            $data['subject_list'] = Subject::where('programcode_id',$request->get('programcode_id'))->order()->get();
            $data['selected_programcode_id'] = $request->get('programcode_id');            
        }
        $list = Subject::orderBy('sort_order', 'ASC')->get();
        return view('admin.cms.subjects.reorder', [
            'data' => $data
        ]);
    }
}
