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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('tel', 15);
            $table->string('email', 50);
            $table->string('facebook', 100);
            $table->string('address', 150);
            $table->integer('town_id');
            $table->integer('yearold');
            $table->integer('section');
            $table->string('clave', 20);
            $table->string('curp', 18);
            $table->enum('type', ['Urbano', 'Rural']);
            $table->string('ruta', 10);
            $table->integer('coordinator_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
