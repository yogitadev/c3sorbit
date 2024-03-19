<?php

namespace App\Http\Controllers\admin\cms\awarding_bodys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
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
        $item = AwardingBody::where('unique_id', $unique_id)->first();

        return view('admin.cms.awarding_bodys.edit', [
            'item' => $item,
        ]);
    }
}
