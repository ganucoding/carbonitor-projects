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
        Schema::create('issuances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->year('vintage')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('product')->nullable();
            $table->date('issuance_date')->nullable();

            $table->string('project_issued_to')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('status')->nullable();
            $table->string('monitoring_period_start')->nullable();
            $table->string('monitoring_period_end')->nullable();
            $table->boolean('eligibilities_corsia_pilot_phase')->nullable();
            $table->text('history')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issuances');
    }
};
