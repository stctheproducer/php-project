<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FellowshipGroup extends Model
{
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
