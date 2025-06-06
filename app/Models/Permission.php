<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    use HasFactory;

    protected $table = "permissions";

    protected $fillable = [
        'id_user',
    ];

    function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
