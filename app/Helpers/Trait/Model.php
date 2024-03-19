<?php

namespace App\Helpers\Trait;

use App\Helpers\Helper;
use Str;
use DB;
use \Carbon\Carbon;

trait Model
{

    public static function get_unique_id($prefix, $slot = 2, $slot_length = 4)
    {
        $arr[] = $prefix;
        for ($i = 0; $i < $slot; $i++) {
            $arr[] = Str::upper(Str::random($slot_length));
        }
        return implode('-', $arr);
    }

    public static function get_ref_no($ins_name,$intake)
    {
        $random = random_int(100000, 999999);
        $year = (int) filter_var($intake, FILTER_SANITIZE_NUMBER_INT);
        $str = $ins_name ."/".$year."/" . $random;
        return $str;
    }

    public static function generateAdminListQuery($query, $params, $all_search_fields, $date_range_field = 'created_at')
    {


        if (isset($params['search']) && $params['search'] != null && count($all_search_fields) > 0) {
            $search_val = $params['search'];
            $query->where(function ($q) use ($search_val, $all_search_fields) {
                array_shift($all_search_fields);
                $counter = 0;
                foreach ($all_search_fields as $field) {
                    if ($counter == 0) {
                        $q->Where(DB::raw($field), 'like', '%' . addslashes($search_val) . '%');
                    } else {
                        $q->orWhere(DB::raw($field), 'like', '%' . addslashes($search_val) . '%');
                    }
                    $counter++;
                }
            });
        }

        if (isset($params['date_range']) && $params['date_range'] !== '') {
            $date_range = explode(' to ', $params['date_range']);
            if (is_array($date_range) && count($date_range) >= 2) {

                $start_date = Helper::db_date_format($date_range[0]);
                $end_date = Helper::db_date_format($date_range[1]);

                $query->whereDate($date_range_field, '>=', $start_date);
                $query->whereDate($date_range_field, '<=', $end_date);
            } else if (is_array($date_range) && count($date_range) >= 1) {
                $start_date = Helper::db_date_format($date_range[0]);

                $query->whereDate($date_range_field, $start_date);
            }
        }


        if ((isset($params['order_col']) && $params['order_col'] != '') && (isset($params['order_by']) && $params['order_by'] != '')) {
            $query->orderBy($params['order_col'], $params['order_by']);
        } else {
            $query->order();
        }


        return $query;
    }


    public static function getColumnSortLink($arr = [])
    {

        $caret = '<i class="fas fa-sort-alt"></i>';
        $order_col = $arr['column_name'];
        $order_by = 'ASC';

        $current_order_col = $arr['params']['order_col'] ?? '';
        $current_order_by = $arr['params']['order_by'] ?? '';

        if ($arr['column_name'] == $current_order_col) {
            if (Str::upper($current_order_by) == 'DESC') {
                $caret = '<i class="fas fa-angle-down ms-3"></i>';
                $order_by = 'ASC';
            } else {
                $caret = '<i class="fas fa-angle-up ms-3"></i>';
                $order_by = 'DESC';
            }
        } else {
        }

        $arr['params']['order_col'] = $order_col;
        $arr['params']['order_by'] = $order_by;


        return '<a href="' . $arr['url'] . '?' . self::generateQueryString($arr['params']) . '">' . $arr['column_title'] . $caret . '</a>';
    }

    public static function generateFrontListQuery($query, $params, $all_search_fields, $date_range_field = 'created_at')
    {


        if (isset($params['search']) && $params['search'] != null && count($all_search_fields) > 0) {
            $search_val = $params['search'];
            $query->where(function ($q) use ($search_val, $all_search_fields) {
                array_shift($all_search_fields);
                $counter = 0;
                foreach ($all_search_fields as $field) {
                    if ($counter == 0) {
                        $q->Where(DB::raw($field), 'like', '%' . addslashes($search_val) . '%');
                    } else {
                        $q->orWhere(DB::raw($field), 'like', '%' . addslashes($search_val) . '%');
                    }
                    $counter++;
                }
            });
        }

        if (isset($params['date_range']) && $params['date_range'] !== '') {
            $date_range = explode(' to ', $params['date_range']);
            if (is_array($date_range) && count($date_range) >= 2) {

                $start_date = Helper::db_date_format($date_range[0]);
                $end_date = Helper::db_date_format($date_range[1]);

                $query->whereDate($date_range_field, '>=', $start_date);
                $query->whereDate($date_range_field, '<=', $end_date);
            } else if (is_array($date_range) && count($date_range) >= 1) {
                $start_date = Helper::db_date_format($date_range[0]);

                $query->whereDate($date_range_field, $start_date);
            }
        }
        return $query->orderBy('id','DESC');
    }
}
