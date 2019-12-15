<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>	
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script type="text/javascript">
 $(document).ready(function(){
 	
 });
  </script>
</head>
<body>

<center>	
	<h1>EMPLEADOS</h1>
		<table>
			<tr>
				<td><a href="{{URL::action('EmpleadoController@reportepdf',['criterio'=>$criterio])}}">REPORTE PDF</a></td>
				<td><a href="{{URL::action('EmpleadoController@reporteExcel',['criterio'=>$criterio])}}">EXCEL</a></td>
				{{-- <td><a href="{{URL::action('EmpleadoController@reporteWord')}}">WORD</a></td> --}}
				<td>
					<form action="{{route('busqueda.empleado')}}" method="POST">
					  	@csrf
					    <input type="search" placeholder="Buscar" aria-label="Buscar" name="criterio" placeholder="{{old('criterio')}}">
					    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">BUSCAR</button>
					 </form>
				</td>
			</tr>
		</table>
		<table border="4" class="table table-striped table-bordered" style="width:70%" id="a1">
		<thead>
		<tr>
			<th><b>NOMBRE</b></th>
			<th><b>APELLIDO PATERNO</b></th>
			<th><b>APELLIDO MATERNO</b></th>
			<th><b>SEXO</b></th>
			<th><b>TELEFONO</b></th>
			<th><b>DIRECCION</b></th>
			<th><b>MODIFICAR</b></th>
			<th><b>ELIMINAR</b></th>
		</tr>
		</thead>
		<tbody>
		@foreach($empleados as $empleado)
		<tr>
			<td>{{$empleado->name}}</td>
			<td>{{$empleado->apellido_paterno}}</td>
			<td>{{$empleado->apellido_materno}}</td> 
			@if(is_null($empleado->sexo))
				<td>SIN DEFINIR</td>
			@else
				@if($empleado->sexo == 0)
					<td>HOMBRE</td>
				@else
					<td>MUJER</td>
				@endif
			@endif

			<td>{{$empleado->telefono_empleado}}</td>
			<td>
				<ul>
					{{-- <li><b>MUNICIPIO:</b>{{$empleado->}}</li> --}}
					<li><b>LOCALIDAD:</b> {{$empleado->localidad}}</li>
					<li><b>CALLE:</b> {{$empleado->calle}}</li>
					<li><b>N# interior:</b> {{$empleado->num_interior}}</li>
					<li><b>N# exterior:</b> {{$empleado->num_exterior}}</li>
					<li><b>CALLE:</b> {{$empleado->calle}}</li>
					<li><b>CP:</b> {{$empleado->CP}}</li>
				</ul>	
			</td>
			<td><a href="{{route('empleado.edit',$empleado)}}"><img src="{{asset('img/editar.png')}}" width="30" height="30"></a></td>
			<td>
				<form action="{{route('empleado.destroy',$empleado)}}" method="POST">
					{{csrf_field()}}
					{{method_field('DELETE')}}
					<button type="submit" onclick="return confirm('Estas seguro de eliminar al Empleado {{$empleado->name}}?')"><img src="{{asset('img/eliminar.png')}}" width="30" height="30" ></button>
				</form>
			</td>
		</tr>
		@endforeach
			<tr>
				<td colspan="8" >{{$empleados->links()}}</td>
			</tr>
	</tbody>
	</table>

</center>

</body>
</html>