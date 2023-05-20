<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', function(Request $request){
    
    $search = $request->search;
    /* when es como una condicional cuando tal valor está hace tal cosa */
    return \App\Models\User::when($request->search, function($query, $search){

                        $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");

                    })
                    /* La documentación de WireUI nos recomienda utilizar la siguiente metodología si lo tenemos 
                    sincronizado con el componente y queremos que muestre los valore ya seleccionados */
                    /* VER CURSO PARA MÁS DETALLE : https://codersfree.com/courses-status/livewire-wireui-crea-interfaces-web-responsivas-facil/select */
                    ->when($request->selected, function($query, $selected) {
                        /* whereIn busca el id dentro de selected */
                        $query->whereIn('id', $selected)
                            ->limit(10);
                    })
                    ->get();

})->name('api.users.index');

