<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'age', 'kind'
    ];
}
