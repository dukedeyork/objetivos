<?php

namespace App\Http\Controllers;
use App\Models\ObjetivoVenta;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ObjetivoVentaController extends Controller
{
    public function index()
    {

        /* CON ESTA CONSULTA SUMO EL VALOR DE LA COLUMNA PRICE, ES DECIR EL PRECIO TOTAL DEL PAQUETE 
        
        $contarproductos = DB::table('paquetes')->get()->count('id');
        $ultima_actualizacion = DB::table('paquetes')->get()->max('updated_at');*/

        $sumapaquetes = DB::table('paquetes')->get()->sum('price');

        $client_number = auth()->user()->client_number;

        $objetivo_venta = DB::table('objetivo_ventas')->where('client_number', $client_number)->orderBy('updated_at', 'desc')->get();

        return view('objetivo_venta.index', compact('objetivo_venta', 'sumapaquetes', 'client_number'));
    }

    public function filtrado(Request $request) {

        $client_number = auth()->user()->client_number;
        
        $sucursal = $request->sucursal;
        $year = $request->year;

        $objetivo_venta = ObjetivoVenta::where('sucursal', $sucursal)->where('year', $year)->where('client_number', $client_number)->orderBy('month')->get();

        $suma_objetivo_venta = ObjetivoVenta::where('client_number', $client_number)->where('sucursal', $sucursal)->where('year', $year)->sum('objetive_sales');

        $sumapaquetes = DB::table('paquetes')->get()->sum('price');


        return view('objetivo_venta.filtrado', compact('objetivo_venta', 'suma_objetivo_venta', 'sumapaquetes'));

    }


    public function create()
    {
        $sumapaquetes = DB::table('paquetes')->get()->sum('price');

        $client_number = auth()->user()->client_number;

        return view('objetivo_venta.create', compact('sumapaquetes', 'client_number'));    
    }

    public function store(Request $request)
    {

           /*METODO ESTATICO A CONTINUACION*/
            ObjetivoVenta::create($request->all());
           return redirect()->route('objetivo_venta.index');
    }

    public function edit(ObjetivoVenta $objetivo_venta)
    {
        return view('objetivo_venta.edit', compact('objetivo_venta'));
    }

    public function update(Request $request, ObjetivoVenta $objetivo_venta)
    {
        $objetivo_venta->update($request->all());
        return redirect()->route('objetivo_venta.index');
    }

    public function show(ObjetivoVenta $objetivo_venta)
    {
        return view('objetivo_venta.show', compact('objetivo_venta'));
    }

    public function destroy(ObjetivoVenta $objetivo_venta)
    {
        $objetivo_venta->delete();
        return redirect()->route('objetivo_venta.index');

    }

}
