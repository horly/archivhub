<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    use HasFactory;

    protected $table = "rooms";

    protected $fillable = [
        'name',
        'description',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo('App\Models\Site', 'site_id');
    }

    public function armoires()
    {
        return $this->hasMany('App\Models\Armoire');
    }
}
