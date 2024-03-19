<?php

namespace App\Models\course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Helper
use App\Helpers\Helper;

//Model
use App\Models\campaign\Campus;
use App\Models\campaign\Institution;
use App\Models\cms\Media;
use App\Models\cms\AwardingBody;

class Programcode extends Model
{
    use HasFactory;

    protected $table = 'programcodes';

    protected $fillable = [
        'unique_id',
        'institution_id',
        'campus_id',
        'program_name',
        'program_name_spanish',
        'program_code',
        'awarding_body_id',
        'course_duration',
        'uk_credit',
        'ects_credit',
        'eng_program',
        'eng_course_duration',
        'eng_course_fees',
        'eu_tution_fee',
        'eu_app_fee',
        'eu_year_fee',
        'non_eu_tutuion_fee',
        'non_eu_app_fee',
        'non_eu_year_fee',
        'online_tutuion_fee',
        'online_app_fee',
        'online_year_fee',
        'media_id',
        'status', // 'Active','Inactive'
        'sort_order',
    ];

    public $columnTitles = [
        'program_code' => 'Program Code',
        'program_name' => 'Program Name',
        'status' => 'Status',
        'program_name_spanish' => 'Program Name Spanish',
        'course_duration' => 'Course Duration',
        'uk_credit' => 'Uk Credit',
        'ects_credit' => 'Ects Credit',
        'eng_program' => 'Eng Program',
        'eng_course_duration' => 'Eng Course Duration',
        'eng_course_fees' => 'Eng Course Fees',
        'eu_tution_fee' => 'Eu Tution Fee',
        'eu_app_fee' => 'Eu App Fee',
        'eu_year_fee' => 'Eu Year Fee',
        'non_eu_tutuion_fee' => 'Non Eu Tutuion Fee',
        'non_eu_app_fee' => 'Non Eu App Fee',
        'non_eu_year_fee' => 'Non Eu Year Fee',
        'online_tutuion_fee' => 'Online Tutuion Fee',
        'online_app_fee' => 'Online App Fee',
        'online_year_fee' => 'Online Year Fee',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'programcodes.unique_id' => 'unique_id',
        'programcodes.program_code' => 'program_code',
        'programcodes.program_name' => 'program_name',
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
    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id', 'id');
    }
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
    public function awarding_body()
    {
        return $this->belongsTo(AwardingBody::class, 'awarding_body_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('PRO', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('programcodes.status', $params['search_status']);
        }

        if (isset($params['institution_id']) && $params['institution_id'] != null && $params['institution_id'] != '') {
            $query->where('programcodes.institution_id', $params['institution_id']);
        }

        if (isset($params['campus_id']) && $params['campus_id'] != null && $params['campus_id'] != '') {
            $query->where('programcodes.campus_id', $params['campus_id']);
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
            return '<strong><a href="' . route('edit-programcode', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
