<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OperadoreController;
use App\Http\Controllers\OdfoperadoreController;
use App\Http\Controllers\RackoperadoreController;
use App\Http\Controllers\DesarrolladoraController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\EstablecimientooperadorController;
use App\Http\Controllers\EstablecimientorackController;
use App\Http\Controllers\EstablecimientotipoController;
use App\Http\Controllers\EstablecimientoodfController;
use App\Http\Controllers\TipolocaleController;
use App\Http\Controllers\OdfController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\VisitaController;
use App\Models\Port;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('visitas', VisitaController::class)->names([
    'index' => 'visita.index',
    'create' => 'visita.create',
    'store' => 'visita.store',
    'show' => 'visita.show',
    'edit' => 'visita.edit',
    'update' => 'visita.update',
    'destroy' => 'visita.destroy',
]);

Route::resource('ports', PortController::class)->names([
    'index' => 'ports.index',
    'create' => 'ports.create',
    'store' => 'ports.store',
    'show' => 'ports.show',
    'edit' => 'ports.edit',
    'update' => 'ports.update',
    'destroy' => 'ports.destroy',
]);

Route::resource('odfs', OdfController::class)->names([
    'index' => 'odfs.index',
    'create' => 'odfs.create',
    'store' => 'odfs.store',
    'show' => 'odfs.show',
    'edit' => 'odfs.edit',
    'update' => 'odfs.update',
    'destroy' => 'odfs.destroy',
]);

Route::resource('clientes', ClienteController::class)->names([
    'index' => 'clientes.index',
    'create' => 'clientes.create',
    'store' => 'clientes.store',
    'show' => 'clientes.show',
    'edit' => 'clientes.edit',
    'update' => 'clientes.update',
    'destroy' => 'clientes.destroy',
]);

Route::resource('tipolocales', TipolocaleController::class)->names([
    'index' => 'tipolocales.index',
    'create' => 'tipolocales.create',
    'store' => 'tipolocales.store',
    'show' => 'tipolocales.show',
    'edit' => 'tipolocales.edit',
    'update' => 'tipolocales.update',
    'destroy' => 'tipolocales.destroy',
]);

Route::resource('locales', LocaleController::class)->names([
    'index' => 'locales.index',
    'create' => 'locales.create',
    'store' => 'locales.store',
    'show' => 'locales.show',
    'edit' => 'locales.edit',
    'update' => 'locales.update',
    'destroy' => 'locales.destroy',
]);

Route::resource('desarrolladoras', DesarrolladoraController::class)->names([
    'index' => 'desarrolladoras.index',
    'create' => 'desarrolladoras.create',
    'store' => 'desarrolladoras.store',
    'show' => 'desarrolladoras.show',
    'edit' => 'desarrolladoras.edit',
    'update' => 'desarrolladoras.update',
    'destroy' => 'desarrolladoras.destroy',
]);

Route::resource('tipos', TipoController::class)->names([
    'index' => 'tipos.index',
    'create' => 'tipos.create',
    'store' => 'tipos.store',
    'show' => 'tipos.show',
    'edit' => 'tipos.edit',
    'update' => 'tipos.update',
    'destroy' => 'tipos.destroy',
    'vincular' => 'operadores.vincular',
])->middleware('auth');

Route::resource('operadores', OperadoreController::class)->names([
    'index' => 'operadores.index',
    'create' => 'operadores.create',
    'store' => 'operadores.store',
    'show' => 'operadores.show',
    'edit' => 'operadores.edit',
    'update' => 'operadores.update',
    'destroy' => 'operadores.destroy',
    'vincular' => 'operadores.vincular',

])->middleware('auth');

Route::resource('odfoperadores', OdfoperadoreController::class)->names([
    'index' => 'odfoperadores.index',
    'create' => 'odfoperadores.create',
    'store' => 'odfoperadores.store',
    'show' => 'odfoperadores.show',
    'edit' => 'odfoperadores.edit',
    'update' => 'odfoperadores.update',
    'destroy' => 'odfoperadores.destroy',
])->middleware('auth');

Route::resource('rackoperadores', RackoperadoreController::class)->names([
    'index' => 'rackoperadores.index',
    'create' => 'rackoperadores.create',
    'store' => 'rackoperadores.store',
    'show' => 'rackoperadores.show',
    'edit' => 'rackoperadores.edit',
    'update' => 'rackoperadores.update',
    'destroy' => 'rackoperadores.destroy',
])->middleware('auth');

Route::resource('establecimientos', EstablecimientoController::class)->names([
    'index'  => 'establecimientos.index',
    'create' => 'establecimientos.create',
    'store' => 'establecimientos.store',
    'show' => 'establecimientos.show',
    'edit' => 'establecimientos.edit',
    'update' => 'establecimientos.update',
    'destroy' => 'establecimientos.destroy',
])->middleware('auth');

Route::resource('enlaces', EnlaceController::class)->names([
    'index'  => 'enlaces.index',
    'create' => 'enlaces.create',
    'store' => 'enlaces.store',
    'show' => 'enlaces.show',
    'edit' => 'enlaces.edit',
    'update' => 'enlaces.update',
    'destroy' => 'enlaces.destroy',
])->middleware('auth');

Route::resource('visitas', VisitaController::class)->names([
    'index'  => 'visitas.index',
    'create' => 'visitas.create',
    'store' => 'visitas.store',
    'show' => 'visitas.show',
    'edit' => 'visitas.edit',
    'update' => 'visitas.update',
    'destroy' => 'visitas.destroy',
])->middleware('auth');




Route::get('enlaces/pdf/{establecimiento_id?}', [EnlaceController::class, 'pdf'])->name('enlaces.pdf')->middleware('auth');





Route::post('/operadores/{operadorId}/establecimientos/{establecimientoId}/vincular/{vincular}',
EstablecimientooperadorController::class,'vincular')->name('operadores.vincular');

Route::post('/tipos/{tipoId}/establecimientos/{establecimientoId}/vincular/{vincular}', 
[EstablecimientotipoController::class, 'vincular'])->name('tipos.vincular');

Route::post('rackoperadores/{rackoperadorId}/establecimientos/{establecimientoId}/vincular/{vincular}', 
[EstablecimientorackController::class, 'vincular'])->name('rackoperadores.vincular');

Route::post('odfoperadores/{odfoperadorId}/establecimientos/{establecimientoId}/vincular/{vincular}', 
[EstablecimientoodfController::class, 'vincular'])->name('odfoperadores.vincular');


// web.php
Route::get('/puerto/{id}', 'PuertoController@show')->name('puerto.show');

// Rutas para la bitácora








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



