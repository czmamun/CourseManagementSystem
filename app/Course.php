<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', // Course name
        'description', // Course description
        // Add other relevant fields as needed
    ];
}
