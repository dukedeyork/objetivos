<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registros Diarios:') }}
        </h2>
    </x-slot>

     <div class="container">

        <button type="button" class="btn btn-warning mt-3 mb-3"><a href="{{ route('registro_diario.index') }}">Volver</a></button>

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
            @forelse ($registro_diario as $registro_diario)
          <tr>
            <td class="text-center">{{ date('d-m-Y', strtotime($registro_diario->date)) }}</td>
            <td class="text-center">{{ $registro_diario->sucursal }}</td>
            <td class="text-center">$ {{ number_format($registro_diario->sales_today) }}</td>
            <td class="text-center">$ {{ number_format($registro_diario->incomes_today) }} </td>
            <td class="text-center">{{ $registro_diario->updated_at->format('d-m-Y') }}</td>
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
    
            <p>NO SE HAN INGRESADO REGISTROS AUN.</p>
        
            @endforelse        
        </tbody>
      </table>

    </div>

   
    
</x-app-layout>


