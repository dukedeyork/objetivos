<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Paquete de productos:') }}
        </h2>
    </x-slot>

    <div class="container">

      <div class="card mt-3 mb-3">
        <div class="card-body">
          <h3>Cada paquete cuesta hoy: $ {{number_format($sumapaquetes)}}</h3>
        </div>
      </div>

      <div class="card mt-3 mb-3">
        <div class="card-body">
          <h3>Hay {{ $contarproductos }} productos que integran este paquete.</h3>
        </div>
      </div>

      <div class="card mt-3 mb-2">
        <div class="card-body">
          <h3>La ultima actualización de un artículo fue el {{ \Carbon\Carbon::createFromTimestamp(strtotime($ultima_actualizacion))->format('d-m-Y')}}.</h3>
        </div>
      </div>

          <a href="{{ route('paquete.create') }}"><button type="button" class="btn btn-success mt-3 mb-3">Crear un registro nuevo</button></a>

          <table class="table table-bordered table-striped">
            <thead>
              <tr class="text-center">
                <th scope="col">Articulo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Precio</th>
                <th scope="col">Actualizado</th>
                <th colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($paquetes as $paquete)
              <tr>
                <td class="text-center">{{ $paquete->article }}</td>
                <td class="text-uppercase">{{ $paquete->name }}</td>
                <td class="text-center text-uppercase">{{ $paquete->brand }}</td>
                <td class="text-end">$ {{ number_format($paquete->price) }}</td>
                <td class="text-center">{{ $paquete->updated_at->format('d-m-Y') }}</td>
                <td class="text-center col-1">           
                    <form action="{{ route('paquete.destroy', $paquete->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        
                        <input type="submit" class="btn btn-danger" value="Borrar">
                    </form>
                </td>
                <td class="text-center col-1"><a href="{{ route('paquete.edit', $paquete->id) }}" class="btn btn-secondary ">Editar</a></td>
              </tr>
              @empty
        
                <p>NO hay datos.</p>
            
                @endforelse
        
            </tbody>
          </table>


    </div>

   
    
</x-app-layout>


