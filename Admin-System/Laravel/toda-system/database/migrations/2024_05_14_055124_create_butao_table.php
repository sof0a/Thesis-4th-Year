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
        Schema::create('butaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('driver_id');
            $table->decimal('toda_commission', 10, 2);
            $table->decimal('toda_paid', 10, 2);
            $table->decimal('toda_balance', 10, 2);
            $table->string('toda_payment_status', 10);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('butaos');
    }
};
