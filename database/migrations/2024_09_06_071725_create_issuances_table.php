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
            $table->year('vintage');
            $table->integer('quantity');
            $table->string('product');
            $table->date('issuance_date');

            $table->string('project_issued_to')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('status')->nullable();
            $table->string('monitoring_period_start')->nullable();
            $table->string('monitoring_period_end')->nullable();
            $table->string('eligibilities_corsia_pilot_phase')->nullable();
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
