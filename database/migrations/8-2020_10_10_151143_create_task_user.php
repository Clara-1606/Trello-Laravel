<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table -> foreignId('task_id')->nullable()->constrained('tasks')->onDelete('set null');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table -> unique(['task_id','user_id']);
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_user');
    }
}
