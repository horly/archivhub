<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armoire extends Model
{
    //
    use HasFactory;

    protected $table = "armoires";

    protected $fillable = [
        'numero',
        'description',
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }

    public function etageres()
    {
        return $this->hasMany('App\Models\Etagere');
    }
}
