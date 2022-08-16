<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assingstudents', function (Blueprint $table) {
            $table->id();
            $table->integer('roll')->nullable();
            $table->foreignId('student_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('class_id')
                ->constrained('student_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('year_id')
                ->constrained('years')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('group_id')
                ->constrained('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('shift_id')
                ->constrained('shifts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('assingstudents');
    }
};