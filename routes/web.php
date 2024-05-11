<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\LivroController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('back-office.home');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
    
    
    //CRUD Categorias
    Route::get('/categorias', [CategoriaController::class, 'mostrarCategorias'])->name('categoria.mostrarCategorias');
    Route::post('/categoria', [CategoriaController::class, 'Inserir'])->name('categoria.Inserir');        
    Route::post('/categoria/update/{id}', [CategoriaController::class, 'update'])->name('category.update');
    Route::post('/categorias/delete/{id}', [CategoriaController::class, 'destroy'])->name('category.destroy');

    //CRUD Sub-Categorias
    Route::get('/subcategorias', [SubCategoriaController::class, 'mostrarSubCategorias'])->name('subcategoria.mostrarSubCategorias');
    Route::post('/subcategorias/delete/{id}', [SubCategoriaController::class, 'destroy'])->name('subcategory.destroy');
    Route::post('/subcategoria', [SubCategoriaController::class, 'Inserir'])->name('subcategory.Inserir');
    Route::post('/subcategoria/update/{id}', [SubCategoriaController::class, 'update'])->name('subcategory.update');


    //CRUD Livros
    Route::get('/livros', [LivroController::class, 'mostrarLivros'])->name('livros.mostrarLivros');
    Route::post('/livros', [LivroController::class, 'Inserir'])->name('livro.Inserir');
    Route::post('/livro/delete/{id}', [LivroController::class, 'destroy'])->name('livro.destroy');
    
});


//CRUD Estudante
Route::get('/estudantes', function () {
    return view('back-office.alunos');});





require __DIR__.'/auth.php';
