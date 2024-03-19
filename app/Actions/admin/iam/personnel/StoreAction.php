<?php

namespace App\Actions\admin\iam\personnel;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $request['admin_type'] = 'Admin';
        if($request['type_id'] == 0) {
            $request['type_id'] = NULL;
        }
        $lastRawData = User::latest()->first();

        $item = User::create($request->all());
        if ($request->has('password') && !is_null($request->password)) {
            $item->password = Hash::make($request->password);
            $item->save();
        }
        if ($request->has('media') && !is_null($request->file('media'))) {
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
            $item->save();
        }
        if(!empty($lastRawData)) {
            $last_emp_code = $lastRawData->emp_code;
            $code = ltrim($last_emp_code, $last_emp_code[0]);
            $emp_code = $code + 1;
            $item->emp_code = 'E'.str_pad($emp_code, 5, '0', STR_PAD_LEFT);;
            $item->save();
        }
        $role_item = \Spatie\Permission\Models\Role::find($item->role_id);
        $item->syncRoles($role_item);
        return $item;
    }
}
