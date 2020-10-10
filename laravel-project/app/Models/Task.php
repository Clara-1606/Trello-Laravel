<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $timestamps =false;
    public $fillable=["title", 'description','state','due_date','user_id'];
    protected $table = 'tasks';

   

public function users()
{
    return $this->belongsToMany('App\Models\User');
}


public function user()
{
    return $this->belongsTo('App\Models\User');
}

public function attachment()
{
    return $this->hasMany('App\Models\Attachment');
}

public function comment()
{
    return $this->hasMany('App\Models\Comment');
}

public function category()
{
    return $this->belongsTo('App\Models\Category');
}
}
