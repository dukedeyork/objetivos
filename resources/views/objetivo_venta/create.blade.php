<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Objetivos de Ventas y Cobranzas:') }}
        </h2>
    </x-slot>

    <div class="container">
      <button type="button" class="btn btn-warning mt-3 mb-3"><a href="{{ route('objetivo_venta.index') }}">Volver</a></button>



      <form action="{{ route('objetivo_venta.store') }}" method="POST">
        @csrf

        <input type="hidden" name="client_number" value="{{ Auth::user()->client_number }}">

        <input type="hidden" name="paquete_value_now" value="{{ $sumapaquetes }}" placeholder="{{ $sumapaquetes }}">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Mes</label>
          <input type="number" class="form-control" name="month">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Año</label>
          <input type="number" class="form-control" name="year">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Sucursal</label>
          <input type="number" class="form-control" name="sucursal">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Valor del objetivo Venta</label>
          <input type="decimal" class="form-control" name="objetive_sales">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Valor del objetivo Cobranza</label>
          <input type="decimal" class="form-control" name="objetive_incomes">
        </div>

        <button type="submit" class="btn btn-success">Crear</button>

      </form>

    </div>

   
    
</x-app-layout>


