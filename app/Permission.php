<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as PermissionBase;

class Permission extends PermissionBase
{
    use HasFactory;
    
    protected $fillable =
        ['name', 'description', 'display_name'];
}