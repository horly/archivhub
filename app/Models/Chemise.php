<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemise extends Model
{
    //
    use HasFactory;

    protected $table = "chemises";

    protected $fillable = [
        'numero',
        'description',
        'classeur_id',
    ];

    public function classeur()
    {
        return $this->belongsTo('App\Models\Classeur', 'classeur_id');
    }
}
