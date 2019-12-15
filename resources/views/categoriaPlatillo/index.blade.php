
<!DOCTYPE html>
<html>
<head>
    <title>INDEX</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<center>
    <h1>LISTADO DE CATEGORIAS DE PLATILLOS</h1>
  

    <a href="{{route('categoriaPlatillo.create')}}"><button type="button" class="btn btn-info btn-lg">Agregar Categoria</button></BUTTON></a><br>

  <table>
    <tr>
      <td><a href="{{URL::action('CategoriaPlatilloController@reportepdf',['criterio'=>$criterio])}}">REPORTE PDF</a></td>
      <td><a href="{{URL::action('CategoriaPlatilloController@reporteExcel',['criterio'=>$criterio])}}">EXCEL</a></td>
      {{-- <td><a href="{{URL::action('UserController@reporteWord')}}">WORD</a></td> --}}
      <td>
        <form action="{{route('busqueda.categoriaplatillo')}}" method="POST">
          @csrf
          <input type="search" placeholder="Buscar" aria-label="Buscar" name="criterio" placeholder="{{old('criterio')}}">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">BUSCAR</button>
        </form>
      </td>
    </tr>

  </table>
        <table border="4">
        <thead>
        <tr>
            <th><b>NOMBRE</b></th>
            <th><b>IMAGEN</b></th>
            <th><b>MODIFICAR</b></th>
            <th><b>ELIMINAR</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoriaPlatillos as $categoriaPlatillo)
        <tr>
            <td>{{$categoriaPlatillo->nombre_categoria}}</td>
            
            <td><img style="width:85px; height:85px;" src="{{asset('imag/'.$categoriaPlatillo->imagen)}}"></td>

            <td><a href="{{route('categoriaPlatillo.edit',$categoriaPlatillo)}}"><img src="{{asset('img/editar.png')}}" width="30" height="30"></a></td>
            
            <td>
                <form action="{{route('categoriaPlatillo.destroy',$categoriaPlatillo)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" onclick="return confirm('Estas seguro de eliminar al la Categoria {{$categoriaPlatillo->nombre_categoria}}?')"><img src="{{asset('img/eliminar.png')}}" width="30" height="30" ></button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
    </table>
</center>

</body>
</html>