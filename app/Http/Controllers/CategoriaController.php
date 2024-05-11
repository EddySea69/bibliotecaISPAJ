<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatecategoryRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$categorias = Categoria::all();
        //return view('back-office.categorias', compact('categorias'));
    }

    public function mostrarCategorias(){
        $categorias = categoria::all();        
        return view('back-office.categorias')->with('categoria',$categorias);
        
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    /*public function create()
    {
        return view('categorias.create');
    }*/

   /*public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categoria.mostrarCategorias')->with('success', 'Categoria criada com sucesso!');
    }*/

    public function Inserir (Request $request){
        $categoria = new categoria();
        $categoria-> nome_categoria = $request->nomeCategoria;
        $categoria->save();        
        return redirect()->route('categoria.mostrarCategorias')->with('success', 'Categoria criada com sucesso!');        
    }   

    /*public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('back-office.categorias-edit', compact('categoria'));
    }*/

   /* public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categoria.mostrarCategorias')->with('success', 'Categoria atualizada com sucesso!');
    }*/

    /* 
    * @param \App\Http\Requests\UpdatecategoryRequest  $request
    */

    public function update(UpdatecategoryRequest $request, $id)
    {
        $category = Categoria::find($id);
        $category->nome_categoria = $request->nome_categoria;
        $category->save();       

        return redirect()->route('categoria.mostrarCategorias')->with('success', 'Categoria atualizada com sucesso!');
    }




    public function destroy($id)
    {
        Categoria::find($id)->delete();
        return redirect()->route('categoria.mostrarCategorias')->with('success', 'Categoria removida com sucesso!');
    }

}
