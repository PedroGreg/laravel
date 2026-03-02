<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produtos', [ProductController::class, 'index']);

Route::post('/produtos', [ProductController::class, 'store']);

Route::get('/produtos/{id}', [ProductController::class,'show']);

Route::put('/produtos/{id}', [ProductController::class,'update']);

Route::delete('/produtos/{id}', [ProductController::class,'destroy']);

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