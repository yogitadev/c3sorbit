<?php

namespace App\Helpers\Trait;

use App\Helpers\Helper;
use Str;
use DB;
use \Carbon\Carbon;

use App\Models\iam\module\Module;
use App\Models\iam\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\cms\Country;
use App\Models\cms\Subject;

trait Custom
{

    public static function getIp()
    {
        $ip_address = null;

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        foreach (array('REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        $ip_address = $ip;
                        break;
                    }
                }
            }
        }
        if (!is_null($ip_address)) {
            return $ip_address;
        } else {
            return '103.78.205.144';
        }
    }

    public static function generateQueryString($params)
    {
        $retArr = [];
        if (is_array($params) && count($params) > 0) {
            foreach ($params as $k => $v) {
                if ($v != '' && $v != null) {
                    $retArr[] = "$k=$v";
                }
            }
        }

        return implode('&', $retArr);
    }


    public static function showBadge($value)
    {

        $arr = [
            'Active' => 'success',
            'Inactive' => 'warning',
            'Pending' => 'light',
            'Deleted' => 'danger',
            'Absent' => 'danger',
            'Present' => 'success',
        ];

        $class = isset($arr[$value]) ? $arr[$value] : 'primary';

        return '<div class="badge badge-' . $class . ' fw-bolder">' . $value . '</div>';
    }

    public static function checkHasAnyPermission($module_name = '', $permission_arr = [],$show_flash_message=true)
    {
    
        $flag = false;
        $user_item = Auth::user();

        $rolesToCheck = $user_item->getRoleNames();

        if (!is_null($user_item)) {
            if (!is_null($rolesToCheck)) {
                if (count($rolesToCheck) > 0) {
                    if (count($permission_arr) > 0) {
                        if ($user_item->hasAnyRole($rolesToCheck) || $user_item->hasAnyPermission($permission_arr)) {
                            $flag = true;
                        }
                    } else {
                        $permission_arr = Module::where('name', $module_name)->first();
                        if (!is_null($permission_arr)) {
                            $permission_arr = json_decode($permission_arr->permission_options);
                            if ($user_item->hasAnyRole($rolesToCheck) || $user_item->hasAnyPermission($permission_arr)) {
                                $flag = true;
                            }
                        }
                    }
                }
            }
        }

        // if (!is_null($user_item)) {
        //     if (!is_null($user_item->role)) {
        //         if (!is_null($user_item->role->name) && $user_item->role->name != '') {
        //             if (count($permission_arr) > 0) {
        //                 if (Auth::user()->role->hasAnyPermission($permission_arr)) {
        //                     $flag = true;
        //                 }
        //             } else {
        //                 $permission_arr = Module::where('name', $module_name)->first();
        //                 if (!is_null($permission_arr)) {
        //                     $permission_arr = json_decode($permission_arr->permission_options);
        //                     if (Auth::user()->role->hasAnyPermission($permission_arr)) {
        //                         $flag = true;
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        
        if ($flag == false) {
            if($show_flash_message){
                flash('You do not have permission to access that page, Kindly contact admininstrator to get access.')->error();
            }
        }
        return $flag;
    }

    public static function checkPermission($permission = '')
    {
        $flag = false;
        $user_item = Auth::user();
        $rolesToCheck = $user_item->getRoleNames();

        if (!is_null($user_item)) {
            if (!is_null($rolesToCheck)) {
                if (count($rolesToCheck) > 0) {
                    if ($user_item->hasAnyRole($rolesToCheck) || $user_item->hasAnyPermission($permission)) {
                        $flag = true;
                    }
                }
            }
        }

        if ($flag == false) {
            flash('You do not have permission to access that page, Kindly contact admininstrator to get access.')->error();
        }
        return $flag;
    }

    public static function checkPermissionGate($permission = '')
    {
        $flag = false;
        $user_item = Auth::user();
        if (!is_null($user_item)) {
            if (!is_null($user_item->role)) {
                if (!is_null($user_item->role->name) && $user_item->role->name != '') {
                    if ($user_item->role->hasPermissionTo($permission)) {
                        $flag = true;
                    }
                }
            }
        }
        return $flag;
    }

    public static function hasAnyPermission($module_name = '', $permission_arr = [])
    {
        $flag = false;
        $user_item = Auth::user();

        $rolesToCheck = $user_item->getRoleNames();

        if (!is_null($user_item)) {
            if (!is_null($rolesToCheck)) {
                if (count($rolesToCheck) > 0) {
                    if (count($permission_arr) > 0) {
                        $permission_arr = array_map(function ($permission) use ($module_name) {
                            return $module_name . '.' . $permission;
                        }, $permission_arr);

                        if ($user_item->hasAnyRole($rolesToCheck) || $user_item->hasAnyPermission($permission_arr)) {
                            $flag = true;
                        }
                    } else {
                        $module_item = Module::where('name', $module_name)->first();

                        if (!is_null($module_item) && $module_item->permissions != '') {
                            $module_permission_arr = explode(',', $module_item->permissions);
                            $module_permission_arr = array_map(function ($permission) use ($module_item) {
                                return $module_item->name . '.' . $permission;
                            }, $module_permission_arr);

                            if (is_array($module_permission_arr) && count($module_permission_arr) > 0) {
                                if ($user_item->hasAnyRole($rolesToCheck) || $user_item->hasAnyPermission($module_permission_arr)) {
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $flag;
    }


    public static function hasAnyModulePermission($module_name_arr = [])
    {
        $flag = false;
        $user_item = Auth::user();     
        $rolesToCheck = $user_item->getRoleNames();
        if (!is_null($user_item)) {
            if (!is_null($rolesToCheck)) {

                if (count($rolesToCheck) > 0) {

                    if (is_array($module_name_arr) && count($module_name_arr) > 0) {
                        $module_list = Module::whereIn('name', $module_name_arr)->get();
                    } elseif ($module_name_arr != '') {
                        $module_list = Module::where('name', $module_name_arr)->get();
                    }

                    if (!is_null($module_list) && $module_list->count() > 0) {
                        foreach ($module_list as $module_item) {

                            $module_permission_arr = explode(',', $module_item->permissions);
                            $module_permission_arr = array_map(function ($permission) use ($module_item) {
                                return $module_item->name . '.' . $permission;
                            }, $module_permission_arr);
                            if (is_array($module_permission_arr) && count($module_permission_arr) > 0) {
                                
                                if ($user_item->hasAnyRole($rolesToCheck) || $user_item->hasAnyPermission($module_permission_arr)) {
                                    $flag = true;
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $flag;
    }

    public static function region_country_name($country_ids) {
        
        $country_ids_array = explode(",",$country_ids);
        $country_count = Country::count();
        
        $data = Country::select(DB::raw("group_concat(name SEPARATOR ', ') as country_names"))->whereIn('id',$country_ids_array)->get();
        
        if(count($data) > 0 ) {
            if($country_count == count($country_ids_array)) {
                $result = 'All';
            } else {
                $result = $data[0]['country_names'];
            }
        } else {
            $result = '-';
        }
        return $result;
    }

    public static function programcode_subject_name($programcode_id) {
       $data =  Subject::select(DB::raw("group_concat(name SEPARATOR ', ') as subject_names"))->where('programcode_id',$programcode_id)->get();
       if($data[0]['subject_names'] != null) {
            $result = $data[0]['subject_names'];
       } else {
        $result = null;
       }
       return $result;
    }
}
