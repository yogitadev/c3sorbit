<?php

namespace App\Helpers\Trait;

use Str;
use DB;
use \Carbon\Carbon;

trait Date
{

    public static function old_date_format($date, $current_format = 'd/m/Y', $format = 'd/m/Y')
    {
        if ($date != null && $date != '' && $date != '0000-00-00') {
            $date = Carbon::createFromFormat($current_format, $date);
            if (!is_null($date)) {
                return $date->format($format);
            }
        }
        return null;
    }

    /**** Functions for DB Date format to App Date formats ****/


    public static function date_format($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_FORMAT', 'Y-m-d'), $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                try {
                    $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);
                } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                    return null;
                }
            }

            if (!is_null($obj)) {
                return $obj->format(env('DATE_FORMAT', 'd/m/Y'));
            }
        }
        return null;
    }


    public static function custom_date_format($value, $format = 'd/m/Y')
    {
        if ($value != null && $value != '' && $value != '0000-00-00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_FORMAT', 'Y-m-d'), $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                try {
                    $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);
                } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                    return null;
                }
            }

            if (!is_null($obj)) {
                return $obj->format(env('DATE_FORMAT', $format));
            }
        }
        return null;
    }


    public static function custom_date_object($value, $format = 'd/m/Y')
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat($format, $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }

            if (!is_null($obj)) {
                return $obj;
            }
        }
        return null;
    }

    public static function date_object($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_FORMAT', 'Y-m-d'), $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                try {
                    $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);
                } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                    return null;
                }
            }

            if (!is_null($obj)) {
                return $obj;
            }
        }
        return null;
    }

    public static function time_format($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_FORMAT', 'Y-m-d'), $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                try {
                    $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);
                } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                    return null;
                }
            }

            if (!is_null($obj)) {
                return $obj->format(env('APP_TIME_FORMAT', 'H:i'));
            }
        }
        return null;
    }


    public static function date_time_format($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00 00:00:00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);
                if (!is_null($obj)) {
                    return $obj->format(env('DATE_TIME_FORMAT', 'd-m-Y H:i:s'));
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }


    public static function date_time_object($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00 00:00:00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);
                if (!is_null($obj)) {
                    return $obj;
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

    public static function fancy_date_time_format($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00 00:00:00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);
                if (!is_null($obj)) {
                    return $obj->format(env('FANCY_DATE_TIME_FORMAT', 'd/m/Y - H:i'));
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }


    public static function fancy_date_time_format_with_human_readable($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00 00:00:00') {

            try {
                $obj = Carbon::createFromFormat(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'), $value);



                if (!is_null($obj)) {
                    if ($obj->diffInHours(\Carbon\Carbon::now()) >= 12) {
                        return $obj->format(env('FANCY_DATE_TIME_FORMAT', 'd/m/Y - H:i'));
                    } else {
                        return $obj->diffForHumans();
                    }
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }


    /**** Functions for App Date format to DB Date formats ****/

    public static function db_date_format($value)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat(env('DATE_FORMAT', 'd/m/Y'), $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                try {
                    $obj = Carbon::createFromFormat(env('DATE_TIME_FORMAT', 'd/m/Y H:i:s'), $value);
                } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                    try {
                        $obj = Carbon::createFromFormat(env('FANCY_DATE_TIME_FORMAT', 'd/m/Y - H:i'), $value);
                    } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                        return null;
                    }
                }
            }

            if (!is_null($obj)) {
                return $obj->format(env('DB_DATE_FORMAT', 'Y-m-d'));
            }
        }
        return null;
    }

    public static function db_date_and_time_format($value)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat('d/m/Y', $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                try {
                    $obj = Carbon::createFromFormat('d/m/Y H:i:s', $value);
                } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                    try {
                        $obj = Carbon::createFromFormat('d/m/Y - H:i', $value);
                    } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                        try {
                            $obj = Carbon::createFromFormat('d/m/Y H:i', $value);
                        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                            return null;
                        }
                    }
                }
            }

            if (!is_null($obj)) {
                return $obj->format(env('DB_DATE_FORMAT', 'Y-m-d H:i:s'));
            }
        }
        return null;
    }


    public static function db_date_object($value)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat(env('DATE_FORMAT', 'd/m/Y'), $value);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                try {
                    $obj = Carbon::createFromFormat(env('DATE_TIME_FORMAT', 'd/m/Y H:i:s'), $value);
                } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                    try {
                        $obj = Carbon::createFromFormat(env('FANCY_DATE_TIME_FORMAT', 'd/m/Y - H:i'), $value);
                    } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                        return null;
                    }
                }
            }

            if (!is_null($obj)) {
                return $obj;
            }
        }
        return null;
    }


    public static function db_date_time_format($value)
    {

        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat(env('DATE_TIME_FORMAT', 'd-m-Y H:i:s'), $value);

                if (!is_null($obj)) {
                    return $obj->format(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'));
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

    public static function db_date_time_object($value)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat(env('DATE_TIME_FORMAT', 'd/m/Y H:i:s'), $value);
                if (!is_null($obj)) {
                    return $obj;
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

    public static function db_date_time_format_event($value)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat(env('DATE_TIME_FORMAT', 'd/m/Y H:i'), $value);
                if (!is_null($obj)) {
                    return $obj->format(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'));
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

    public static function db_fancy_date_time_format($value)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat(env('FANCY_DATE_TIME_FORMAT', 'd/m/Y - H:i'), $value);
                if (!is_null($obj)) {
                    return $obj->format(env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'));
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

    public static function date_time_format_dynamic($value, $format)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat('Y-m-d H:i:s', $value);

                if (!is_null($obj)) {
                    return $obj->format($format);
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {

                return null;
            }
        }
        return null;
    }

    public static function date_format_dynamic($value, $format)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat(env('FANCY_DATE_TIME_FORMAT', 'Y-m-d'), $value);
                if (!is_null($obj)) {
                    return $obj->format($format);
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }


    public static function blog_display_date_time_format($value, $format)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat('d-m-Y H:i:s', $value);
                if (!is_null($obj)) {
                    return $obj->format($format);
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

    public static function date_dynamic_format($value,$value_format, $format)
    {
        if ($value != null && $value != '') {

            try {
                $obj = Carbon::createFromFormat($value_format, $value);
                if (!is_null($obj)) {
                    return $obj->format($format);
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

    public static function date_time_format_without_second($value)
    {
        if ($value != null && $value != '' && $value != '0000-00-00 00:00:00') {

            try {
                $obj = Carbon::createFromFormat(config('env.date.db_date_time_format'), $value);
                if (!is_null($obj)) {
                    return $obj->format(config('env.date.date_time_format_without_second'));
                }
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                return null;
            }
        }
        return null;
    }

}
