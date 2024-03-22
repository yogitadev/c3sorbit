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
        'role_id',
        'interviewer',
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'email_verification_key',
        'email_verified_at',
        'last_login_at',
        'remember_token',
        'status', // 'Pending','Active','Inactive','Deleted'
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
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email',
        'user_name' => 'User Name',
        'password' => 'Password',
        'status' => 'Status',
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

        $query->select(['users.*']);

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
