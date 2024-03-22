<?php

namespace App\Models\iam\module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'name',
        'title',
        'guard_name',
        'permission_to_all',
    ];
    protected $table = 'permissions';

    public static $searchColumns = [
        'all' => 'All',
        'permissions.title' => 'title',
        'permissions.name' => 'name',
    ];

    // Foreign Ref
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    public function permission_roles()
    {
        return $this->hasMany(RoleHasPermission::class, 'permission_id', 'id');
    }

    // Scopes
    public function scopeOrder($query) {
        return $query->orderBy('id', 'DESC');
    }

    public static function boot()
    {
        parent::boot();
    }

    public static function getDataList($params){
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(),$params,$all_search_fields);

        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            $query->orderBy($params['order_col'], $params['order_by']);
        } else {
            $query->order();
        }

        $list = null;
        if (isset($params['export']) && $params['export'] == true) {
            $list = $query->get();
        } else {
            $page_num = isset($params['page']) && $params['page'] > 0 ? $params['page'] : 1;
            $record_per_page = isset($params['per_page']) && $params['per_page'] > 0 ? $params['per_page'] : config('env.app_record_per_page');
            $list = $query->paginate($record_per_page, ['*'], 'page', $page_num);
        }
        return $list;

    }
}
