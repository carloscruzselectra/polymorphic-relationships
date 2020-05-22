<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends BaseModel
{
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function companies(): BelongsToMany
    {
        return $this->morphedByMany(Company::class, 'taggable');
    }
}
