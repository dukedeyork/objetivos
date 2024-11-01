<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registros Diarios:') }}
        </h2>
    </x-slot>

    <div class="container">
      <button type="button" class="btn btn-warning mt-3 mb-3"><a href="{{ route('registro_diario.index') }}">Volver</a></button>



      <form action="{{ route('registro_diario.update', $registro_diario->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Fecha</label>
          <input type="date" class="form-control" name="date" value="{{ $registro_diario->date }}" readonly>
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Sucursal</label>
          <input type="number" class="form-control" name="sucursal" value="{{ $registro_diario->sucursal }}" readonly>
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Ventas</label>
          <input type="number" class="form-control" name="sales_today" value="{{ $registro_diario->sales_today }}">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Cobranzas</label>
          <input type="number" class="form-control" name="incomes_today" value="{{ $registro_diario->incomes_today }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>

      </form>

    </div>

   
    
</x-app-layout>


