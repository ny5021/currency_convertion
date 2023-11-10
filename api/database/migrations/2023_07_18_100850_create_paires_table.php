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
        Schema::create('paires', function (Blueprint $table) {
            $table->primary(['from_devise', 'to_devise']);
            $table->string('from_devise')->nullable(false);
            $table->string('to_devise')->nullable(false);
            $table->float('value')->nullable(false);
            $table->integer('nb_converter')->default(0)->nullable(false);
            $table->timestamps();

            //foreign key
            $table->foreign('from_devise')->references('name')->on('devises')->onDelete('cascade');
            $table->foreign('to_devise')->references('name')->on('devises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paires');
    }
};
