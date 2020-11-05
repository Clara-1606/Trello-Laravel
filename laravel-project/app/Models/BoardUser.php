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
}
