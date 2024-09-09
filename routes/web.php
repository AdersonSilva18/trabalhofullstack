<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/pessoas');

Route::resource('pessoas', PessoaController::class);
