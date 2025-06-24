<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    //
    use HasFactory;

    protected $table = "consultations";

    protected $fillable = [
        'user_id',
        'document_id',
        'room_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }
}
