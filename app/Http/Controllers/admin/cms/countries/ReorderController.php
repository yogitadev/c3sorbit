<?php

namespace App\Http\Controllers\admin\cms\countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Country;

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
        
        $list = Country::orderBy('sort_order', 'ASC')->get();
        return view('admin.cms.countries.reorder', [
            'list' => $list
        ]);
    }
}
