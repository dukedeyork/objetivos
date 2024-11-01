<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ObjetivoVentaController;
use App\Http\Controllers\RegistroDiarioController;
use App\Http\Controllers\PanelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* CREACION DE RUTAS PARA EL MODELO PAQUETE */

    Route::get('/paquete', [PaqueteController::class, 'index'])->name('paquete.index');
    Route::get('/paquete/create', [PaqueteController::class, 'create'])->name('paquete.create');
    Route::post('/paquete/store', [PaqueteController::class, 'store'])->name('paquete.store');
    Route::get('/paquete/edit/{paquete}', [PaqueteController::class, 'edit'])->name('paquete.edit');
    Route::put('/paquete/update/{paquete}', [PaqueteController::class, 'update'])->name('paquete.update');
    Route::get('/paquete/show/{paquete}', [PaqueteController::class, 'show'])->name('paquete.show');
    Route::delete('/paquete/destroy/{paquete}', [PaqueteController::class, 'destroy'])->name('paquete.destroy');

    /* CREACION DE RUTAS PARA EL MODELO OBJETIVO DE VENTAS */

    Route::get('/objetivo_venta', [ObjetivoVentaController::class, 'index'])->name('objetivo_venta.index');
    Route::post('/objetivo_venta/filtrado', [ObjetivoVentaController::class, 'filtrado'])->name('objetivo_venta.filtrado');
    Route::get('/objetivo_venta/create', [ObjetivoVentaController::class, 'create'])->name('objetivo_venta.create');
    Route::post('/objetivo_venta/store', [ObjetivoVentaController::class, 'store'])->name('objetivo_venta.store');
    Route::get('/objetivo_venta/edit/{objetivo_venta}', [ObjetivoVentaController::class, 'edit'])->name('objetivo_venta.edit');
    Route::put('/objetivo_venta/update/{objetivo_venta}', [ObjetivoVentaController::class, 'update'])->name('objetivo_venta.update');
    Route::get('/objetivo_venta/show/{objetivo_venta}', [ObjetivoVentaController::class, 'show'])->name('objetivo_venta.show');
    Route::delete('/objetivo_venta/destroy/{objetivo_venta}', [ObjetivoVentaController::class, 'destroy'])->name('objetivo_venta.destroy');

    /* CREACION DE RUTAS PARA LOS REGISTRO DE VENTAS Y COBRANZAS DIARIAS */

    Route::get('/registro_diario', [RegistroDiarioController::class, 'index'])->name('registro_diario.index');
    Route::post('/registro_diario/filtrado', [RegistroDiarioController::class, 'filtrado'])->name('registro_diario.filtrado');
    Route::get('/registro_diario/create', [RegistroDiarioController::class, 'create'])->name('registro_diario.create');
    Route::post('/registro_diario/store', [RegistroDiarioController::class, 'store'])->name('registro_diario.store');
    Route::get('/registro_diario/edit/{registro_diario}', [RegistroDiarioController::class, 'edit'])->name('registro_diario.edit');
    Route::put('/registro_diario/update/{registro_diario}', [RegistroDiarioController::class, 'update'])->name('registro_diario.update');
    Route::get('/registro_diario/show/{registro_diario}', [RegistroDiarioController::class, 'show'])->name('registro_diario.show');
    Route::delete('/registro_diario/destroy/{registro_diario}', [RegistroDiarioController::class, 'destroy'])->name('registro_diario.destroy');


        /* CREACION DE RUTAS PARA EL PANEL DE CONTROL QUE APARECE EN EL INICIO DE LA WEB */

        Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');
        Route::post('/panel/filtrado', [PanelController::class, 'filtrado'])->name('panel.filtrado');
        /*Route::get('/registro_diario/create', [RegistroDiarioController::class, 'create'])->name('registro_diario.create');
        Route::post('/registro_diario/store', [RegistroDiarioController::class, 'store'])->name('registro_diario.store');
        Route::get('/registro_diario/edit/{registro_diario}', [RegistroDiarioController::class, 'edit'])->name('registro_diario.edit');
        Route::put('/registro_diario/update/{registro_diario}', [RegistroDiarioController::class, 'update'])->name('registro_diario.update');
        Route::get('/registro_diario/show/{registro_diario}', [RegistroDiarioController::class, 'show'])->name('registro_diario.show');
        Route::delete('/registro_diario/destroy/{registro_diario}', [RegistroDiarioController::class, 'destroy'])->name('registro_diario.destroy'); */


});

require __DIR__.'/auth.php';
