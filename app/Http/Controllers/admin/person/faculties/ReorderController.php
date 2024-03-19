<?php

namespace App\Http\Controllers\admin\person\faculties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\person\Faculty;

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
        
        $list = Faculty::orderBy('sort_order', 'ASC')->get();
        return view('admin.person.faculties.reorder', [
            'list' => $list
        ]);
    }
}
