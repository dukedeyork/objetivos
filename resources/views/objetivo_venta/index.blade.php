<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Objetivos de Ventas y Cobranzas:') }}
        </h2>
    </x-slot>

     <div class="container">


          <a href="{{ route('objetivo_venta.create') }}"><button type="button" class="btn btn-success mt-3 mb-3">Registrar un nuevo objetivo de ventas</button></a>

          <h3 class="text-center mt-3 mb-3">Seleccione que registros quiere ver:</h3>

          <form method="POST" action="{{ route('objetivo_venta.filtrado') }}">
            @csrf

            <select class="form-select mt-3 mb-3" aria-label="Default select example" required name="sucursal">
              <option selected>Seleccione la sucursal</option>
              <option value="1">Sucursal 1</option>
              <option value="2">Sucursal 2</option>
              <option value="3">Sucursal 3</option>
            </select>

            <select class="form-select mt-3 mb-3" aria-label="Default select example" required name="year">
              <option selected>Seleccione el año:</option>
              <option value="2024">Año 2024</option>
              <option value="2025">Año 2025</option>
              <option value="2026">Año 2026</option>
              <option value="2026">Año 2027</option>
            </select>


            <button type="submit" class="btn btn-primary">Filtrar</button>
            
          </form>

          <h3 class="text-center mt-3 mb-3">Historico de objetivos creados:</h3>

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
                <td class="text-center">{{  \Carbon\Carbon::createFromTimestamp(strtotime($objetivo_venta->updated_at))->format('d-m-Y') }}</td>
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
        
                <p>NO hay datos.</p>
            
                @endforelse        
            </tbody>
          </table>


    </div>

   
    
</x-app-layout>


