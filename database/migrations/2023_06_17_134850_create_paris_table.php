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
        Schema::create('paris', function (Blueprint $table) {
            $table->id('idparis');
            $table->decimal('montant');
            $table->enum('statut', ['A','G','P']);
            $table->decimal('gain');
            $table->integer('iduser');
            $table->integer('idchoix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paris');
    }
};
