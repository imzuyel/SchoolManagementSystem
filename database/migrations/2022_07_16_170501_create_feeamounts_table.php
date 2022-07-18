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
        Schema::create('feeamounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_category_id')
                ->constrained('feecategories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('class_id')
                ->constrained('student_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->double('amount');
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
        Schema::dropIfExists('feeamounts');
    }
};