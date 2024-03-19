<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

class ActivityLogItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        //
        'activity_log_id',
        //
        'subject',
        'subject_id',
    ];

    protected $table = 'activity_log_items';

    public static $searchColumns = [
        'all' => 'All',
        'activity_logs.unique_id' => 'unique_id',
        'activity_logs.activity_type' => 'activity_type',
        'activity_logs.log_type' => 'log_type',
        'activity_logs.title' => 'title',
        'activity_logs.action' => 'action',

    ];


    public function scopeOrder($query)
    {
        return $query->orderBy('activity_log_items.id', 'DESC');
    }


    // Foreign Ref.
    public function activity_log()
    {
        return $this->belongsTo(ActivityLog::class, 'activity_log_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('AI');
        });
    }

    public static function getDataList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);

        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields, 'activity_logs.created_at');
        $query->leftJoin('activity_logs', 'activity_logs.id', 'activity_log_items.activity_log_id');
        $query->leftJoin('locations', 'locations.id', 'activity_logs.location_id');

        $query->select([
            \DB::raw('activity_log_items.subject_id'),
            \DB::raw('activity_log_items.subject'),
            \DB::raw('activity_log_items.activity_log_id'),
        ]);

        if ((isset($params['subject']) && $params['subject'] != "") || (isset($params['subject_id']) && $params['subject_id'] != "")) {
            if (isset($params['subject']) && $params['subject'] != "" && is_array($params['subject']) && count($params['subject']) > 0) {
                $query->whereIn('activity_log_items.subject', $params['subject']);
            } else {
                $query->where('activity_log_items.subject', $params['subject']);
            }

            if (isset($params['subject_id']) && $params['subject_id'] != "") {
                $query->where('activity_log_items.subject_id', $params['subject_id']);
            }
        }

        if(isset($params['user_id']) && !is_null($params['user_id']) && $params['user_id'] > 0) {
            $query->where('activity_logs.user_id',$params['user_id']);
        }

        if(isset($params['model_name_arr']) && is_array($params['model_name_arr']) && count($params['model_name_arr']) > 0) {
            $permission_arr = $params['model_name_arr'];
            if(count($permission_arr) > 0){
                $query->whereIn('activity_log_items.subject',$permission_arr);
            }
        }

        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            if (in_array('activity_logs.'.$params['order_col'], ['activity_type', 'log_type'])) {
                $query->orderBy(\DB::raw('CAST(activity_logs.' . $params['order_col'] . ' AS CHAR)'), $params['order_by']);
            } else {
                $query->orderBy('activity_logs.'.$params['order_col'], $params['order_by']);
            }
        } else {
            $query->orderBy('activity_log_items.id','desc'); //->order();
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

    public static function getExportListQuery($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);

        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields, 'activity_logs.created_at');
        $query->leftJoin('activity_logs', 'activity_logs.id', 'activity_log_items.activity_log_id');
        $query->leftJoin('locations', 'locations.id', 'activity_logs.location_id');

        $query->select([
            \DB::raw('activity_log_items.subject_id'),
            \DB::raw('activity_log_items.subject'),
            \DB::raw('activity_log_items.activity_log_id'),
        ]);

        if ((isset($params['subject']) && $params['subject'] != "") || (isset($params['subject_id']) && $params['subject_id'] != "")) {
            if (isset($params['subject']) && $params['subject'] != "" && is_array($params['subject']) && count($params['subject']) > 0) {
                $query->whereIn('activity_log_items.subject', $params['subject']);
            } else {
                $query->where('activity_log_items.subject', $params['subject']);
            }

            if (isset($params['subject_id']) && $params['subject_id'] != "") {
                $query->where('activity_log_items.subject_id', $params['subject_id']);
            }
        }

        if(isset($params['user_id']) && !is_null($params['user_id']) && $params['user_id'] > 0) {
            $query->where('activity_logs.user_id',$params['user_id']);
        }


        if(isset($params['model_name_arr']) && is_array($params['model_name_arr']) && count($params['model_name_arr']) > 0) {
            $permission_arr = $params['model_name_arr'];
            if(count($permission_arr) > 0){
                $query->whereIn('subject',$permission_arr);
            }
        }

        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            if (in_array('activity_log_items.'.$params['order_col'], ['activity_type', 'log_type'])) {
                $query->orderBy(\DB::raw('CAST(activity_log_items.' . $params['order_col'] . ' AS CHAR)'), $params['order_by']);
            } else {
                $query->orderBy('activity_log_items.'.$params['order_col'], $params['order_by']);
            }
        } else {
            $query->orderBy('id','desc'); //->order();
        }

        $query->with('activity_log');

        return $query;
    }



}
