<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

//Models
use App\Models\cms\Subject;
use App\Models\person\Faculty;
use App\Models\cms\Media;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments';

    protected $fillable = [
        'unique_id',
        'faculty_id',
        'subject_id',
        'assignment_title',
        'start_date',
        'end_date',
        'media_id',
        'status', // 'Active','Inactive'
        'sort_order',

    ];

    public $columnTitles = [
        'assignment_title' => 'Assignment Title',
        'start_date' => 'Start Date',
        'end_date' => 'End Date',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'assignments.unique_id' => 'unique_id',
        'assignments.assignment_title' => 'assignment_title',
        'assignments.start_date' => 'Start Date',
        'assignments.end_date' => 'End Date',
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
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('ASS', 3);
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
            $query->where('assignments.subject_id', $params['subject_id']);
        }

        if (isset($params['faculty_id']) && $params['faculty_id'] != null && $params['faculty_id'] != '') {
            $query->where('assignments.faculty_id', $params['faculty_id']);
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
            return '<strong><a href="' . route('edit-assignment', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->assignment_title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->assignment_title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
