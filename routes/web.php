<?php

use Illuminate\Support\Facades\Route;


//Vistas

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/quienes-somos', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');

Route::get('/magia/listado', [\App\Http\Controllers\MagicController::class, 'index'])
    ->name('magic.list');

//Rutas con middleware que confirma envios
Route::get('servicios-magicos/{id}', [\App\Http\Controllers\MagicController::class, 'view'])
    ->middleware('check')
    ->name('magic.view');

Route::get('/servicios-magicos/{id}/verificar-compra', [\App\Http\Controllers\CheckBuyController::class, 'showForm'])
    ->name('magic-products.check-buy.form');

Route::post('/servicios-magicos/{id}/verificar-compra', [\App\Http\Controllers\CheckBuyController::class, 'ConfirmProcess'])
    ->name('magic-products.check-buy.process');

//Reservar

Route::post('servicios-magicos/{id}/reservar', [\App\Http\Controllers\ProductReservationController::class, 'sendConfirmation'])
    ->name('magic.reservation');

Route::get('/noticias', [\App\Http\Controllers\ArticleController::class, 'articleList'])
    ->name('article.list');

Route::get('noticias/{id}', [\App\Http\Controllers\ArticleController::class, 'view'])
    ->name('article.view');

//Administración
Route::get('/administracion', function () {
    return view('administration.index');
})
    ->middleware(['userAdmin', 'auth'])
    ->name('panel');

Route::get('/administracion/listado-productos', [\App\Http\Controllers\MagicController::class, 'productsList'])
    ->middleware(['userAdmin', 'auth'])
    ->name('magic.panel');

Route::get('/administracion/listado-noticias', [\App\Http\Controllers\ArticleController::class, 'blogList'])
    ->middleware(['userAdmin', 'auth'])
    ->name('article.panel');

Route::get('/administracion/listado-usuarios', [\App\Http\Controllers\UsersController::class, 'userList'])
    ->middleware(['userAdmin', 'auth'])
    ->name('users.panel');

Route::get('usuarios/{id}', [\App\Http\Controllers\UsersController::class, 'view'])
    ->middleware(['userAdmin', 'auth'])
    ->name('user.view');

//Crear producto mágico

Route::get('/administracion/nuevo-producto', [\App\Http\Controllers\MagicController::class, 'createMagic'])
    ->middleware('auth')
    ->name('magic.create.form');

Route::post('/administracion/nuevo-producto', [\App\Http\Controllers\MagicController::class, 'createProcess'])
    ->middleware('auth')
    ->name('magic.create.process');

//Eliminar producto mágico

Route::post('/administracion/{id}/eliminar-producto', [\App\Http\Controllers\MagicController::class, 'deleteProcess'])
    ->middleware('auth')
    ->name('magic.delete.form');

Route::get('/administracion/{id}/eliminar-producto', [\App\Http\Controllers\MagicController::class, 'deleteForm'])
    ->middleware('auth')
    ->name('magic.delete.process');

//Editar producto mágico

Route::post('/administracion/{id}/editar-producto', [\App\Http\Controllers\MagicController::class, 'editProcess'])
    ->middleware('auth')
    ->name('magic.edit.process');

Route::get('/administracion/{id}/editar-producto', [\App\Http\Controllers\MagicController::class, 'editForm'])
    ->middleware('auth')
    ->name('magic.edit.form');

//Crear noticia mágica

Route::get('/administracion/nueva-noticia', [\App\Http\Controllers\ArticleController::class, 'createArticle'])
    ->middleware('auth')
    ->name('article.create.form');

Route::post('/administracion/nueva-noticia', [\App\Http\Controllers\ArticleController::class, 'createProcess'])
    ->middleware('auth')
    ->name('article.create.process');

//Eliminar noticia mágica

Route::post('/administracion/{id}/eliminar-noticia', [\App\Http\Controllers\ArticleController::class, 'deleteProcess'])
    ->middleware('auth')
    ->name('article.delete.process');

Route::get('/administracion/{id}/eliminar-noticia', [\App\Http\Controllers\ArticleController::class, 'deleteForm'])
    ->middleware('auth')
    ->name('article.delete.form');

//Editar noticia mágica

Route::post('/administracion/{id}/editar-noticia', [\App\Http\Controllers\ArticleController::class, 'editProcess'])
    ->middleware('auth')
    ->name('article.edit.process');

Route::get('/administracion/{id}/editar-noticia', [\App\Http\Controllers\ArticleController::class, 'editForm'])
    ->middleware('auth')
    ->name('article.edit.form');

//Auth
Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth.login.form');
Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginProcess'])
    ->name('auth.login.process');
Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logoutProcess'])
    ->name('auth.logout.process');
//Registro
Route::get('/registro', [\App\Http\Controllers\AuthController::class, 'registerForm'])
    ->name('auth.register.form');
Route::post('/registro', [\App\Http\Controllers\AuthController::class, 'registerProcess'])
    ->name('auth.register.process');


    // Perfil de usuario

Route::get('/perfil', [\App\Http\Controllers\UsersController::class, 'profile'])
    ->middleware('auth')
    ->name('user.profile');

Route::get('/perfil/editar', [\App\Http\Controllers\UsersController::class, 'editForm'])
    ->middleware('auth')
    ->name('user.edit.form');

Route::post('/perfil/editar', [\App\Http\Controllers\UsersController::class, 'editProcess'])
    ->middleware('auth')
    ->name('user.edit.process');

//Carrito\

Route::get('/carrito', [\App\Http\Controllers\CartController::class, 'view'])
    ->name('cart.index');

Route::post('/carrito/agregar', [\App\Http\Controllers\CartController::class, 'addToCart'])
    ->name('cart.add');

Route::post('/carrito/vaciar', [\App\Http\Controllers\CartController::class, 'clearCart'])
    ->name('cart.clear');

    // Mercado Pago
Route::get('mp/success', [\App\Http\Controllers\CartController::class, 'completePurchase'])
    ->name('mp.success');
    
Route::get('mp/pending', [\App\Http\Controllers\MercadoPagoController::class, 'pending'])
    ->name('mp.pending');
    
Route::get('mp/failure', [\App\Http\Controllers\MercadoPagoController::class, 'failure'])
    ->name('mp.failure');

Route::get('mp/complete', [\App\Http\Controllers\MercadoPagoController::class, 'viewComplete'])
    ->name('mp.complete');

//Dashboard

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
