<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends BaseModel
{
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
