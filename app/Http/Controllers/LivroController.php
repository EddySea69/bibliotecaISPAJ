<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateLivroRequest;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function mostrarLivros(){
        $livros = Livro::all();        
        $subcategorias = SubCategoria::all();        
        $categorias = Categoria::all();        
        return view('back-office.livros',compact('subcategorias','categorias', 'livros'));        
    }

    public function Inserir (Request $request){
        $livro = new Livro();
        $livro-> titulo = $request->titulo;
        $livro-> autor = $request->autor;
        $livro-> qtd = $request->quantidade;
        $livro-> editora = $request->editora;
        $livro-> id_subCategoria = $request->idSubcategoria;
        $livro->save();        
        return redirect()->route('livros.mostrarLivros')->with('success', 'Livro criado com sucesso!');        
    }   

    public function destroy($id)
    {
        Livro::find($id)->delete();
        return redirect()->route('livros.mostrarLivros')->with('success', 'Livro removida com sucesso!');
    }
    

}
