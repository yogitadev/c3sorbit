<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;
use App\Models\lead_management\Student;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'activity_type',
        'log_type',
        //
        'user_id',
        //
        'title', 'action',
        'lead_id'
    ];
    protected $table = 'activity_logs';

    public static $searchColumns = [
        'all' => 'All',
        'activity_logs.unique_id' => 'unique_id',
        'activity_logs.activity_type' => 'activity_type',
        'activity_logs.log_type' => 'log_type',
        'activity_logs.title' => 'title',
        'activity_logs.action' => 'action',
        'users.first_name' => 'first_name',
        'users.last_name' => 'last_name',
    ];

    // Foreign Ref.
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'lead_id', 'id');
    }

    public function acitivity_log_items()
    {
        return $this->hasMany(ActivityLogItem::class);
    }

    public function acitivity_log_changes()
    {
        return $this->hasMany(ActivityLogChange::class);
    }

    // Scopes
    public function scopeOrder($query)
    {
        return $query->orderBy('activity_logs.id', 'DESC');
    }

    // Accessors
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != '' ? Helper::date_time_format_without_second($value) : null,
        );
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('ACT');
        });
    }


    public static function getDataList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields, 'activity_logs.created_at');

        $query->leftJoin('users', 'users.id', '=', 'activity_logs.user_id');
        $query->leftJoin('students', 'students.id', '=', 'activity_logs.lead_id');

        $query->select([
            'activity_logs.*',
            'users.first_name as user_first_name',
            'users.last_name as user_last_name',
            'students.name as student_name',
        ]);

        //Find by Lead id
        if (isset($params['lead_id']) && $params['lead_id'] != null && $params['lead_id'] != '') {
            $query->where('activity_logs.lead_id', $params['lead_id']);
        }

        if ((isset($params['subject']) && $params['subject'] != "") || (isset($params['subject_id']) && $params['subject_id'] != "")) {
            //$query->leftJoin('activity_log_items', 'activity_log_items.activity_log_id', '=', 'activity_logs.id');

            // Find by Subject
            if (isset($params['subject']) && $params['subject'] != "" && is_array($params['subject']) && count($params['subject']) > 0) {
                $query->whereHas('acitivity_log_items', function ($q1) use ($params) {
                    $q1->whereIn('subject', $params['subject']);
                    if (isset($params['subject_id']) && $params['subject_id'] != "") {
                        $q1->where('subject_id', $params['subject_id']);
                    }
                });
            } else {
                $query->whereHas('acitivity_log_items', function ($q2) use ($params) {
                    $q2->where('subject', $params['subject']);
                    if (isset($params['subject_id']) && $params['subject_id'] != "") {
                        $q2->where('subject_id', $params['subject_id']);
                    }
                });
            }

            // Find by Subject ID
            /*if (isset($params['subject_id']) && $params['subject_id'] != "") {
                $query->whereHas('acitivity_log_items',function($q2)use($params){
                    $q2->where('subject_id',$params['subject_id']);
                });
            }*/
        }

        // Find by Activity Type
        if (isset($params['activity_type']) && $params['activity_type'] != '') {

            $query->where('activity_logs.activity_type', $params['activity_type']);
        }

        // Find By log Type
        if (isset($params['log_type']) && $params['log_type'] != '') {
            if ($params['log_type'] == 'Personnel') {
                $query->whereNotNull('activity_logs.user_id');
            }

            if ($params['log_type'] == 'System') {
                $query->whereNotNull('activity_logs.user_id');
            }
        }

        // Only Customer Activity
        if (isset($params['customer_activity']) && $params['customer_activity'] != '') {
            $query->whereNotNull('activity_logs.customer_id');
        }

        if (isset($params['activity_from']) && $params['activity_from'] != '') {

            if($params['activity_from'] == 'Personnel'){
                $query->whereHas('user');
            }
            if($params['activity_from'] == 'System'){
                $query->whereDoesntHave('user');
            }

        }

        if(isset($params['model_name_arr']) && is_array($params['model_name_arr']) && count($params['model_name_arr']) > 0) {
            $permission_arr = $params['model_name_arr'];
            if(count($permission_arr) > 0){
                $query->whereHas('acitivity_log_items',function($q)use($permission_arr){
                    $q->whereIn('subject',$permission_arr);
                });
            }
        }

        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            if (in_array($params['order_col'], ['activity_type', 'log_type'])) {
                $query->orderBy(\DB::raw('CAST(' . $params['order_col'] . ' AS CHAR)'), $params['order_by']);
            } else {
                $query->orderBy($params['order_col'], $params['order_by']);
            }
        } else {
            $query->orderBy('activity_logs.id','desc'); //->order();
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

        $query->leftJoin('users', 'users.id', '=', 'activity_logs.user_id');

        $query->select([
            'activity_logs.*',
            'users.first_name as user_first_name',
            'users.last_name as user_last_name',
        ]);

        if ((isset($params['subject']) && $params['subject'] != "") || (isset($params['subject_id']) && $params['subject_id'] != "")) {
            //$query->leftJoin('activity_log_items', 'activity_log_items.activity_log_id', '=', 'activity_logs.id');

            // Find by Subject
            if (isset($params['subject']) && $params['subject'] != "" && is_array($params['subject']) && count($params['subject']) > 0) {
                $query->whereHas('acitivity_log_items', function ($q1) use ($params) {
                    $q1->whereIn('subject', $params['subject']);
                });
            } else {
                $query->whereHas('acitivity_log_items', function ($q2) use ($params) {
                    $q2->where('subject', $params['subject']);
                });
            }
        }


        // Find by Activity Type
        if (isset($params['activity_type']) && $params['activity_type'] != '') {
            $query->where('activity_logs.activity_type', $params['activity_type']);
        }


        if (isset($params['activity_from']) && $params['activity_from'] != '') {

            if($params['activity_from'] == 'Personnel'){
                $query->whereHas('user');
            }
            if($params['activity_from'] == 'System'){

                $query->whereDoesntHave('user');
            }

        }

        // Only Customer Activity
        if (isset($params['customer_activity']) && $params['customer_activity'] != '') {
            $query->whereNotNull('activity_logs.customer_id');
        }

        if(isset($params['model_name_arr']) && is_array($params['model_name_arr']) && count($params['model_name_arr']) > 0) {
            $permission_arr = $params['model_name_arr'];
            if(count($permission_arr) > 0){
                $query->whereHas('acitivity_log_items',function($q)use($permission_arr){
                    $q->whereIn('subject',$permission_arr);
                });
            }
        }

        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            $query->orderBy($params['order_col'], $params['order_by']);
        } else {
            $query->orderBy('id','desc'); //->order();
        }


        return $query;
    }


    public static function addLog($arr)
    {
        
        if (!isset($arr['activity_type'])) {
            $arr['activity_type'] = 'Manual';
        }

        $activity_log_item = self::create($arr);

        $log_item_arr = [];

        if (is_array($arr['log_items']) && count($arr['log_items']) > 0) {
            foreach ($arr['log_items'] as $subject => $subject_id) {

                // check for array
                if (is_array($subject_id) && count($subject_id) > 0) {
                    foreach ($subject_id as $sub_item_id) {
                        $log_item_arr[] = [
                            'subject' => $subject,
                            'subject_id' => $sub_item_id
                        ];
                    }
                } elseif (!is_array($subject_id) && $subject != null && $subject != '') {
                    $log_item_arr[] = [
                        'subject' => $subject,
                        'subject_id' => $subject_id
                    ];
                }

                /*elseif (!is_array($subject_id) && $subject_id != null && $subject_id != '' && $subject_id > 0) {
                    $log_item_arr[] = [
                        'subject' => $subject,
                        'subject_id' => $subject_id
                    ];
                }*/
            }

            if (is_array($log_item_arr) && count($log_item_arr) > 0) {
                $activity_log_item->acitivity_log_items()->createMany($log_item_arr);
            }
        }

        // changes
        if (isset($arr['changes']) && is_array($arr['changes']) && count($arr['changes']) > 0) {
            $activity_log_item->acitivity_log_changes()->createMany($arr['changes']);
        }

        return $activity_log_item;
    }
}
