<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stu_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name')->unique();
            $table->string('class_code')->unique();
            $table->string('teacher');
            $table->string('start_at');
            $table->string('end_at');
            $table->string('day');
            $table->string('type');
            $table->string('color');
            $table->string('status');
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
        Schema::dropIfExists('stu_classes');
    }
}
