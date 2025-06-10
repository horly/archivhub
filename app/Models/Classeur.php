<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classeur extends Model
{
    //
    use HasFactory;

    protected $table = "classeurs";

    protected $fillable = [
        'numero',
        'description',
        'boite_id',
    ];

    public function boite()
    {
        return $this->belongsTo('App\Models\Boite', 'boite_id');
    }

    public function chemises()
    {
        return $this->hasMany('App\Models\Chemise');
    }
}
