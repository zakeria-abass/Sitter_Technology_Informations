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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('about_ar');
            $table->text('about_en');
            $table->string('student_ar')->nullable();
            $table->string('student_en')->nullable();
            $table->string('progr_lang')->nullable();
            $table->string('attachment')->nullable();
            $table->text('url');
            $table->boolean('download')->default(false);
            $table->text('imge');
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
        Schema::dropIfExists('projects');
    }
};
