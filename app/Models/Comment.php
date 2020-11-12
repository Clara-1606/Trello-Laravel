<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=["text",'user_id','task_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';


    /**
     * Obtient l'utilisateur qui a écrit le commentaire
     */
    public function user()
{
    return $this->belongsTo('App\Models\User');
}

/**
 * Obtient la tâche qui à été commentée
 */
public function task()
{
    return $this->belongsTo('App\Models\Task');
}
}
