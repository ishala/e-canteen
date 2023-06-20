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
        Schema::create('history_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_price');
            $table->integer('num_table');
            $table->text('all_products');
            $table->boolean('status')->default(false);
            $table->foreignId('trans_id');
            $table->foreign('trans_id')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_transactions');
    }
};
