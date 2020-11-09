<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps =false;
    protected $table = 'users';

    
public function task()
{
    return $this->belongsToMany('App\Models\Task');
}

public function tasks()
{
    return $this->hasMany('App\Models\Task');
}

public function comments()
{
    return $this->hasMany('App\Models\Comment');
}
public function attachments()
{
    return $this->hasMany('App\Models\Attachment');
}

public function ownedBoards(){
    return $this->hasMany('App\Models\Board');
}

public function board(){
    return $this->belongsToMany('App\Models\Board');
}

public function boards(){
    return $this->belongsToMany('App\Models\Board');
}

public function assignedTasks(){
    return $this->belongsToMany('App\Models\Task');
}

public function allTasks(){
    return $this->belongsTo('App\Models\Task');
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
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
