<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;
    public $timestamps =false;
    public $fillable=["assigned",'user_id','task_id'];
    protected $table = 'participate';
}
