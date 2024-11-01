<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registros Diarios:') }}
        </h2>
    </x-slot>

    <div class="container">
      <button type="button" class="btn btn-warning mt-3 mb-3"><a href="{{ route('registro_diario.index') }}">Volver</a></button>



      <form action="{{ route('registro_diario.store') }}" method="POST">
        @csrf

        <input type="hidden" name="client_number" value="{{ Auth::user()->client_number }}">

        {{-- <input type="hidden" name="paquete_value_now" value="{{ $sumapaquetes }}" placeholder="{{ $sumapaquetes }}"> --}}

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Fecha</label>
          <input type="date" class="form-control" name="date">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Sucursal</label>
          <input type="number" class="form-control" name="sucursal">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Ventas</label>
          <input type="number" class="form-control" name="sales_today">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Cobranzas</label>
          <input type="number" class="form-control" name="incomes_today">
        </div>

        <button type="submit" class="btn btn-success">Crear</button>

      </form>

    </div>

   
    
</x-app-layout>


