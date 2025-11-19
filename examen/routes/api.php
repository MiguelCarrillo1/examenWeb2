<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\autoresController;
use App\Http\Controllers\Api\librosController;
use App\Http\Controllers\Api\prestramosController;


Route::post('/guardar-autor', [autoresController::class, 'store']);
Route::get('/todas-los-autores', [autoresController::class, 'index']);
Route::get('/autor/{autor}', [autoresController::class, 'show']);
Route::delete('/autor/{autor}', [autoresController::class, 'destroy']);
Route::put('/autor/{autor}', [autoresController::class, 'update']);

Route::post('/guardar-libro', [librosController::class, 'store']);
Route::get('/todos-los-libros', [librosController::class, 'index']);   
Route::get('/libro/{libro}', [librosController::class, 'show']);
Route::delete('/libro/{libro}', [librosController::class, 'destroy']);
Route::put('/libro/{libro}', [librosController::class, 'update']);

Route::post('/guardar-prestamo', [prestramosController::class, 'store']);
Route::get('/todos-los-prestamos', [prestramosController::class, 'index']);   
Route::get('/prestamo/{prestamo}', [prestramosController::class, 'show']);
Route::delete('/prestamo/{prestamo}', [prestramosController::class, 'destroy']);
Route::put('/prestamo/{prestamo}', [prestramosController::class, 'update']);

