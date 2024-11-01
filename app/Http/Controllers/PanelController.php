<?php

namespace App\Http\Controllers;
use App\Models\Panel;
use App\Models\ObjetivoVenta;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {

        /* CON ESTA CONSULTA SUMO EL VALOR DE LA COLUMNA PRICE, ES DECIR EL PRECIO TOTAL DEL PAQUETE */

        $client_name = auth()->user()->name;
        $client_number = auth()->user()->client_number;
        


        $sumapaquetes = DB::table('paquetes')->get()->sum('price');
        $contarproductos = DB::table('paquetes')->get()->count('id');
        $ultima_actualizacion = DB::table('paquetes')->get()->max('updated_at');

        

        return view('panel.index', compact('client_number', 'client_name', 'sumapaquetes'));
    }

    public function filtrado(Request $request)
    {

        $client_name = auth()->user()->name;
        $client_number = auth()->user()->client_number;

        $sucursal = $request->sucursal;
        $year = $request->year;
        $month = $request->month;

        $sumapaquetes = DB::table('paquetes')->get()->sum('price');

        //ASIGNO MEDIANTE UN SWITCH EL NOMBRE DEL MES ASOCIADO A LA CONSULTA MEDIANTE EL NUMERO DEL MES

        switch($month){
            case('1'):
                $month_name = 'enero';
                break;

            case('2'):
                $month_name = 'febrero';
                break;

            case('3'):
                $month_name = 'marzo';
                break;

            case('4'):
                $month_name = 'abril';
                break;

            case('5'):
                $month_name = 'mayo';
                break;

            case('6'):
                $month_name = 'junio';
                break;

            case('7'):
                $month_name = 'julio';
                break;

            case('8'):
                $month_name = 'agosto';
                break;

            case('9'):
                $month_name = 'septiembre';
                break;

            case('10'):
                $month_name = 'octubre';
                break;

            case('11'):
                $month_name = 'noviembre';
                break;

            case('12'):
                $month_name = 'diciembre';
                break;                
            
                default:
            };
            

        //INICIO CONSULTA PARA FILTRAR EL OBJETIVO DE LA SUCURSAL, MES Y AÑO

        $objetive_sales = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', $month)->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_incomes = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', $month)->where('year', $year)->where('sucursal', $sucursal)->value('objetive_incomes');

        //HAGO CONSULTA SOBRE LOS OBJETIVO DE VENTAS PARA CADA MES DEL AÑO

        $objetive_sales_enero = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 1 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_febrero = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 2 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_marzo = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 3 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_abril = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 4 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_mayo = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 5 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_junio = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 6 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_julio = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 7 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_agosto = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 8 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_septiembre = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 9 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_octubre = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 10 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_noviembre = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 11 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        $objetive_sales_diciembre = DB::table('objetivo_ventas')->where('client_number', $client_number)->where('month', 12 )->where('year', $year)->where('sucursal', $sucursal)->value('objetive_sales');

        // HAGO CONSULTA SOBRE LAS VENTAS ACUMULADAS PARA CADA MES , PREVIO UN SWITCH PARA SELECCIONAR EL AÑO Y SETEAR LA VARIABLE DE INICIO Y FINAL DE DIA DE CONSULTA

        switch($year){
            case('2024'):
                $start_filter_month_enero = '2024-01-01';
                $end_filter_month_enero = '2024-01-31';

                $start_filter_month_febrero = '2024-02-01';
                $end_filter_month_febrero = '2024-02-29';

                $start_filter_month_marzo = '2024-03-01';
                $end_filter_month_marzo = '2024-03-31';

                $start_filter_month_abril = '2024-04-01';
                $end_filter_month_abril = '2024-04-30';

                $start_filter_month_mayo = '2024-05-01';
                $end_filter_month_mayo = '2024-05-31';

                $start_filter_month_junio = '2024-06-01';
                $end_filter_month_junio = '2024-06-30';

                $start_filter_month_julio = '2024-07-01';
                $end_filter_month_julio = '2024-07-31';

                $start_filter_month_agosto = '2024-08-01';
                $end_filter_month_agosto = '2024-08-31';

                $start_filter_month_septiembre = '2024-09-01';
                $end_filter_month_septiembre = '2024-09-30';

                $start_filter_month_octubre = '2024-10-01';
                $end_filter_month_octubre = '2024-10-31';

                $start_filter_month_noviembre = '2024-11-01';
                $end_filter_month_noviembre = '2024-11-30';

                $start_filter_month_diciembre = '2024-12-01';
                $end_filter_month_diciembre = '2024-12-31';

                break;

            case('2025'):
                $start_filter_month_enero = '2025-01-01';
                $end_filter_month_enero = '2024-01-31';

                $start_filter_month_febrero = '2025-02-01';
                $end_filter_month_febrero = '2025-02-28';

                $start_filter_month_marzo = '2025-03-01';
                $end_filter_month_marzo = '2025-03-31';

                $start_filter_month_abril = '2025-04-01';
                $end_filter_month_abril = '2025-04-30';

                $start_filter_month_mayo = '2025-05-01';
                $end_filter_month_mayo = '2025-05-31';

                $start_filter_month_junio = '2025-06-01';
                $end_filter_month_junio = '2025-06-30';

                $start_filter_month_julio = '2025-07-01';
                $end_filter_month_julio = '2025-07-31';

                $start_filter_month_agosto = '2025-08-01';
                $end_filter_month_agosto = '2025-08-31';

                $start_filter_month_septiembre = '2025-09-01';
                $end_filter_month_septiembre = '2025-09-30';

                $start_filter_month_octubre = '2025-10-01';
                $end_filter_month_octubre = '2025-10-31';

                $start_filter_month_noviembre = '2025-11-01';
                $end_filter_month_noviembre = '2025-11-30';

                $start_filter_month_diciembre = '2025-12-01';
                $end_filter_month_diciembre = '2025-12-31';
                break;

            case('2026'):
                $start_filter_month_enero = '2026-01-01';
                $end_filter_month_enero = '2026-01-31';

                $start_filter_month_febrero = '2026-02-01';
                $end_filter_month_febrero = '2026-02-28';

                $start_filter_month_marzo = '2026-03-01';
                $end_filter_month_marzo = '2026-03-31';

                $start_filter_month_abril = '2026-04-01';
                $end_filter_month_abril = '2026-04-30';

                $start_filter_month_mayo = '2026-05-01';
                $end_filter_month_mayo = '2026-05-31';

                $start_filter_month_junio = '2026-06-01';
                $end_filter_month_junio = '2026-06-30';

                $start_filter_month_julio = '2026-07-01';
                $end_filter_month_julio = '2026-07-31';

                $start_filter_month_agosto = '2026-08-01';
                $end_filter_month_agosto = '2026-08-31';

                $start_filter_month_septiembre = '2026-09-01';
                $end_filter_month_septiembre = '2026-09-30';

                $start_filter_month_octubre = '2026-10-01';
                $end_filter_month_octubre = '2026-10-31';

                $start_filter_month_noviembre = '2026-11-01';
                $end_filter_month_noviembre = '2026-11-30';

                $start_filter_month_diciembre = '2026-12-01';
                $end_filter_month_diciembre = '2026-12-31';
                break;             
            
                default:
            };

        
        $acumulative_sales_enero = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_enero, $end_filter_month_enero])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_febrero = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_febrero, $end_filter_month_febrero])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_marzo = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_marzo, $end_filter_month_marzo])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_abril = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_abril, $end_filter_month_abril])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_mayo = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_mayo, $end_filter_month_mayo])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_junio = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_junio, $end_filter_month_junio])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_julio = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_julio, $end_filter_month_julio])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_agosto = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_agosto, $end_filter_month_agosto])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_septiembre = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_septiembre, $end_filter_month_septiembre])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_octubre = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_octubre, $end_filter_month_octubre])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_noviembre = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_noviembre, $end_filter_month_noviembre])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $acumulative_sales_diciembre = DB::table('registro_diarios')->whereBetween('date', [$start_filter_month_diciembre, $end_filter_month_diciembre])->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');



        //FIN DE LA CONSULTA

        //HAGO UNA CONSULTA PARA TRAER EL ACUMULADO DE VENTAS Y COBRANZAS DIARIAS DEL MES QUE SELECCIONO EL CLIENTE, POR SUCURSAL, MES Y AÑO.
        //NO DEBO OLVIDAR EL NUMERO DE CLIENTE

        $venta_acumulada = DB::table('registro_diarios')->whereMonth('date', $month)->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('sales_today');

        $cobranza_acumulada = DB::table('registro_diarios')->whereMonth('date', $month)->where('client_number', $client_number)->where('sucursal' , $sucursal)->sum('incomes_today');


        return view('panel.filtrado', compact('client_number', 'client_name', 'sucursal', 'month', 'year', 'month_name', 'objetive_sales', 'objetive_incomes', 'sumapaquetes', 'objetive_sales_enero', 'objetive_sales_febrero', 'objetive_sales_marzo', 'objetive_sales_abril', 'objetive_sales_mayo', 'objetive_sales_junio', 'objetive_sales_julio', 'objetive_sales_agosto', 'objetive_sales_septiembre', 'objetive_sales_octubre', 'objetive_sales_noviembre', 'objetive_sales_diciembre', 'acumulative_sales_enero', 'acumulative_sales_febrero', 'acumulative_sales_marzo', 'acumulative_sales_abril', 'acumulative_sales_mayo', 'acumulative_sales_junio', 'acumulative_sales_julio', 'acumulative_sales_agosto', 'acumulative_sales_septiembre', 'acumulative_sales_octubre', 'acumulative_sales_noviembre', 'acumulative_sales_diciembre', 'venta_acumulada', 'cobranza_acumulada'));
    }

}
