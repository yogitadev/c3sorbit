<?php

namespace App\Models\lead_management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use DateTime;
use DB;

// Helper
use App\Helpers\Helper;

//Model
use App\Models\cms\Country;
use App\Models\course\Programcode;
use App\Models\iam\personnel\User;
use App\Models\cms\LectureStudentPresent;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    protected $connection = 'mysql';

    protected $table = 'students';

    protected $fillable = [
        'unique_id',
        'vista_id',
        'lead_date',
        'lead_time',
        'name',
        'country_id',
        'country_code',
        'mobile_number',
        'email_id',
        'programcode_id',
        'v_reference_no',
        'status', // 'Active','Inactive', 'Deleted'
    ];

    public $columnTitles = [
        'lead_date' => 'lead_date',
        'lead_time' => 'lead_time',
        'name' => 'name',
        'country_code' => 'country_code',
        'mobile_number' => 'mobile_number',
        'email_id' => 'email_id',
        'status' => 'Status',
        'v_reference_no' => 'Reference No'
    ];

    private static $searchColumns = [
        'all' => 'All',
        'students.unique_id' => 'unique_id',
        'students.name' => 'name',
        'students.mobile_number' => 'mobile_number',
        'students.email_id' => 'email_id',
        'students.vista_id' => 'vista_id',
    ];

    // Scopes

    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 'Active');
    }

    //Foreign Ref
   
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function programcode()
    {
        return $this->belongsTo(Programcode::class, 'programcode_id', 'id');
    }
    public function lecture_student_present()
    {
        return $this->belongsTo(LectureStudentPresent::class, 'id', 'student_id');
    }
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('STU', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateFrontListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['start_date']) && isset($params['end_date'])) {
            $from = Carbon::createFromFormat('Y-m-d', $params['start_date']);
            $to = Carbon::createFromFormat('Y-m-d', $params['end_date']);
    
            if($params['start_date'] != null && $params['start_date'] != '' && $params['end_date'] != null && $params['end_date'] != '') {
                //$query->whereBetween('students.created_at', [$from, $to]);
                $query->whereDate('students.created_at','>=', $from)
                        -> whereDate('students.created_at','<=',$to);
            }
            if($params['start_date'] != null && $params['start_date'] != '' && $params['end_date'] == null && $params['end_date'] == '') {
                $query->whereDate('students.created_at', $from);
            }
            if($params['start_date'] == null && $params['start_date'] == '' && $params['end_date'] != null && $params['end_date'] != '') {
                $query->whereDate('students.created_at', $to);
            }
        }
        if (isset($params['programcode_id']) && $params['programcode_id'] != null && $params['programcode_id'] != '') {
            $query->where('students.programcode_id', $params['programcode_id']);
        }
        if (isset($params['country_id']) && $params['country_id'] != null && $params['country_id'] != '') {
            $query->where('students.country_id', $params['country_id']);
        }
        
        if (isset($params['search_name']) && $params['search_name'] != null && $params['search_name'] != '') {
            $query->where(function ($q) use ($params) {
                $q->where('students.name',$params['search_name']);
                $q->orWhere('students.email_id',$params['search_name']);
                $q->orWhere('students.v_reference_no',$params['search_name']);
                $q->orwhereHas('country', function($qu) use($params) {
                    $qu->where('name', 'like', '%' . $params['search_name'] . '%');
                });
                $q->orwhereHas('user', function($qu) use($params) {
                    $qu->where('emp_code', 'like', '%' . $params['search_name'] . '%');
                });
                if (DateTime::createFromFormat('Y-m-d', $params['search_name']) !== false) {
                    $q->orWhere('students.lead_date',$params['search_name']);
                }
                $q->orwhereHas('programcode', function($qu) use($params) {
                    $qu->where('program_code', 'like', '%' . $params['search_name'] . '%');
                });
            });
        }
        
        //dd($params, $query->toSql());
        $list = null;
        if (isset($params['export']) && $params['export'] == true) {
            $list = $query->get();
        } else {
            $page_num = isset($params['page']) && $params['page'] > 0 ? $params['page'] : 1;
            $record_per_page = isset($params['per_page']) && $params['per_page'] > 0 ? $params['per_page'] : env('APP_RECORDS_PER_PAGE', 20);
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
            return '<strong><a href="' . route('edit-student', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
