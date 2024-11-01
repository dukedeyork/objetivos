<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Objetivos de Ventas y Cobranzas:') }}
        </h2>
    </x-slot>

    <div class="container">
      <button type="button" class="btn btn-warning mt-3 mb-3"><a href="{{ route('objetivo_venta.index') }}">Volver</a></button>



      <form action="{{ route('objetivo_venta.update', $objetivo_venta->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Mes</label>
          <input type="number" class="form-control" name="month" value="{{ $objetivo_venta->month }}">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Año</label>
          <input type="number" class="form-control" name="year" value="{{ $objetivo_venta->year }}">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Sucursal</label>
          <input type="number" class="form-control" name="sucursal" value="{{ $objetivo_venta->sucursal }}">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Valor del Objetivo de Ventas</label>
          <input type="decimal" class="form-control" name="objetive_sales" value="{{ $objetivo_venta->objetive_sales }}">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Valor del Objetivo de Cobranzas</label>
          <input type="decimal" class="form-control" name="objetive_incomes" value="{{ $objetivo_venta->objetive_incomes }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>

      </form>

    </div>

   
    
</x-app-layout>


