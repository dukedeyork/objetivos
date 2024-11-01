<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Objetivos de Ventas y Cobranzas:') }}
        </h2>
    </x-slot>

     <div class="container">

      <a href="{{ route('objetivo_venta.index') }}"><button type="button" class="btn btn-primary mt-3 mb-3">Regresar</button></a>

      <div class="card mt-3 mb-3">
        <div class="card-body">
          <h3>La suma de los paquetes objetivo para este año es: {{$suma_objetivo_venta}}</h3>
        </div>
      </div>

      <div class="card mt-3 mb-3">
        <div class="card-body">
          <h3>Cada paquete cuesta hoy: $ {{number_format($sumapaquetes)}}</h3>
        </div>
      </div>

       <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th scope="col">Mes</th>
            <th scope="col">Año</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Valor del objetivo de Ventas</th>
            <th scope="col">Valor del objetivo de Cobranzas</th>
            <th scope="col">Actualizado</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($objetivo_venta as $objetivo_venta)
          <tr>
            <td class="text-center">{{ $objetivo_venta->month }}</td>
            <td class="text-center">{{ $objetivo_venta->year }}</td>
            <td class="text-center">{{ $objetivo_venta->sucursal }}</td>
            <td class="text-center">{{ $objetivo_venta->objetive_sales }} ($ {{number_format($objetivo_venta->objetive_sales * $objetivo_venta->paquete_value_now)}})</td>
            <td class="text-center">{{ $objetivo_venta->objetive_incomes }} ($ {{number_format($objetivo_venta->objetive_incomes * $objetivo_venta->paquete_value_now)}})</td>
            <td class="text-center">{{ $objetivo_venta->updated_at->format('d-m-Y') }}</td>
            <td class="text-center col-1">           
                <form action="{{ route('objetivo_venta.destroy', $objetivo_venta->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    
                    <input type="submit" class="btn btn-danger" value="Borrar">
                </form>
            </td>
            <td class="text-center col-1"><a href="{{ route('objetivo_venta.edit', $objetivo_venta->id) }}" class="btn btn-secondary ">Editar</a></td>
          </tr>

          @empty
    
            <p>NO SE HAN INGRESADO REGISTROS AUN.</p>
        
            @endforelse        
        </tbody>
      </table>
    </div>

   
    
</x-app-layout>


