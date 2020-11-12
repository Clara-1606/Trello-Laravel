<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;


class TaskUser extends Pivot
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
    public $fillable=["assigned",'user_id','task_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task_user';

    /**
     * Obtient l'utilisateur qui a la task
     */
    public function user (){
        return $this ->belongsTo("App\Models\User");
    }

    /**
     * Obtient la tâche qu'à l'utilisateur
     */
    public function task (){
        return $this ->belongsTo("App\Models\Task");
    }
}
