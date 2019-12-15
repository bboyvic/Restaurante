<?php

namespace App\Exports;

use App\MenuPlatillo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class MenuPlatillosExport implements FromView
{
	USE Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MenuPlatillo::all();
    }

    public function view(): View {


    	return view('reportes.excelMenuPlatillo',[

    		'menu_platillos' => MenuPlatillo::all()
    	]);
    }
}
