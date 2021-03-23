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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {

    try {
        //code...
        $users = DB::connection('firebird')->select('SELECT * FROM PARAMETROS');

        $sql = 'SELECT * FROM CLIENTES WHERE CLIENTES.RAZAO CONTAINING :NOME';
        $bindings = ['NOME' => 'SENA'];        
        $will = $users = DB::connection('firebird')->select($sql, $bindings);


        dd($will, $users);
    } catch (\Exception $e) {
        //throw $th;
        dd( 'Erro >> '.$e->getMessage().' << ao testar', $e->getMessage() ,$e);
    }
    
    return view('welcome');
});
