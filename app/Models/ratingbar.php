<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratingbar extends Model
{
    use HasFactory;

    protected $table = 'ratingbars';

    protected $fillable = [
        'calificacion',
        'stylist',
        'comentarios',
    ];

    public function stylist()
    {
        return $this->belongsTo(Stylist::class);
    }
}
