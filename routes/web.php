<?php

// ----RUTAS DE LA PINA PRESENCIAL

Route::get('/', function () {
    return view('Arboleda.index');
})->name('arboleda.index');

Route::get('/logueo', function () {
    return view('Arboleda.Login');
})->name('arboleda.login');

Route::get('/registro', function () {
    return view('Arboleda.registro');
});

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
})->name('contactanos');

//------final de rutas de pagina presencial 








// -----------SIN UTILIZAR
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/logueo','Auth\LoginController@showLoginForm')
// ->name('Arboleda.Login');
// ->middleware('guest');

