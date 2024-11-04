<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tours extends Model
{
    use HasFactory;
    protected $table = 'tours';
    protected $fillable = [
        'name',
        'title',
        'journeys',
        'schedule',
        'move_method',
        'starting_gate',
        'start_date',
        'end_date',
        'number_guests',
        'price_old',
        'price_children',
        'sale',
        'view',
        'description',
        'content',
        'image',
        'location_id',
        'user_id',
        'number_registered',
        'album_img',
        'status',
        'created_at', 
        'updated_at',
    ];
}
