<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name', 'dateAdded', 'location'
    ];

    //
}
