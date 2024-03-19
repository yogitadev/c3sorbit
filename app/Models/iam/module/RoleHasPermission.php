<?php

namespace App\Models\iam\module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'permission_id',
        'role_id',
    ];
    protected $table = 'role_has_permissions';
}
