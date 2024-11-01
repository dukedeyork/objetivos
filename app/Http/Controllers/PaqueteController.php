<?php

namespace App\Http\Controllers;
use App\Models\Paquete;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function index()
    {

        /* CON ESTA CONSULTA SUMO EL VALOR DE LA COLUMNA PRICE, ES DECIR EL PRECIO TOTAL DEL PAQUETE */
        $sumapaquetes = DB::table('paquetes')->get()->sum('price');
        $contarproductos = DB::table('paquetes')->get()->count('id');
        $ultima_actualizacion = DB::table('paquetes')->get()->max('updated_at');

        $paquetes = Paquete::all();
        return view('paquete.index', compact('paquetes', 'sumapaquetes','contarproductos', 'ultima_actualizacion'));
    }

    public function create()
    {
        return view('paquete.create');    
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
            Paquete::create($request->all());
           return redirect()->route('paquete.index');
    }

    public function edit(Paquete $paquete)
    {
        return view('paquete.edit', compact('paquete'));
    }

    public function update(Request $request, Paquete $paquete)
    {
        $paquete->update($request->all());
        return redirect()->route('paquete.index');
    }

    public function show(Paquete $paquete)
    {
        return view('paquete.show', compact('paquete'));
    }

    public function destroy(Paquete $paquete)
    {
        $paquete->delete();
        return redirect()->route('paquete.index');

    }
}
