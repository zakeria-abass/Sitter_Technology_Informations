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
        Schema::create('abilit_role', function (Blueprint $table) {

            $table->foreignId('abilitie_id')->constrained('abilities');
            $table->foreignId('role_id')->constrained('roles');
            $table->primary(['abilitie_id','role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abilit_role');
    }
};
