<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

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

        $item = User::where('unique_id', $unique_id)->first();

        return view('admin.iam.personnel.edit', [
            'item' => $item,
        ]);
    }
}
