<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','join_since','profile_image','testimonial'];

    protected $dates = ['created_at','updated_at'];
}
