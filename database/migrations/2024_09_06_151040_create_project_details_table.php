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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('project_developer')->nullable();
            $table->text('methodology')->nullable();
            $table->string('standards_version')->nullable();
            $table->string('project_scale')->nullable();
            $table->string('product')->nullable();
            $table->date('crediting_period_start')->nullable();
            $table->date('crediting_period_end')->nullable();
            $table->integer('annual_estimated_credits')->nullable();
            $table->text('description')->nullable();
            $table->text('summary')->nullable();
            $table->text('sources')->nullable();
            $table->text('google_maps_embed_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
