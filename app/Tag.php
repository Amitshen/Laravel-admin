<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = ['name'];

    protected $dates = ['created_at','updated_at'];
    
    public function news()
    {
        return $this->belongsToMany(News::class)->using(NewsTag::class);
    }
}
