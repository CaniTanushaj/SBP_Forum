<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Forum;
use App\Models\Comment;



class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'description','user_id','forum_id'
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
