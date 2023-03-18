<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{                                                                                                         
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }

    /*
    Now being managed by PostPolicy

    public function ownedBy(User $user) {
        
        So what this one is checking is 
        
            Take the user->id from the user table 
                        and check 
            if it matches the user_id column in the Post table

        Note: Using $this actomatically set it to the current post
        
        return $user->id === $this->user_id;
    }

    */

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

}
