<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{

    function scopeTaskByUser($query, $user)
    {
        $query->where('id', $user)->get();
    }
}
