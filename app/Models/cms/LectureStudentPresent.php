<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

//Models
use App\Models\course\Programcode;
use App\Models\cms\Subject;
use App\Models\cms\LectureSchedule;
use App\Models\lead_management\Student;

class LectureStudentPresent extends Model
{
    use HasFactory;

    protected $table = 'lecture_student_presents';

    protected $fillable = [
        'unique_id',
        'programcode_id',
        'subject_id',
        'lecture_id',
        'student_id',
        'lecture_date',
        'status', // 'Present','Absent'

    ];

    public $columnTitles = [
        'lecture_date' => 'Lecture Date',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'lecture_student_presents.unique_id' => 'Unique ID',
        'lecture_student_presents.lecture_date' => 'Date',
    ];


    // Scopes
    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 'Present');
    }

    //Foreign Ref
    public function programcode()
    {
        return $this->belongsTo(Programcode::class, 'programcode_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function lecture_schedule()
    {
        return $this->belongsTo(LectureSchedule::class, 'lecture_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('LSP', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('status', $params['search_status']);
        }

        if (isset($params['programcode_id']) && $params['programcode_id'] != null && $params['programcode_id'] != '') {
            $query->where('lecture_student_presents.programcode_id', $params['programcode_id']);
        }

        if (isset($params['subject_id']) && $params['subject_id'] != null && $params['subject_id'] != '') {
            $query->where('lecture_student_presents.subject_id', $params['subject_id']);
        }

        //$query->with(['media']);

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
            return '<strong><a href="' . route('edit-lecture-schedule', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->lecture_date . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->lecture_date . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
