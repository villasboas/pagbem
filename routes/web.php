<?php

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

// Seta a rota
Route::get('storage/notas/{filename}', function ( $filename ) {
    $path = storage_path('app/notas/' . $filename);

    // Se o arquivo não existir
    if (!File::exists($path)) abort(404);

    // Obtem o arquivo
    $file = File::get($path);
    $type = File::mimeType($path);

    // Seta a resposta
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    // Envia o arquivo
    return $response;
});
