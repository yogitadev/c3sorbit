<?php

namespace App\Http\Controllers\admin\campaign\institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\campaign\Institution;

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
        $list = Institution::orderBy('sort_order', 'ASC')->get();
        return view('admin.campaign.institutions.reorder', [
            'list' => $list
        ]);
    }
}
