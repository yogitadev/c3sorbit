<?php

namespace App\Http\Controllers\admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Setting;

class UpdateController extends Controller
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
        $requestArr = $request->all();
        unset($requestArr['_token']);
        if (is_array($requestArr) && count($requestArr) > 0) {
            foreach ($requestArr as $key => $value) {
                $setting_item = Setting::where('setting_name', $key)->first();
                if (!is_null($setting_item)) {
                    $setting_item->update([
                        'setting_value' => $value,
                    ]);
                }
            }
        }
        flash('Settings Updated Successfully.')->success();
        return redirect(route('admin-setting'));
    }
}
