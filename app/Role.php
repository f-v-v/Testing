<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [ 'name', 'slug', 'permission'];
    protected $casts = [
        'permissions' => 'array',
    ];
    // protected $casts = [ 'permission' => 'json'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    public function hasAccess(array $permissions) : bool    
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
            
        }
        return false;
    }

    public function hasPermission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }
}
