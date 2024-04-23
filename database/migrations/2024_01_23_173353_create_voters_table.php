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
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->integer('coordinator_id');
            $table->integer('agent_id');
            $table->integer('activist_id');
            $table->integer('town_id');
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('email', 100);
            $table->string('facebook', 100);
            $table->string('street', 150);
            $table->string('extNum', 10);
            $table->integer('cologne_id');
            $table->integer('edad');
            $table->string('claveElector', 100);
            $table->string('curp', 18);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
