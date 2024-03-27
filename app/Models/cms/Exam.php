<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

//Models
use App\Models\cms\Subject;
use App\Models\cms\ExamQuestion;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'unique_id',
        'subject_id',
        'exam_date',
        'exam_duration',
        'status', // 'Active','Inactive'
        'sort_order',

    ];

    public $columnTitles = [
        'exam_date' => 'Exam Date',
        'exam_duration' => 'Exam Duration',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'exams.unique_id' => 'Unique ID',
        'exams.exam_date' => 'Exam Date',
        'exams.exam_duration' => 'Exam Duration',
    ];


    // Scopes
    public function scopeOrder($query)
    {
        return $query->orderBy($this->table . '.sort_order', 'ASC');
    }

    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 'Active');
    }

    //Foreign Ref
    public function exam_questions()
    {
        return $this->hasMany(ExamQuestion::class, 'exam_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('EXA', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('status', $params['search_status']);
        }

        if (isset($params['subject_id']) && $params['subject_id'] != null && $params['subject_id'] != '') {
            $query->where('exams.subject_id', $params['subject_id']);
        }

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
            return '<strong><a href="' . route('edit-exam', ['subject_id' => $this->subject_id, 'unique_id' => $this->unique_id]) . '" target="_blank">' . $this->exam_date . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->exam_date . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
