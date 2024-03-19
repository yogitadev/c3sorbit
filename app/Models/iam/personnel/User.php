<?php

namespace App\Models\Iam\Personnel;

use Str;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models
use App\Models\iam\Role;
use App\Models\cms\Media;
use App\Models\cms\Country;
use App\Models\cms\State;
use App\Models\cms\City;
use App\Models\cms\Qualification;
use App\Models\cms\JobType;
use App\Models\cms\Designation;
use App\Models\cms\Department;
use App\Models\cms\RegionManager;

// Helper
use App\Helpers\Helper;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,SoftDeletes;

    protected $guard_name = "web";
    protected $appends = ['full_name'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unique_id',
        'admin_type', // 'Super Admin', 'Admin'
        'type_id',
        'job_start_date',
        'qualification_id',
        'job_type_id',
        'designation_id',
        'department_id',
        'region_id',
        'role_id',
        'interviewer',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'passport_no',
        'nationality_id',
        'email',
        'mobile_no',
        'phone_no',
        'home_country_id',
        'home_state_id',
        'home_city_id',
        'home_street_1',
        'home_street_2',
        'current_country_id',
        'current_state_id',
        'current_city_id',
        'current_street_1',
        'current_street_2',
        'username',
        'password',
        'media_id',
        'status', // 'Pending','Active','Inactive','Deleted'
        'email_verification_key',
        'email_verified_at',
        'last_login_at',
        'remember_token',
        'sort_order',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $columnTitles = [
        'admin_type' => 'Admin Type',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email',
        'user_name' => 'User Name',
        'password' => 'Password',
        'status' => 'Status',
        'job_start_date' => 'Job Start Date',
        'interviewer' => 'Interviewer',
        'gender' => 'gender',
        'dob' => 'Birth Of Date',
        'passport_no' => 'Password No',
        'mobile_no' => 'Mobile No',
        'phone_no' => 'Phone No',
        'home_street_1' => 'Home Street 1',
        'home_street_2' => 'Home Strret 2',
        'current_street_1' => 'Current Street 1',
        'current_street_2' => 'Current Street 2',
    ];

    public static $searchColumns = [
        'all' => 'All',
        'users.unique_id' => 'User ID',
        'users.first_name' => 'first_name',
        'users.last_name' => 'last_name',
        'users.email' => 'Email',
        'users.username' => 'Username',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Scopes
    public function scopeOrder($query)
    {
        return $query->orderBy($this->table . '.id', 'DESC');
    }

    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 'Active');
    }

    //Foreign Ref
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
    public function home_country()
    {
        return $this->belongsTo(Country::class, 'home_country_id', 'id');
    }
    public function home_state()
    {
        return $this->belongsTo(State::class, 'home_state_id', 'id');
    }
    public function home_city()
    {
        return $this->belongsTo(Country::class, 'home_city_id', 'id');
    }
    public function current_country()
    {
        return $this->belongsTo(Country::class, 'current_country_id', 'id');
    }
    public function current_state()
    {
        return $this->belongsTo(State::class, 'current_state_id', 'id');
    }
    public function current_city()
    {
        return $this->belongsTo(Country::class, 'current_city_id', 'id');
    }
    public function qualification()
    {
        return $this->belongsTo(Qualification::class, 'qualification_id', 'id');
    }
    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id', 'id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function nationality()
    {
        return $this->belongsTo(Country::class, 'nationality_id', 'id');
    }
    public function region()
    {
        return $this->belongsTo(RegionManager::class, 'region_id', 'id');
    }

    // Accessors

    protected function lastLoginAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != '' ? Helper::date_time_format($value) : '',
        );
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('PER', 2);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('users.status', $params['search_status']);
        }
        if (isset($params['role_id']) && $params['role_id'] != '') {
                $query->where('users.role_id', $params['role_id']);
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

    public static function getDataList($params)
    {

        

        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);

        // $query->leftJoin('user_logins', function ($query) {
        //     $query->on('user_logins.user_id', '=', 'users.id')->whereRaw('user_logins.id IN (select MAX(ul.id) from user_logins as ul join users as us on us.id = ul.user_id group by us.id)');
        // });

        $query->select(['users.*']);

        //$query->select(['users.*', \DB::raw('user_logins.created_at AS last_login_at')]);

        if (isset($params['status']) && $params['status'] != '') {
            $query->where('users.status', $params['status']);
        }


        if (isset($params['role_id']) && $params['role_id'] != '') {
            $query->whereHas('roles', function ($query) use ($params) {
                $query->where('users.role_id', $params['role_id']);
            });
        }



        if (isset($params['order_col']) && $params['order_col'] != '' && (isset($params['order_by']) && $params['order_by'] != '')) {
            if (in_array($params['order_col'], ['status', 'gender'])) {
                $query->orderBy(\DB::raw('CAST(users.' . $params['order_col'] . ' AS CHAR)'), $params['order_by']);
            } else if (in_array($params['order_col'], ['last_login_at'])) {
                $query->orderBy($params['order_col'], $params['order_by']);
            } else if (in_array($params['order_col'], ['role_name'])) {
                $query->orderBy($params['order_col'], $params['order_by']);
            } else {
                $query->orderBy('users.' . $params['order_col'], $params['order_by']);
            }
        } else {
            $query->orderBy('users.id', 'desc'); //->order();
        }

        // if (isset($params['last_login_date_range']) && $params['last_login_date_range'] !== '') {
        //     $date_range = explode(' to ', $params['last_login_date_range']);
        //     if (is_array($date_range) && count($date_range) >= 2) {
        //         $start_date = Helper::db_date_format($date_range[0]);
        //         $end_date = Helper::db_date_format($date_range[1]);
        //         $query->whereDate('user_logins.created_at', '>=', $start_date);
        //         $query->whereDate('user_logins.created_at', '<=', $end_date);
        //     } elseif (is_array($date_range) && count($date_range) >= 1) {
        //         $start_date = Helper::db_date_format($date_range[0]);
        //         $query->whereDate('user_logins.created_at', $start_date);
        //     }
        // }

        $list = null;
        if (isset($params['export']) && $params['export'] == true) {
            $list = $query->get();
        } else {
            $page_num = isset($params['page']) && $params['page'] > 0 ? $params['page'] : 1;
            $record_per_page = isset($params['per_page']) && $params['per_page'] > 0 ? $params['per_page'] : config('env.app_record_per_page');
            $list = $query->paginate($record_per_page, ['*'], 'page', $page_num);
        }
        return $list;
    }

    public function getShortName()
    {
        return Str::upper(Str::substr($this->first_name, 0, 1) . Str::substr($this->last_name, 0, 1));
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

        /*
    * Function Name     :   getActivityTitle
    * Use               :   Use for Activity Log
    *
    */
    public function getActivityTitle($add_link = true)
    {
        if ($add_link) {
            return '<strong><a href="' . route('edit-personnel', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->username . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->username . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
