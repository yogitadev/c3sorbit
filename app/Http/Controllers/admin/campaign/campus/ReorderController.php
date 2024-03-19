<?php

namespace App\Http\Controllers\admin\campaign\campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\campaign\Campus;
use App\Models\campaign\Institution;

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
            'institution_list' => $institution_list
        ];

        if (($request->has('institution_id') && $request->get('institution_id') > 0)) {
            $data['campus_list'] = Campus::where('institution_id',$request->get('institution_id'))->order()->get();
            $data['selected_institution_id'] = $request->get('institution_id');            
        }
        $list = Campus::orderBy('sort_order', 'ASC')->get();
        return view('admin.campaign.campus.reorder', [
            'data' => $data
        ]);
    }
}
