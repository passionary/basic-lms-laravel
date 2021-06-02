<?php namespace App;

use Spatie\Permission\Models\Role as RoleBase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends RoleBase
{
    protected $fillable=['name','display_name','description'];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany('App\Permission', 'role_has_permissions', 'role_id', 'permission_id');
    }
}