<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel principal') }}
        </h2>
    </x-slot>

     <div class="container">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h3>Hola {{$client_name}}, ¿Como estás?. Hoy es {{ date('d-m-Y') }}.</h3>
             </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
              <h3>Cada paquete cuesta hoy: $ {{number_format($sumapaquetes)}}.</h3>
            </div>
        </div>

        <h3 class="mb-3 mt-3 text-center">¿Que periodo deseas consultar?</h3>


        <form method="POST" action="{{ route('panel.filtrado') }}" class="mt-3">
            @csrf
    
            <div class="mb-3 mt-3">
            <select class="form-select mt-3 mb-3" aria-label="Default select example" required name="sucursal">
              <option selected value="1">Sucursal 1</option>
              <option value="2">Sucursal 2</option>
              <option value="3">Sucursal 3</option>
                </select>
                </div>
    
            <div class="mt-3">
                <select class="form-select mt-3 mb-3" aria-label="Default select example" required name="month">
                  <option selected value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
                </div>

                <div class="mb-3 mt-3">
                    <select class="form-select mt-3 mb-3" aria-label="Default select example" required name="year">
                      <option selected value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                    </select>
                    </div>
    
            <button type="submit" class="btn btn-primary mb-3 mt-3">Filtrar</button>
            
          </form>

          
    </div>

   
    
</x-app-layout>


