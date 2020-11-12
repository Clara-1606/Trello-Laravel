<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $table = 'users';

 
    /**
     * Obtient la tâche de l'utilisateur
     */
public function task()
{
    return $this->belongsToMany('App\Models\Task');
}

/**
 * Obtient les tâches de l'utilisateur
 */
public function tasks()
{
    return $this->hasMany('App\Models\Task');
}

/**
 * Obtient les commentaires de l'utilisateur
 */
public function comments()
{
    return $this->hasMany('App\Models\Comment');
}

/**
 * Obtient les fichiers de l'utilisateur
 */
public function attachments()
{
    return $this->hasMany('App\Models\Attachment');
}

/**
 * Obtient les boards
 */
public function ownedBoards(){
    return $this->hasMany('App\Models\Board');
}

/**
 * Obtient les boards
 */
public function boards(){
    return $this->belongsToMany('App\Models\Board');
}

/**
 * Obtient les tâches assignées
 */
public function assignedTasks(){
    return $this->belongsToMany('App\Models\Task');
}

/**
 * Obtient toutes les tâches
 */
public function allTasks(){
    return $this->HasManyThrough('App\Models\Task','App\Models\Board');
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
