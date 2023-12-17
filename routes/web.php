<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SliderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',function(){
//     return view('index');
// });

// Route::get('/form',function(){
//     return view('form');
// })->name('form');

 
// Route::get('/',[TestController::class,'show'])->name('show');

Route::get('/add',[TestController::class,'add'])->name('add');

Route::post('submit',[TestController::class,'submit'])->name('submit');

Route::get('update/{test}',[TestController::class,'update'])->name('update');

Route::post('edit/{test}',[TestController::class,'edit'])->name('edit');

Route::get('edit/{test}',[TestController::class,'delete'])->name('delete');




///////////////////////// LOGIN  //////////////////////////
Route::get('/',function(){
    if(Session()->has('admin')){
        return view('index');
    }
    return redirect('login');
});

Route::get('/login',[LoginController::class,'show']);
Route::post('/loginpro',[LoginController::class,'loginpro']);


Route::get('logout',function(){
    if(Session()->has('data')){
       Session()->forget('data');
    }
    return redirect('login');
});
//////////////////////////// edit profile //////////////////////////////////
Route::get('changeprofile',[LoginController::class,'changeprofile'])->name('changeprofile');

Route::post('changeadmin',[LoginController::class,'changeadmin'])->name('changeadmin');


/////////////////////////slider////////////////////////////////

Route::get('/slider',[SliderController::class,'slider'])->name('slider');
Route::post('addslider',[SliderController::class,'addslider'])->name('addslider');
