<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

//Models
use App\Models\cms\Subject;
use App\Models\cms\Exam;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $table = 'exams_questions';

    protected $fillable = [
        'unique_id',
        'exam_id',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'correct_ans'
    ];

    public $columnTitles = [
        'question' => 'Exam Date',
        'option1' => 'Option1',
        'option2' => 'Option2',
        'option3' => 'Option3',
        'option4' => 'Option4',
        'correct_ans' => 'Correct Ans',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'exams_questions.unique_id' => 'Unique ID',
    ];


    //Foreign Ref
    public function exam(): BelongsTo
    {
        return $this->belongsTo(ExamQuestion::class, 'exam_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('EXQ', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateFrontListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('status', $params['search_status']);
        }

        if (isset($params['subject_id']) && $params['subject_id'] != null && $params['subject_id'] != '') {
            $query->where('exams_questions.subject_id', $params['subject_id']);
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
}
