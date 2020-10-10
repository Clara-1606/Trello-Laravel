<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    public $timestamps =false;
    public $fillable=["filename",'size','blob','title','user_id','task_id'];
    protected $table = 'attachments';

    public function user()
{
    return $this->belongsTo('App\Models\User');
}

public function task()
{
    return $this->belongsTo('App\Models\Task');
}
}

