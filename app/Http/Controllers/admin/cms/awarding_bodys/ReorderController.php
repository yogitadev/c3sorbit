<?php

namespace App\Http\Controllers\admin\cms\awarding_bodys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\AwardingBody;

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
        if(!Helper::checkPermission('awarding_bodys.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $list = AwardingBody::orderBy('sort_order', 'ASC')->get();
        return view('admin.cms.awarding_bodys.reorder', [
            'list' => $list
        ]);
    }
}
