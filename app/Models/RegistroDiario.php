<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDiario extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_number",
        "date",
        "sucursal",
        "sales_today",
        "incomes_today",
    ];
}