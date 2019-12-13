<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script type="text/javascript"> 
	$(document).ready(function () {
    //----ACTIVAR TOOLTIP EN TODAS LOS INPUT 

     $('input').keyup(function(){
    /* Obtengo el valor contenido dentro del input */
    var value = $(this).val();
    /* Elimino todos los espacios en blanco que tenga la cadena delante y detrás */
    var value_without_space = $.trim(value);
   });


 function soloLetras(e){
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key).toLowerCase();
                letras = " abcdefghijklmnñopqrstuvwxyz";
                especiales = "8-37-38-46-164";
                teclado_especial = false;
                
                for(var i in especiales){
                    if(key == especiales[i]){
                        teclado_especial = true; break;
                    }
                }
                if(letras.indexOf(teclado) == -1 && !teclado_especial){
                return false;
                } 

            }
     function solonumeros(e){
                    key = e.keyCode || e.which;
                    teclado = String.fromCharCode(key);
                    numeros = "0123456789";
                    especiales = "8-37-38-46";
                    teclado_especial = false;
                    
                    for(var i in especiales){
                        if(key == especiales[i]){
                            teclado_especial = true;
                        }
                    }
                    if(numeros.indexOf(teclado) == -1 && !teclado_especial){
                    return false;
                    } 

                }
</script>

	<center>
		<h1>ALTA MESAS</h1>
		@if($errors->any())
				@foreach($errors->all() as $error)
					<label style="color:red">{{$error}}</label><br>
				@endforeach
		@endif
		<form method="POST" action="{{route('mesas.store')}}" id="mesas">
			{{csrf_field()}}
			<label for="numero_mesa">Numero Mesa</label>
			<input type="text" name="numero_mesa" id="numero_mesa" value="{{old('numero_mesa')}}" required title="Ingreas un numero de mesa" onkeypress="return solonumeros(event)" onpaste="return false;" maxlength="2" minlength="1">
			<br>
			<label for="descripcion_mesa">Descripcion Mesa</label>
			<input type="text" name="descripcion_mesa" id="descripcion_mesa" value="{{old('descripcion_mesa')}}" required title="Agregue descripcion de la mesa" onkeypress="return soloLetras(event)" onpaste="return false;" maxlength="38">
			<br>
			<button type="submit" onclick="return confirm('Estas seguro de eliminar al Empleado {{$mesa->numero_mesa}}?')">GUARDAR</button>
		</form>
	</center>
</body>
</html>