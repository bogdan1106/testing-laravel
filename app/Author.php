<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    protected $dates = ['dob'];

    protected function setDobAttribute($dob)
    {
        $this->attributes['dob'] = Carbon::parse($dob);

    }

    public function getNameAttribute($name)
    {
       return  ucfirst($name);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucfirst($name);
    }



}
