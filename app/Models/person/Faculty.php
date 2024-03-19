<?php

namespace App\Models\person;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

use App\Models\cms\Media;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';

    protected $fillable = [
        'unique_id',
        'first_name',
        'last_name',
        'username',
        'password',
        'gender',
        'dob',
        'email',
        'mobile_number',
        'altenative_email',
        'alternative_mobile_number',
        'media_id',
        'status', // 'Active','Inactive'
        'sort_order',

    ];

    public $columnTitles = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'username' => 'User Name',
        'email' => 'Email',
        'mobile_number' => 'Mobile Number',
        'gender' => 'Gender',
        'dob' => 'Birth Date',
        'altenative_email' => 'Altenative Email',
        'alternative_mobile_number' => 'Alternative Mobile Number',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'faculties.unique_id' => 'unique_id',
        'faculties.first_name' => 'first_name',
        'faculties.last_name' => 'last_name',
        'faculties.username' => 'username',
        'faculties.email' => 'email',
        'faculties.mobile_number' => 'mobile_number',
        'faculties.gender' => 'gender',
        'faculties.dob' => 'dob',
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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('FAC', 3);
        });
    }


    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('status', $params['search_status']);
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
            return '<strong><a href="' . route('edit-faculty', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->username . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->username . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
