<?php

namespace App\Models;

class Role extends BaseModel
{
    public function scopeForName($query, $role)
    {
        return $query->where('name', $role);
    }

    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }
}
