<?php

namespace App\Models\iam\module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

class ModuleCategory extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'unique_id',
        'title',
        'sort_order',
    ];
    protected $table = 'module_categories';

    public static $searchColumns = [
        'all' => 'All',
        'module_categories.title' => 'title',
        'module_categories.unique_id' => 'unique_id',
    ];

    // Foreign Ref
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    // Scopes
    public function scopeOrder($query)
    {
        return $query->orderBy('sort_order', 'ASC');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('MDCT');
        });
    }

    public static function getDataList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

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
