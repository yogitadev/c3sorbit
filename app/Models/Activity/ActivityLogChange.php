<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_log_id',
        //
        'field_name',
        'field_title',
        'old_value',
        'new_value',
    ];

    protected $table = 'activity_log_changes';

     // Foreign Ref.
     public function activity_log()
     {
         return $this->belongsTo(ActivityLog::class, 'activity_log_id', 'id');
     }
}
