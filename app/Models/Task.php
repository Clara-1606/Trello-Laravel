<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Task extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=["title", 'description','state','due_date','user_id'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

   
/**
 * 
 */
public function user()
{
    return $this->belongsToMany('App\Models\User','participant')
                ->using('App\Models\TaskUser');
}

/**
 * 
 */
public function taskUser()
{
    return $this->hasMany('App\Models\TaskUser');
}

/**
 * Obtient les utilisateurs de la tâche
 */
public function users()
{
    return $this->belongsTo('App\Models\User');
}

/**
 * Obtient les attachments de la tâche
 */
public function attachments()
{
    return $this->hasMany('App\Models\Attachment');
}

/**
 * Obtient les commentaires de la tâche
 */
public function comments()
{
    return $this->hasMany('App\Models\Comment');
}

/**
 * Obtient la catégory de la tâche
 */
public function category()
{
    return $this->belongsTo(Category::class);
}

/**
 * Obtient les utilisateurs assignés à la tâche
 */
public function assignedUsers(){
    return $this->belongsToMany("App\Models\User")
                ->using('App\Models\TaskUser')
                // ->wherePivot("assigned", "=", true)
                // ->withPivot('owner','assigned')
                ;
}

/**
 * Obtient le board où il y a la tâche
 */
public function board(){
    return $this->belongsTo("App\Models\Board");
}

/**
 * 
 */
public function participants() {
    return $this->hasManyThrough("App\Models\Board", "App\Models\User");
}
}
