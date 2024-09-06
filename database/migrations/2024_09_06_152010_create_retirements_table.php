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
        Schema::create('retirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->date('date')->nullable();
            $table->year('vintage')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('product')->nullable();
            $table->string('status')->nullable();
            $table->text('note')->nullable();

            $table->string('using_entity')->nullable();
            $table->string('use_case')->nullable();
            $table->string('use_case_authorisation')->nullable();
            $table->string('corresponding_adjustment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retirements');
    }
};
