<table style="text-align: center; border-color: #0F6766" border="2">
    <thead>
        <tr>
            <th><b >NAME</b></th>
            <th><b>APELLIDO PATERNO</b></th>
            <th><b>APELLIDO MATERNO</b></th>
            <th><b>SEXO</b></th>
            <th><b>TELEFONO</b></th>
            <th><b>DIRECCION</b></th>        </tr>
    </thead>
    <tbody>
         @foreach($empleados as $empleado)
        <tr>
            <td style="border-color: #0F6766">{{$empleado->name}}</td>
            <td style="border-color: #0F6766">{{$empleado->apellido_paterno}}</td>
            <td style="border-color: #0F6766">{{$empleado->apellido_materno}}</td> 
            @if(is_null($empleado->sexo))
                <td style="border-color: #0F6766">SIN DEFINIR</td>
            @else
                @if($empleado->sexo == 0)
                    <td style="border-color: #0F6766">HOMBRE</td>
                @else
                    <td style="border-color: #0F6766">MUJER</td>
                @endif
            @endif

            <td style="border-color: #0F6766">{{$empleado->telefono_empleado}}</td>
            <td style="text-align: left; border-color: #0F6766 ">
                <ul>
                    <li><b>LOCALIDAD:</b>{{$empleado->localidad}}</li>
                    <li><b>CALLE:</b> {{$empleado->calle}}</li>
                    <li><b>N# interior:</b> {{$empleado->num_interior}}</li>
                    <li><b>N# exterior:</b> {{$empleado->num_exterior}}</li>
                    <li><b>CALLE:</b> {{$empleado->calle}}</li>
                    <li><b>CP:</b> {{$empleado->CP}}</li>
                </ul>   
            </td>
        </tr>
        @endforeach
    </tbody>
</table>