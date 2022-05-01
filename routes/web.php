<?php

use App\Http\Controllers\Admin\TesteController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return 'Login';
})->name('login');

// Agrupamento de rotas com middleware de autenticação.
Route::middleware([])->group(function () {
    // Utilizando um prefixo para todas as rotas.
    Route::prefix('admin')->group(function() {
        Route::get('/dashboard', function () {
            return 'Home admin';
        });
        
        Route::get('/financeiro', function () {
            return 'Financeiro admin';
        });
        
        Route::get('/produtos', function () {
            return 'Produtos admin';
        });

        // Essa rota faz referência a rota admin.
        Route::get('/', [TesteController::class, 'teste']);
        // 10:40
    });
});


// Utilizando parâmetros opcionais.
Route::get('/produtos/{idProduto?}', function ($idProduto = '') {
    return "Produtos {$idProduto}";
});

// Utilizando um parâmetro dinâmico e um valor prefixo.
Route::get('/categorias/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

// Utilizando parâmetros de forma dinâmica.
Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

// Rota do tipo 'any' permite todos os tipos de verbos HTTP (GET, POST, DELETE, PUT).
Route::any('/any', function () {
    return 'Any';
});

// Rota do tipo 'match' permite que apenas verbos HTTP definidos sejam aceitos.
Route::match(['get', 'post'], '/match', function () {
    return 'Match';
});

Route::post('/register', function () {
    return '';
});

Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});
