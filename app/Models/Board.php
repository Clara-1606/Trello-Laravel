<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=["title",'description','user_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boards';


/**
 * Obtient l'utilisateur qui possède le board
 */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Les utilisateurs appartiennent au board
     */
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Obtenez les tâches du board
     */
    public function tasks()
{
    return $this->hasMany('App\Models\Task');
}

/** 
 * Obtenez le propriétaire du board
*/
public function owner()
{
    return $this->belongsTo('App\Models\User');
}
}
