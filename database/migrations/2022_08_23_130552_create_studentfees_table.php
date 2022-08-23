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
        Schema::create('studentfees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')
                ->constrained('years')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();
            $table->foreignId('class_id')
                ->constrained('student_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();
            $table->foreignId('student_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();
            $table->foreignId('fee_category_id')
                ->constrained('feecategories')
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();
            $table->string('date')->nullable();
            $table->double('amount')->nullable();
            $table->tinyInteger('status')->nullable();

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
        Schema::dropIfExists('studentfees');
    }
};