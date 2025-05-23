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
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('cid', 100)
                ->unique();
            $table->string('name', 100);
            $table->string('company', 200);
            $table->string('phone', 15);
            $table->string('whatsapp', 15);
            $table->string('address');
            $table->string('city');
            $table->foreignId('country')
                ->nullable()
                ->constrained('countries')
                ->nullOnDelete();
            $table->text('description')
                ->nullable();
            $table->string('email', 100)
                ->nullable();
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currencies')
                ->onDelete('set null');
            $table->foreignId('agent_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_accounts');
    }
};
