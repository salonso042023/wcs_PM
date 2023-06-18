<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete() ;
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('task_title');
            $table->integer('priority')->default(0) ;
            $table->boolean('completed')->default(0) ;
            $table->timestamps();
            $table->dateTime('duedate')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
