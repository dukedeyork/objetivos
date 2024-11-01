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
        Schema::create('objetivo_ventas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_number');
            $table->bigInteger('month');
            $table->bigInteger('year');
            $table->bigInteger('sucursal');
            $table->bigInteger('paquete_value_now');
            $table->decimal('objetive_sales', 10, 2);
            $table->decimal('objetive_incomes', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetivo_ventas');
    }
};

