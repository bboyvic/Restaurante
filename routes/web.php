<?php

// ----RUTAS DE LA PINA PRESENCIAL

Route::get('/', function () {
    return view('Arboleda.index');
})->name('arboleda.index');


Route::get('/menu', function () {
    return view('Arboleda.menu');
});

Route::get('/specialties', function () {
    return view('Arboleda.specialties');
});

Route::get('/reservation', function () {
    return view('Arboleda.reservation');
});

Route::get('/blog', function () {
    return view('Arboleda.blog');
});

Route::get('/about', function () {
    return view('Arboleda.about');
});


Route::get('/test', function () {
    return view('Arboleda.test');
})->name('test');


Route::post('/contactanos','EmailController@contactanos')->name('contactanos');


Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//------final de rutas de pagina presencial 




//-----------------PARA EL LOGIN--------------////
Route::group(['middleware' => 'guest'], function () {

Route::get('/registro', function () {
    return view('Arboleda.registro');
});

Route::get('/restablecer', function () {
    return view('Arboleda.emailResetPassword');
})->name('restablecer');


// Registro de usuarios
Route::post('register', 'Auth\RegisterController@register')->name('register');;


// Ingreso al sistema...
Route::get('/logueo', function () {
    return view('Arboleda.Login');
})->name('login');
// ->middleware('guest');


//logueo al sistema
Route::post('logueoLaravel', 'Auth\LoginController@login')->name('logueoLaravel');



// Password Reset 
//enviar mail (link) para reestablecer contraseña
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//ruta con link en el email y vista para reemplazar la contraseña
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//reset de contraseña
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


});

    


//-----------------RUTAS DEL SISTEMA----------------------------
Route::group(['middleware' => 'auth'], function () {

    //-----------CRUD USUARIOS---------//
    //--LISTAR
        Route::get('usuarios/','UserController@index')->name('users.index');
    //--AGREGAR DATOS DEL USUARIO
        Route::get('usuarios/create', 'UserController@create')->name('users.create');
        Route::post('usuarios/alta','UserController@store')->name('users.store');
    //--ELIMINAR
        Route::delete('/usuarios/eliminar/{user}','UserController@destroy')->name('users.destroy');
    //--MODIFICAR
        Route::get('usuarios/{user}/editar','UserController@edit')->name('users.edit');
        Route::put('usuarios/{user}','UserController@update')->name('users.update');



    // ----------CRUD EMPLEADO--------------//
        Route::get('empleado/', 'EmpleadoController@index')->name('empleado.index');
        Route::get('empleado/create','EmpleadoController@create')->name('empleado.create');
        Route::post('empleado/alta','EmpleadoController@store')->name('empleado.alta');
        Route::get("empleado/{empleado}",'EmpleadoController@edit')->name('empleado.edit');
        Route::put('empleado/{empleado}/editar','EmpleadoController@update')->name('empleado.update');
        Route::delete("empelado/{empleado}/delete",'EmpleadoController@destroy')->name('empleado.destroy');

    //-----------CRUD MESAS----------//
    //--LISTAR
        Route::get('mesas/','MesaController@index')->name('mesas.index');
    //--CREAR
        Route::get('mesas/create','MesaController@create')->name('mesas.create');
        Route::post('mesas/alta','MesaController@store')->name('mesas.store');
    //--ACTUALIZAR
        Route::get('mesas/{mesa}/editar','MesaController@edit')->name('mesas.edit');
        Route::put('mesas/{mesa}','MesaController@update')->name('mesas.update');
    //---Eliminar
        Route::get('mesas/elimiar/{mesa}','MesaController@destroy')->name('mesas.destroy');
    ///-----------------CRUD CATEGORIA PLATILLO---------------------/////
        Route::get('categoriaPlatillo/', 'CategoriaPlatilloController@index')->name('categoriaPlatillo.index');
        Route::get('categoriaPlatillo/create','CategoriaPlatilloController@create')->name('categoriaPlatillo.create');
        Route::post('categoriaPlatillo/alta','CategoriaPlatilloController@store')->name('categoriaPlatillo.alta');
        Route::get("categoriaPlatillo/{categoriaPlatillo}",'CategoriaPlatilloController@edit')->name('categoriaPlatillo.edit');
        Route::PUT('categoriaPlatillo/{categoriaPlatillo}/editar','CategoriaPlatilloController@update')->name('categoriaPlatillo.update');
        Route::delete("categoriaPlatillo/{categoriaPlatillo}/delete",'CategoriaPlatilloController@destroy')->name('categoriaPlatillo.destroy');

    ///-----------------CRUD MENU PLATILLO---------------------/////
        Route::get('menuplatillo/', 'MenuPlatilloController@index')->name('menuplatillo.index');
        Route::get('menuplatillo/create','MenuPlatilloController@create')->name('menuplatillo.create');
        Route::POST('menuplatillo/alta','MenuPlatilloController@store')->name('menuplatillo.alta');
        Route::get("menuplatillo/{menu_platillo}",'MenuPlatilloController@edit')->name('menuplatillo.edit');
        Route::PUT('menuplatillo/{menu_platillo}/editar','MenuPlatilloController@update')->name('menuplatillo.update');
        Route::delete("menuplatillo/{menu_platillo}/delete",'MenuPlatilloController@destroy')->name('menuplatillo.destroy');

    ////----------------------RUTAS PARA  EL MENU DE MESAS DISPONIBLES-------//
        Route::get('orden/menumesas','MesaController@menu')->name('sistema.menumesas');
        Route::get('sistema/carrito/{mesa}','OrdenController@index')->name('sistema.carrito');
        Route::post('sistema/realizarorden/{mesa}','OrdenController@ordenar')->name('realizar.orden');
        Route::post('sistema/terminar/{mesa}','OrdenController@terminar')->name('terminar.orden');

    // ---------------------MODULO DE CORTE----------------------------------//

        Route::get("detalleVentasEfectivo","CorteController@detallesVentasEfectivo")->name('modulo.detalleVentasEfectivo');

        Route::get("detalleVentasTarjeta","CorteController@detalleVentasTarjeta")->name('modulo.detalleVentasTarjeta');

        Route::get("corteCaja","CorteController@index")->name('modulo.corteCaja');

        Route::post("reporte/corteCaja",'CorteController@reporte')->name('reporte.corte');


    Route::get('/home','HomeController@index')->name('home');


});

    