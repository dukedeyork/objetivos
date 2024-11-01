<?php

namespace App\Http\Controllers;
use App\Models\RegistroDiario;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class registroDiarioController extends Controller
{
    public function index()
    {


        $client_number = auth()->user()->client_number;


        /* CON ESTA CONSULTA SUMO EL VALOR DE LA COLUMNA PRICE, ES DECIR EL PRECIO TOTAL DEL PAQUETE */
        $sumapaquetes = DB::table('paquetes')->get()->sum('price');
        $contarregistros = DB::table('registro_diarios')->where('client_number', $client_number)->get()->count('id');
        $ultimoregistro = DB::table('registro_diarios')->where('client_number', $client_number)->get()->max('updated_at');

        

        $registros_diarios = DB::table('registro_diarios')->where('client_number', $client_number)->orderBy('date', 'desc')->get();

        return view('registro_diario.index', compact('registros_diarios', 'contarregistros', 'ultimoregistro'));
    }


    public function filtrado(Request $request) {

        $client_number = auth()->user()->client_number;
        
        $sucursal = $request->sucursal;

        $start_filter_day = $request->start_filter_day;

        $end_filter_day = $request->end_filter_day;


        $registro_diario = RegistroDiario::whereBetween('date', [$start_filter_day, $end_filter_day])->where('client_number', $client_number)->where('sucursal' , $sucursal)->orderBy('date')->get();


        return view('registro_diario.filtrado', compact('registro_diario'));

    }


    public function create()
    {
        return view('registro_diario.create');    
    }

    public function store(Request $request)
    {
           /* 
           ESTE ES EL METODO MAS LARGO
           
           $note = new Note;
           $note->title = $request->title;
           $note->description = $request->description;
           $note->save();
           return redirect()->route('note.index'); */


           /*METODO ESTATICO A CONTINUACION*/
           RegistroDiario::create($request->all());
           return redirect()->route('registro_diario.index');
    }

    public function edit(RegistroDiario $registro_diario)
    {
        return view('registro_diario.edit', compact('registro_diario'));
    }

    public function update(Request $request, RegistroDiario $registro_diario)
    {
        $registro_diario->update($request->all());
        return redirect()->route('registro_diario.index');
    }

    public function show(RegistroDiario $registro_diario)
    {
        return view('registro_diario.show', compact('paquete'));
    }

    public function destroy(RegistroDiario $registro_diario)
    {
        $registro_diario->delete();
        return redirect()->route('registro_diario.index');

    }
}

