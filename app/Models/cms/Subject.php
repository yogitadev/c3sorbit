<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

//Models
use App\Models\course\Programcode;
use App\Models\person\Faculty;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'unique_id',
        'programcode_id',
        'name',
        'faculty_id',
        'status', // 'Active','Inactive'
        'sort_order',

    ];

    public $columnTitles = [
        'name' => 'Name',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'subjects.unique_id' => 'unique_id',
        'subjects.name' => 'name',
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
    public function programcode()
    {
        return $this->belongsTo(Programcode::class, 'programcode_id', 'id');
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('SUB', 3);
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
            $query->where('subjects.programcode_id', $params['programcode_id']);
        }

        if (isset($params['faculty_id']) && $params['faculty_id'] != null && $params['faculty_id'] != '') {
            $query->where('subjects.faculty_id', $params['faculty_id']);
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
            return '<strong><a href="' . route('edit-subject', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->name . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->name . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
