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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 50);
            $table->string('customer_lastname', 50);
            $table->string('slug', 150);
            $table->string('customer_address', 100);
            $table->string('customer_phone_number', 30);
            $table->string('customer_email');
            $table->text('customer_note')->nullable();
            $table->decimal('total_price', 6, 2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
