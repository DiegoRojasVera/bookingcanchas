<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratingbarnew extends Model
{
    use HasFactory;

    protected $fillable = [
        'calificacion',
        'comentarios',
    ];

    public function stylist()
    {
        return $this->belongsTo(Stylist::class);
    }
}
