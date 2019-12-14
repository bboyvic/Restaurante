<?php

namespace App\Exports;

use App\Empleado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class EmpleadosExport implements FromView
{

	USE Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Empleado::all();
    }
    public function view(): View {


    	return view('reportes.excelEmpleados',[

    		'empleados' => Empleado::all()
    	
    	]);
    }
}
