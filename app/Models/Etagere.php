<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etagere extends Model
{
    //
    use HasFactory;

    protected $table = "etageres";

    protected $fillable = [
        'numero',
        'description',
        'armoire_id',
    ];

    public function armoire()
    {
        return $this->belongsTo('App\Models\Armoire', 'armoire_id');
    }

    public function boites()
    {
        return $this->hasMany('App\Models\Boite');
    }

}
