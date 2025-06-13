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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')
                ->nullable()
                ->constrained('stocks')
                ->onDelete('set null');
            $table->string('description');
            $table->date('payment_date');
            $table->integer('amount');
            $table->integer('in_yen');
            $table->date('payment_recieved_date')
                ->nullable();
            $table->foreignId('customer_account_id')
                ->nullable()
                ->constrained('customer_accounts')
                ->onDelete('set null');
            $table->string('file', 100);
            $table->enum('status', ['approved', 'not approved'])
                ->default('not approved');
            $table->boolean('viewed')
                ->default(false);
            $table->foreignId('user_id')
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
        Schema::dropIfExists('payments');
    }
};
