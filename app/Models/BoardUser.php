<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardUser extends Pivot
{
    //
    public $incrementing = true;
    use HasFactory;
    protected $table = 'board_user';

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function board(){
        return $this->belongsTo("App\Models\Board");
    }

    public function tasks(){
        return $this->hasMany("App\Models\Task");
    }
}
