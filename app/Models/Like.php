<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes_work';

    protected $guarded = false;

    protected $fillable = [
        'id',
        'work_id',
        'user_id',
    ];
}
