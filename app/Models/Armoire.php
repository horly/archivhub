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
        'id_room',
    ];

    public function site()
    {
        return $this->belongsTo('App\Models\Room', 'id_room');
    }

    public function etageres()
    {
        return $this->hasMany('App\Models\Etagere');
    }
}
