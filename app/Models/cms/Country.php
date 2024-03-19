<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'shortname',
        'name',
        'phonecode',
        'status', // 'Active','Inactive'
        'sort_order',

    ];

    public $columnTitles = [
        'shortname' => 'Short Name',
        'name' => 'Name',
        'phonecode' => 'Phone code',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'countries.shortname' => 'shortname',
        'countries.name' => 'name',
        'countries.phonecode' => 'phonecode',
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
            return '<strong><a href="' . route('edit-country', ['id' => $this->id]) . '" target="_blank">' . $this->title . ' [' . $this->id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->id . ']</strong>';
        }
    }
}
