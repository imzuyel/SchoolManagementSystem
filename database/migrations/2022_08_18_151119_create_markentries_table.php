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
        Schema::create('markentries', function (Blueprint $table) {
            $table->id();
            $table->integer('mark')->nullable();
            $table->foreignId('student_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();

            $table->foreignId('year_id')
                ->constrained('years')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();

            $table->foreignId('class_id')
                ->constrained('student_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();

            $table->integer('assignsubject_id')->nullable();

            $table->foreignId('examtype_id')
                ->constrained('examtypes')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('markentries');
    }
};