<?php

namespace App\Models\Work;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Work extends Model
{
    protected $table = 'works';

    protected $guarded = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id',
        'image',
        'category_id',
        'likes_count'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function userHaveLike()
    {
        return $this->hasOne(Like::class)->where('user_id',Auth::id())->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
