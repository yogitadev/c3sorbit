<?php

namespace App\Http\Controllers\admin\cms\countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Country;

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

        $list = Country::getAdminList($params);

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('country-list') . '?' . Helper::generateQueryString($params));
        }

        return view('admin.cms.countries.index', [
            'list' => $list,
            'params' => $params,
        ]);
    }
}
