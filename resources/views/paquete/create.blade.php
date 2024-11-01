<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
      <button type="button" class="btn btn-warning mt-3 mb-3"><a href="{{ route('paquete.index') }}">Volver</a></button>



      <form action="{{ route('paquete.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Articulo</label>
          <input type="number" class="form-control" name="article">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Marca</label>
          <input type="text" class="form-control" name="brand">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Precio</label>
          <input type="number" class="form-control" name="price">
        </div>

        <button type="submit" class="btn btn-success">Crear</button>

      </form>

    </div>

   
    
</x-app-layout>


