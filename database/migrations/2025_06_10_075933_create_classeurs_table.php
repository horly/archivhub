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
        Schema::create('classeurs', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 255);
            $table->string('description', 255);
            $table->bigInteger('boite_id')->unsigned()->index();
            $table->foreign('boite_id')
                    ->references('id')->on('boites')
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
        Schema::dropIfExists('classeurs');
    }
};
