<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;


class TaskUser extends Pivot
{
    use HasFactory;
    public $incrementing = true;
    public $timestamps =false;
    public $fillable=["assigned",'user_id','task_id'];
    protected $table = 'task_user';

    
}
