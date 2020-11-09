<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Task extends Model
{
    use HasFactory;
    public $timestamps =false;
    public $fillable=["title", 'description','state','due_date','user_id'];
    protected $table = 'tasks';

   

public function user()
{
    return $this->belongsToMany('App\Models\User','participant')
                ->using('App\Models\TaskUser');
}

public function taskUser()
{
    return $this->hasMany('App\Models\TaskUser');
}


public function users()
{
    return $this->belongsTo('App\Models\User');
}

public function attachments()
{
    return $this->hasMany('App\Models\Attachment');
}

public function comments()
{
    return $this->hasMany('App\Models\Comment');
}

public function category()
{
    return $this->belongsTo(Category::class);
}

public function assignedUsers(){
    return $this->belongsToMany("App\Models\User")
                ->using('App\Models\TaskUser')
                // ->wherePivot("assigned", "=", true)
                // ->withPivot('owner','assigned')
                ;
}

public function board(){
    return $this->belongsTo("App\Models\Board");
}

public function participants() {
    return $this->hasManyThrough("App\Models\Board", "App\Models\User");
}
}
