<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps =false;
    public $fillable=["name"];
    protected $table = 'categories';

    public function tasks()
{
    return $this->hasMany('App\Models\Task');
}
}
