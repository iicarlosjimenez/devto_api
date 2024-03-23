<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'articulos';
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'comments_count',
        'reactions_count',
        'reading_time_minutes'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
