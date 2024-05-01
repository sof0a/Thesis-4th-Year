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
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id'); // Custom primary key column name
            $table->unsignedInteger('driver_id');
            $table->unsignedInteger('passenger_id');
            $table->dateTime('date');
            $table->decimal('fare_amount', 10, 2);
            $table->string('landmark');
            $table->string('pickup_point');
            $table->string('dropoff_point');
            $table->text('notes')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
