<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'setting_type', // 'Input', 'Textarea'
        //
        'setting_name',
        'setting_title',
        'setting_value',
        //
        'setting_required', // 'No', 'Yes'
        'setting_help_text',
    ];

    private static $searchColumns = [
        'all' => 'All',
        'settings.setting_name' => 'setting_name',
        'settings.setting_title' => 'setting_title',
        'settings.setting_value' => 'setting_value',
    ];
}
