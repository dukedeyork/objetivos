<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registros Diarios:') }}
        </h2>
    </x-slot>

     <div class="container">

      <div class="card mt-3 mb-3">
        <div class="card-body">
          <h3>Hasta la fecha de hoy se han cargado {{$contarregistros}} registros.</h3>
        </div>
      </div>

      <div class="card mt-3 mb-3">
        <div class="card-body">
          <h3>El ultimo registro fue el {{\Carbon\Carbon::createFromTimestamp(strtotime($ultimoregistro))->format('d-m-Y')}}.</h3>
        </div>
      </div>


      <a href="{{ route('registro_diario.create') }}"><button type="button" class="btn btn-success mt-3 mb-3">Registrar un movimiento diario</button></a>


    <h3 class="text-center mt-3 mb-3">Seleccione que registros quiere ver:</h3>

    <form method="POST" action="{{ route('registro_diario.filtrado') }}">
        @csrf

        <div class="mb-3">
        <select class="form-select mt-3 mb-3" aria-label="Default select example" required name="sucursal">
          <option selected value="1">Sucursal 1</option>
          <option value="2">Sucursal 2</option>
          <option value="3">Sucursal 3</option>
        </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Empezando en el dia:</label>
            <input type="date" class="form-control" id="start_filter_day" name="start_filter_day" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Terminando en el dia:</label>
            <input type="date" class="form-control" id="end_filter_day" name="end_filter_day" required>
        </div>

        <button type="submit" class="btn btn-primary">Filtrar</button>
        
      </form>

      <h3 class="text-center mt-3 mb-3">Historico de Registros creados:</h3>

    <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th scope="col">Fecha</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Ventas</th>
            <th scope="col">Cobranzas</th>
            <th scope="col">Actualizado</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($registros_diarios as $registro_diario)
          <tr>
            <td class="text-center">{{ date('d-m-Y', strtotime($registro_diario->date)) }}</td>
            <td class="text-center">{{ $registro_diario->sucursal }}</td>
            <td class="text-end">$ {{ number_format($registro_diario->sales_today) }}</td>
            <td class="text-end">$ {{ number_format($registro_diario->incomes_today) }}</td>
            <td class="text-center">{{  \Carbon\Carbon::createFromTimestamp(strtotime($registro_diario->updated_at))->format('d-m-Y') }}</td>
            <td class="text-center col-1">           
                <form action="{{ route('registro_diario.destroy', $registro_diario->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    
                    <input type="submit" class="btn btn-danger" value="Borrar">
                </form>
            </td>
            <td class="text-center col-1"><a href="{{ route('registro_diario.edit', $registro_diario->id) }}" class="btn btn-secondary ">Editar</a></td>
          </tr>
          @empty
    
            <p>NO hay datos.</p>
        
            @endforelse
    
        </tbody>
      </table>
          

    </div>

   
    
</x-app-layout>


