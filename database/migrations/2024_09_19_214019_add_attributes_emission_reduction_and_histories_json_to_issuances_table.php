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
        Schema::table('issuances', function (Blueprint $table) {
            $table->boolean('attributes_emission_reduction')->nullable();
            $table->json('histories_json')->nullable(); // to store 3 columns/fields => credits, symbol & details
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('issuances', function (Blueprint $table) {
            $table->dropColumn('attributes_emission_reduction');
            $table->dropColumn('histories_json');
        });
    }
};
