<?php

namespace App\Actions\admin\iam\personnel;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class UpdateAction
{
    use AsAction;

    public function handle(User $item, Request $request)
    {
        if($request['type_id'] == 0 || $request['type_id'] == 'null') {
            $request['type_id'] = NULL;
        }

        $item->fill($request->all());
        
        if ($request->has('password') && !is_null($request->password)) {
            $item->password = Hash::make($request->password);
        }
        if ($request->has('media') && !is_null($request->file('media'))) {
            if (!is_null($item->media)) {
                Helper::deleteFile($item->media);
            }
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
        }

        $role_item = \Spatie\Permission\Models\Role::find($item->role_id);
        $item->syncRoles($role_item);
        return $item;
    }
}
