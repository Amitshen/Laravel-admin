<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $dates = ['created_at','updated_at'];
    protected $fillable = ['name','start_date','end_date','description','client_id'];
}
