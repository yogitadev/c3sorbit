<?php

namespace App\Http\Controllers\admin\campaign\institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\campaign\Institution;

// Helper
use App\Helpers\Helper;

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
        if(!Helper::checkPermission('institutions.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $item = Institution::where('unique_id', $unique_id)->first();

        return view('admin.campaign.institutions.edit', [
            'item' => $item,
        ]);
    }
}
