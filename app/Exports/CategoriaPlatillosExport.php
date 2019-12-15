<?php

namespace App\Exports;

use App\CategoriaPlatillo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class CategoriaPlatillosExport implements FromView
{
	USE Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CategoriaPlatillo::all();
    }

    public function view(): View {


    	return view('reportes.excelCategoriaPlatillos',[

    		'categoriaplatillos' => CategoriaPlatillo::all()
    	
    	]);
    }
}
