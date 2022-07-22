<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('assignsubjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')
                ->constrained('subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('class_id')
                ->constrained('student_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->double('full_mark');
            $table->double('pass_mark');
            $table->double('subjective_mark');
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
        Schema::dropIfExists('assignsubjects');
    }
};