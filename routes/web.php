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


Route::get('/registro', function () {
    return view('Arboleda.registro');
});

Route::get('/restablecer', function () {
    return view('Arboleda.emailResetPassword');
})->name('restablecer');
//------final de rutas de pagina presencial 




//-----------------PARA EL LOGIN--------------////

// Registro de usuarios
Route::post('register', 'Auth\RegisterController@register')->name('register');;

// Ingreso al sistema...
Route::get('/logueo', function () {
    return view('Arboleda.Login');
})->name('login')->middleware('guest');

//logueo al sistema
Route::post('logueoLaravel', 'Auth\LoginController@login')->name('logueoLaravel');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


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

//-----------------RUTAS DEL SISTEMA----------------------------
//aqui va todas las rutas del sistema
Route::group(['middleware' => 'auth'], function () {


    Route::get('/home','HomeController@index')->name('home');


});

    