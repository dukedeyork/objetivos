<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoVenta extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_number",
        "month",
        "year",
        "sucursal",
        "paquete_value_now",
        "objetive_sales",
        "objetive_incomes",
    ];
}