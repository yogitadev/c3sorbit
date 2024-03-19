<?php

namespace App\Models\Iam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'legacy_id',
        'unique_id',
        'name',
        'guard_name',
        'short_name',
        'status', // 'Active','Inactive'
        'sort_order',
    ];
    protected $table = 'roles';

    public $columnTitles = [
        'name' => 'Name',
        'short_name' => 'Short Name',
        'status' => 'Status',
    ];

    public static $searchColumns = [
        'all' => 'All',
        'roles.name' => 'name',
        'roles.short_name' => 'short_name',
        'roles.unique_id' => 'unique_id',
    ];

    // Foreign Ref
    
    // Scopes
    public function scopeOrder($query)
    {
        return $query->orderBy('id', 'ASC');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function user($query)
    {
        return $query->where('status', 'active');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('ROLE');
        });
    }

    public static function getDataList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['status']) && $params['status'] != '') {
            $query->where('status', $params['status']);
        }

        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            if (in_array($params['order_col'], ['status'])) {
                $query->orderBy(\DB::raw('CAST(roles.'.$params['order_col'].' AS CHAR)'), $params['order_by']);
            }else{
                $query->orderBy('roles.'.$params['order_col'], $params['order_by']);
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
            return '<strong><a href="' . route('edit-role', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->name . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->name . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
