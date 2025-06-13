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
            $table->foreignId('stock_id')
                ->constrained('stocks')
                ->cascadeOnDelete();
            $table->string('japanese_export', 100)
                ->nullable();
            $table->string('english_export', 100)
                ->nullable();
            $table->string('final_invoice', 100)
                ->nullable();
            $table->string('inspection_certificate', 100)
                ->nullable();
            $table->string('bl_copy', 100)
                ->nullable();
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
