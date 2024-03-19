<?php

namespace App\Models\campaign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'campuses';

    protected $fillable = [
        'unique_id',
        'institution_id',
        'name',
        'status', // 'Active','Inactive'
        'sort_order',
    ];

    public $columnTitles = [
        'name' => 'Name',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'campuses.unique_id' => 'unique_id',
        'campuses.name' => 'name',
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
    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('CAM', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('campuses.status', $params['search_status']);
        }

        if (isset($params['institution_id']) && $params['institution_id'] != null && $params['institution_id'] != '') {
            $query->where('campuses.institution_id', $params['institution_id']);
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
            return '<strong><a href="' . route('edit-campus', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
