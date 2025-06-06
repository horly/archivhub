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
        Schema::create('boites', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 255);
            $table->string('description', 255);
            $table->bigInteger('etagere_id')->unsigned()->index();
            $table->foreign('etagere_id')
                    ->references('id')->on('etageres')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boites');
    }
};
