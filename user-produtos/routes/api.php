<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produtos', [ProductController::class, 'index']);

Route::get('/produtos/{id}', [ProductController::class,'show']);

Route::post('/produtos', [ProductController::class, 'store']);

Route::put('/produtos/{id}', [ProductController::class,'update']);

Route::delete('/produtos/{id}', [ProductController::class,'destroy']);

Route::get('/usuarios', [UserController::class,'index']);

Route::get('/usuarios/{id}', [UserController::class,'show']);

Route::post('/usuarios', [UserController::class,'store']);

Route::put('/usuarios/{id}', [UserController::class,'update']);

Route::delete('/usuarios/{id}', [UserController::class,'destroy']);
// Route::get('/usuarios', function (){
//     $nomes = [
//         "nome" => [
//             '1' => 'Pedro',
//             '2' => 'Arthur'
//         ],
//         "idade" => [
//             '1' => '22',
//             '2' => '20'
//         ]
//         ];
//     return $nomes;
// });

// Route::get('/produtos', function (){
//     $produtos = [
//         "nome" => [
//             "1" => "RTX3060",
//             "2" => "MousePad"
//         ],
//         "preco" => [
//             "1" => "2500.00",
//             "2" => "25.00"
//         ]];
//         return $produtos;
// });