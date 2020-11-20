<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Classe pivot qui met en relation les tâches et les utilisateurs
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

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
     * Renvoi l'utilisateur lié à la tâche
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Renvoi la tâche liée à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
