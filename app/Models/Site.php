<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    use HasFactory;

    protected $table = "sites";

    protected $fillable = [
        'name',
        'address'
    ];

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }
}
