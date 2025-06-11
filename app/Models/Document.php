<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    use HasFactory;

    protected $table = "documents";

    protected $fillable = [
        'titre',
        'reference',
        'origine',
        'duree_conservation',
        'lien_numerisation',
        'context',
        'chemise_id'
    ];

    public function chemise()
    {
        return $this->belongsTo('App\Models\Chemise', 'chemise_id');
    }
}
