<?php

namespace App\Models\iam\module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'module_category_id',
        'title',
        'name',
        'permissions',
        'permission_options',
        'sort_order',
        //
        'need_set_permissions', // ['Yes', 'No']
        'permission_updated_at',
        'permission_updated_user_id',
    ];
    protected $table = 'modules';


    public static $searchColumns = [
        'all' => 'All',
        'modules.title' => 'title',
        'modules.name' => 'name',
        'modules.unique_id' => 'unique_id',
    ];

    // Foreign Ref
    public function category()
    {
        return $this->belongsTo(ModuleCategory::class, 'module_category_id', 'id');
    }

    public function permission_updated_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function module_permissions()
    {
        return $this->hasMany(Permission::class)->with('permission_roles');
    }

    public function permissions() {
        return $this->hasMany('Spatie\Permission\Models\Permission');
    }

    // Scopes
    public function scopeOrder($query)
    {
        return $query->orderBy('need_set_permissions', 'ASC');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('MODL');
        });
    }

    public static function getDataList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['module_category_id']) && $params['module_category_id'] != '') {
            $query->where('module_category_id', $params['module_category_id']);
        }

        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            if (in_array($params['order_col'], ['need_set_permissions'])) {
                $query->orderBy(\DB::raw('CAST(modules.' . $params['order_col'] . ' AS CHAR)'), $params['order_by']);
            } else {
                $query->orderBy('modules.'.$params['order_col'], $params['order_by']);
            }
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


    /*
    * Function Name     :   getActivityTitle
    * Use               :   Use for Activity Log
    *
    */
    public function getActivityTitle($add_link = true)
    {
        if ($add_link) {
            return '<strong><a href="' . route('module-list') . '" target="_blank">' . $this->title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
