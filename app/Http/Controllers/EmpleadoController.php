<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use App\http\Requests\FormEmpleado;

//Para reportes en PDF
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

// para reportes Excel
use App\Exports\EmpleadosExport;
use Maatwebsite\Excel\Facades\Excel;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // $empleados = Empleado::all();
        $criterio = $request['criterio'];
        $empleados = Empleado::where('name', 'LIKE', '%'.$criterio.'%')
        ->orWhere('apellido_paterno', 'LIKE', '%'.$criterio.'%')
        ->orWhere('apellido_materno', 'LIKE', '%'.$criterio.'%')
        ->orWhere('telefono_empleado', 'LIKE', '%'.$criterio.'%')
        ->orWhere('calle', 'LIKE', '%'.$criterio.'%')
        ->orWhere('CP', 'LIKE', '%'.$criterio.'%')
        ->paginate(2);

        // $empleados = Empleado::where('sexo','1')->get();

        // echo $empleados;
        
        return view("Empleados.index",compact("empleados"),['criterio'=>$criterio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Empleados.alta");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormEmpleado $request)
    {
         $empleado = new Empleado(request()->all());
         $empleado->save();


         return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return  view("Empleados.edit",compact("empleado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(FormEmpleado $request, Empleado $empleado)
    {
        $empleado->name = $request['name'];
        $empleado->apellido_paterno = $request['apellido_paterno'];
        $empleado->apellido_materno = $request['apellido_materno'];
        $empleado->sexo = $request['sexo'];
        $empleado->telefono_empleado = $request['telefono_empleado'];
        $empleado->calle = $request['calle'];
        $empleado->num_interior = $request['num_interior'];
        $empleado->num_exterior = $request['num_exterior'];
        $empleado->CP = $request['CP'];
        $empleado->localidad = $request['localidad'];
        $empleado->save();
        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleado.index');
    }

    public function reportepdf(Request $request){

        $criterio = $request['criterio'];
        $empleados = Empleado::where('name', 'LIKE', '%'.$criterio.'%')
        ->orWhere('apellido_paterno', 'LIKE', '%'.$criterio.'%')
        ->orWhere('apellido_materno', 'LIKE', '%'.$criterio.'%')
        ->orWhere('telefono_empleado', 'LIKE', '%'.$criterio.'%')
        ->orWhere('calle', 'LIKE', '%'.$criterio.'%')
        ->orWhere('CP', 'LIKE', '%'.$criterio.'%')->get();
        $date = Carbon::now(); 
        $date = $date->format('Y-m-d');


        $pdf = PDF::loadView("reportes.pdfEmpleado",compact("empleados","date"));


        return $pdf->stream('reporteEmpleados.pdf');
        // return $pdf->download('reportesEmpleados.pdf');

    }

    public function reporteExcel(){
        return Excel::download(new EmpleadosExport,'Emplados-Reporte.xlsx');
    }
}
