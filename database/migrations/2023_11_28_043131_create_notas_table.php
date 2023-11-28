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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('KodeNota');
            $table->string('KodeTenan');
            $table->string('KodeKasir');
            $table->date('TglNota');
            $table->time('JamNota');
            $table->integer('JumlahBelanja');
            $table->integer('Diskon');
            $table->integer('Total');
            $table->timestamps();

            $table->foreign('KodeTenan')->references('KodeTenan')->on('tenans')->onDelete('cascade');
            $table->foreign('KodeKasir')->references('KodeKasir')->on('kasirs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};