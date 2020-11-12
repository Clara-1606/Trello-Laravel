<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['file',"filename",'size','type','user_id','task_id'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attachments';


    /**
 * Obtient l'utilisateur qui possède le fichier
 */
    public function user()
{
    return $this->belongsTo('App\Models\User');
}

/**
 * Obtient la task qui possède le fichier
 */
public function task()
{
    return $this->belongsTo('App\Models\Task');
}
}

