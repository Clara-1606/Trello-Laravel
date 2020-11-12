<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardUser extends Pivot
{
    use HasFactory;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true; //Comme c'est une table Pivot, il faut lui indiquer que la clé primaire est incrémentée

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['user_id','board_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'board_user';

/**
     * Obtient l'utilisateur qui a le board
     */
    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    /**
     * Obtient le board qui a l'utilisateur
     */
    public function board(){
        return $this->belongsTo("App\Models\Board");
    }

    /**
     * Obtient les tâches du board
     */
    public function tasks(){
        return $this->hasMany("App\Models\Task");
    }
}
