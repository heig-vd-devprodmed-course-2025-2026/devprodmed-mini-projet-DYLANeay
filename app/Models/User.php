<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    /**
     * Get the posts for the user.
     */
    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }
}
