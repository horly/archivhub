<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boite extends Model
{
    //
    use HasFactory;

    protected $table = "boites";

    protected $fillable = [
        'numero',
        'description',
        'etagere_id',
    ];

    public function etagere()
    {
        return $this->belongsTo('App\Models\Etagere', 'etagere_id');
    }

    public function classeurs()
    {
        return $this->hasMany('App\Models\Classeur');
    }
}
