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
            $table->integer('user_id')->unsigned() ;
            $table->integer('project_id')->unsigned();
            $table->string('task_title');
            $table->text('task') ;
            $table->integer('priority')->default(0) ;
            $table->boolean('completed')->default(0) ;
            $table->timestamps();
            $table->dateTime('duedate')->nullable();
        });
        /*
        Delete tasks associated with this project ID
        */
        /*
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade') ;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ;
        });*/

        /*
        Delete tasks associated with this user ID
        */
        // Schema::table('tasks', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ;
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
