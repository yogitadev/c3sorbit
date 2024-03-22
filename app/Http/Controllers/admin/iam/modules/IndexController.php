<?php

namespace App\Http\Controllers\admin\iam\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\module\Module;
use App\Models\iam\module\ModuleCategory;

// Helper
use App\Helpers\Helper;

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
        $params = $request->all();

        $list = Module::getDataList($params);

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('module-list') . '?' . implode('&', array_map($callback, array_keys($params), array_values($params))));
        }

        $category_list = ModuleCategory::order()->pluck('title', 'id');

        return view('admin.iam.modules.index', [
            'list' => $list,
            'params' => $params,
            'category_list' => $category_list,
        ]);
    }
}
