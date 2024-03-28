<?php

namespace App\Models\person;

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
use App\Models\cms\Media;
use App\Models\cms\Assignment;
use App\Models\cms\Subject;
use App\Models\person\Student;

class StudentAssignmentSubmit extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'student_assignment_submits';

    protected $fillable = [
        'unique_id',
        'student_id',
        'subject_id',
        'assignment_id',
        'media_id',
        'remark',
        'submission_date',
    ];

    public $columnTitles = [
        'remark' => 'Remark',
        'submission_date' => 'Submission Date',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'student_assignment_submits.unique_id' => 'unique_id',
        'student_assignment_submits.submission_date' => 'Submission Date',
    ];

    //Foreign Ref
   
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('SAS', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateFrontListQuery(self::query(), $params, $all_search_fields);
        
        if (isset($params['subject_id']) && $params['subject_id'] != null && $params['subject_id'] != '') {
            $query->where('student_assignment_submits.subject_id', $params['subject_id']);
        }

        if (isset($params['assignment_id']) && $params['assignment_id'] != null && $params['assignment_id'] != '') {
            $query->where('student_assignment_submits.assignment_id', $params['assignment_id']);
        }

        $query->with(['media']);

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
            return '<strong>' . $this->submission_date . ' [' . $this->unique_id . ']</strong>';
        } else {
            return '<strong>' . $this->submission_date . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
