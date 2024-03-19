<?php

namespace App\Helpers\Trait;


trait ActivityLog
{

    public static function getModelChanges($objArr)
    {
        $ret_arr = [];

        if (is_array($objArr) && count($objArr) > 0) {
            foreach ($objArr as $obj) {
                $ret_arr = array_merge($ret_arr, self::getObjectChanges($obj));
            }
        } else {
            $ret_arr = self::getObjectChanges($objArr);
        }

        return $ret_arr;
    }


    private static function getObjectChanges($obj)
    {
        $ret_arr = [];
        $language_list = config('laravel-translatable.language_list');
        
        if ($obj->wasRecentlyCreated === true) {
            $changes = $obj->getOriginal();
        } elseif ($obj->isDirty()) {
            $original_obj = $obj->getOriginal();
            $changes = $obj->syncChanges()->getChanges();
        }
        
        if (isset($changes) && is_array($changes) && count($changes) > 0) {

            foreach ($changes as $field => $new_value) {

                if (in_array($field, array_keys($obj->columnTitles))) {

                    // Check for translatable : all language content manually compared
                    if (isset($obj->translatable) && in_array($field, $obj->translatable)) {

                        if (isset($original_obj)) { // Edit
                            $new_value_arr = json_decode($new_value, true);
                        } else {
                            $new_value_arr = $new_value; // Create // is_array($new_value)
                        }

                        foreach ($language_list as $lang_key=>$lang_item) {
                            $change_item = [
                                'field_name' => $field . '[' . $lang_key . ']',
                                'field_title' => $obj->columnTitles[$field] . '[' . $lang_key . ']',
                                'new_value' => $new_value_arr[$lang_key] ?? null,
                            ];

                            if (isset($original_obj) && isset($original_obj[$field][$lang_key])) { // Edit
                                if(
                                    (!isset($new_value_arr[$lang_key]) && !is_null($original_obj[$field][$lang_key])) ||
                                    ($new_value_arr[$lang_key] != $original_obj[$field][$lang_key])
                                ){
                                    $change_item['old_value'] = $original_obj[$field][$lang_key] ?? null;
                                    $ret_arr[] = $change_item;
                                }
                            } else if(!is_null($change_item['new_value'])) { // Create
                                $change_item['old_value'] = null;
                                $ret_arr[] = $change_item;
                            }
                        }

                    } else {

                        $change_item = [
                            'field_name' => $field,
                            'field_title' => $obj->columnTitles[$field],
                            'new_value' => $obj->$field,
                        ];

                        if (isset($original_obj)) { // Edit
                            $change_item['old_value'] = $original_obj[$field] ?? null;
                            $ret_arr[] = $change_item;
                        } else { // Create
                            if ($obj->$field !== null) {
                                $change_item['old_value'] = null;
                                $ret_arr[] = $change_item;
                            }
                        }
                    }
                }
            }
        }
        return $ret_arr;
    }


    public static function getObjectStatusChanges($obj, $title)
    {

        if ($obj->isDirty()) {
            $original_obj = $obj->getOriginal();
            $changes = $obj->syncChanges()->getChanges();
        }

        if (isset($changes) && is_array($changes) && count($changes) > 0) {

            foreach ($changes as $field => $new_value) {

                if (in_array($field, array_keys($obj->columnTitles))) {

                    return [
                        'field_name' => $field,
                        'field_title' => $title,
                        'old_value' => $original_obj[$field] ?? null,
                        'new_value' => $obj->$field,
                    ];
                }
            }
        }
    }
}
