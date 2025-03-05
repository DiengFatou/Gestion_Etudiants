<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
Route::get('/etudiants', [EtudiantController::class, 'index']);
Route::post('etudiants/create', [EtudiantController::class, 'store']);
Route::put('etudiants/edit/{id}', [EtudiantController::class, 'update']);
Route::delete('etudiants/{etudiant}', [EtudiantController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
