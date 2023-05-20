<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    
    Route::post('/forms', function(Request $request){
    
        $request->validate([
            'name' => 'required',
            'website' => 'required',
            'correo' => 'required',
        ]);
    
        return $request->all();
    
    })->name('forms.store');

    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tables', function(){
        return view('tables');
    })->name('tables');
    
    Route::get('/livewire', function(){
        return view('livewire');
    })->name('livewire');
    
    Route::get('/actions', function(){
        return view('actions');
    })->name('actions');
    
    Route::get('/ui', function(){
        return view('ui');
    })->name('ui');

    Route::get('/forms', function(){
        return view('forms');
    })->name('forms');

});







