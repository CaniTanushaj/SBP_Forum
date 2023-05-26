<?php

namespace App\Models;
use App\Models\User;
use App\Models\Post;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'description','user_id'
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
