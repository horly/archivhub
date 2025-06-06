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
        'id_armoire',
    ];

    public function armoire()
    {
        return $this->belongsTo('App\Models\Armoire', 'id_armoire');
    }

}
