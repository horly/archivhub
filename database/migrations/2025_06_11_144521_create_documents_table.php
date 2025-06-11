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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255);
            $table->string('reference', 255);
            $table->string('origine', 255)->nullable();
            $table->integer('duree_conservation')->nullable();
            $table->text('lien_numerisation')->nullable();
            $table->text('context')->nullable();
            $table->bigInteger('chemise_id')->unsigned()->index();
            $table->foreign('chemise_id')
                    ->references('id')->on('chemises')
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
        Schema::dropIfExists('documents');
    }
};
