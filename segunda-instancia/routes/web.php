<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Models\Joya;
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
Route::get('/', [PedidoController::class, 'index'])
    ->name('aluci');


Route::post('/pedidos', [PedidoController::class, 'store'])
    ->name('pedidos.store');

    // ==========================================
// SEGUNDA INSTANCIA - JOYERIA LA ESMERALDA
// ==========================================

// 1. LISTA PUBLICA DE JOYAS
Route::get('/joyas', function () {

    $metal = request()->query('metal');

    if ($metal) {
        $joyas = Joya::where('metal', $metal)->get();
    } else {
        $joyas = Joya::all();
    }

    return view('joyas.lista', compact('joyas'));

})->name('joyas.lista');


// 2. FORMULARIO PARA REGISTRAR JOYAS
Route::get('/joyas/nuevo', function () {

    return view('joyas.nuevo');

})->middleware('auth');


// 3. GUARDAR UNA NUEVA JOYA
Route::post('/joyas/nuevo', function () {

    request()->validate([

        'pieza' => 'required',

        'metal' => 'required|in:Oro,Plata,Platino',

        'precio' => 'required|integer'

    ], [

        'pieza.required' => 'Anota que pieza es la joya.',

        'metal.required' => 'Elige el metal de la joya.',

        'metal.in' => 'El metal tiene que ser Oro, Plata o Platino.',

        'precio.required' => 'Anota el precio de la joya.',

        'precio.integer' => 'El precio se escribe solo con digitos, sin centavos.'

    ]);

    Joya::create([

        'pieza' => request()->input('pieza'),

        'metal' => request()->input('metal'),

        'precio' => request()->input('precio')

    ]);

    return redirect('/joyas');

})->middleware('auth');