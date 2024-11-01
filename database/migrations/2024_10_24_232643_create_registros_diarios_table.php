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
        Schema::create('registros_diarios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_number');
            $table->date('date');
            $table->bigInteger('sucursal');
            $table->bigInteger('sales_today');
            $table->bigInteger('incomes_today');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_diarios');
    }
};

