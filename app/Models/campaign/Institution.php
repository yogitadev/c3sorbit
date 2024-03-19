<?php

namespace App\Models\campaign;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

use App\Models\cms\Media;

class Institution extends Model
{
    use HasFactory;

    protected $table = 'institutions';

    protected $fillable = [
        'unique_id',
        'name',
        'email',
        'mobile_number',
        'website_url',
        'media_id',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'status', // 'Active','Inactive'
        'sort_order',

    ];

    public $columnTitles = [
        'name' => 'Name',
        'email' => 'Email',
        'mobile_number' => 'Mobile Number',
        'website_url' => 'Website URL',
        'facebook_url' => 'Facebook URL',
        'instagram_url' => 'Instagram URL',
        'twitter_url' => 'Twitter URL',
        'linkedin_url' => 'Linkedin URL',
        'youtube_url' => 'Youtube URL',
        'status' => 'Status',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'institutions.unique_id' => 'unique_id',
        'institutions.name' => 'name',
        'institutions.email' => 'email',
        'institutions.mobile_number' => 'mobile_number',
        'institutions.website_url' => 'website_url',
        'institutions.mobile_number' => 'mobile_number',
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
            $model->unique_id = Helper::get_unique_id('INS', 3);
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
            return '<strong><a href="' . route('edit-institution', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
