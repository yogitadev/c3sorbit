<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

class AwardingBody extends Model
{
    use HasFactory;

    protected $table = 'awarding_bodys';

    protected $fillable = [
        'unique_id',
        'title',
        'description',
        'status', // 'Active','Inactive'
        'sort_order',

    ];

    public $columnTitles = [
        'title' => 'Title',
        'description' => 'Description',
        'status' => 'Status',
    ];
    
    private static $searchColumns = [
        'all' => 'All',
        'awarding_bodys.unique_id' => 'unique_id',
        'awarding_bodys.title' => 'title',
        'awarding_bodys.description' => 'description',
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


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('AWB', 3);
        });
    }


    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('status', $params['search_status']);
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
            return '<strong><a href="' . route('edit-awarding-body', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
