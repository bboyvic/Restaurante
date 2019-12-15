<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<center>
		<h1>LISTADO DE USUARIOS</h1>
	

		<a href="{{route('users.create')}}"><button type="button" class="btn btn-info btn-lg">Agregar Usuario</button></BUTTON></a><br>
		</center>

<div class="container">
	<center>
	<table>
		<tr>
			<td><a href="{{URL::action('UserController@reportepdf',['criterio'=>$criterio])}}">REPORTE PDF</a></td>
			<td><a href="{{URL::action('UserController@reporteExcel')}}">EXCEL</a></td>
			{{-- <td><a href="{{URL::action('UserController@reporteWord')}}">WORD</a></td> --}}
			<td>
				<form action="{{route('busqueda.usuario')}}" method="POST">
				  	@csrf
				    <input type="search" placeholder="Buscar" aria-label="Buscar" name="criterio" placeholder="{{old('criterio')}}">
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">BUSCAR</button>
				 </form>
			</td>
		</tr>

	</table>
	</center>
	<table border="4" class="table table-striped table-bordered" style="width:100%" id="a1">
		<thead>
			
		<tr>
			<th><b>NAME</b></th>
			<th><b>EMAIL</b></th>
			<th><b>SEXO</b></th>
			<th><b>DATOS DEL USUARIO</b></th>
			<th><b>MODIFICAR</b></th>
			<th><b>ELIMINAR</b></th>
		</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			@if(is_null($user->sexo))
                <td>SIN DEFINIR</td>
            @else
                @if($user->sexo == 0)
                    <td>HOMBRE</td>
                @else
                    <td>MUJER</td>
                @endif
            @endif
			<td>
				<ul>
					<li><b>TEL:</b> {{$user->telefono_user}}</li>
					<li><b>CALLE:</b> {{$user->calle}}</li>
					<li><b>LOCALIDAD:</b> {{$user->localidad}}</li>
					<li><b>CP:</b> {{$user->CP}}</li>
				</ul>	
			</td>
			<td><a href="{{route('users.edit',$user)}}"><img src="{{asset('img/editar.png')}}" width="30" height="30"></a></td>
			<td>
				<form action="{{route('users.destroy',$user)}}" method="POST">
					{{csrf_field()}}
					{{method_field('DELETE')}}
					<button type="submit" onclick="return confirm('Estas seguro de eliminar al Empleado {{$user->name}}?')"><img src="{{asset('img/eliminar.png')}}" width="30" height="30" ></button>
				</form>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="4">{{$users->links()}}</td>
		</tr>
	</tbody>
	</table>
</div>

</body>
</html>