<?php

namespace App;

class Address extends BaseModel
{
    public function addressable()
    {
        return $this->morphTo();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
