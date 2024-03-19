<?php

namespace App\Http\Controllers\admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Setting;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $params = $request->all();
        $setting_list = Setting::get();
        return view('admin.settings.index', [
            'setting_list' => $setting_list,
            'params' => $params,
        ]);
    }
}
