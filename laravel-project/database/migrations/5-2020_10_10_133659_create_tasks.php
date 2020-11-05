<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table ->string('title');
            $table -> text('description');
            $table -> date('due_date');
            $table->enum('state', ['todo', 'ongoing','done']);
            $table -> foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table -> foreignId('board_id')->constrained('boards')->onDelete('cascade');
            $table->timestamps();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
