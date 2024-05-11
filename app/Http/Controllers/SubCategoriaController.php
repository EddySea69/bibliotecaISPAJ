<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mostrarSubCategorias(){
        $subcategorias = SubCategoria::all();        
        $categorias = Categoria::all();        
        return view('back-office.subCategorias',compact('subcategorias','categorias'));        
    }
    public function show($id)
    {
        $subcategoria = SubCategoria::findOrFail($id);
        return view('subcategorias.show', compact('subcategoria'));
    }


    public function Inserir (Request $request){
        $subcategoria = new SubCategoria();
        $subcategoria-> nome_subCategoria = $request->nomeSubCategoria;
        $subcategoria-> id_categoria = $request->idCategoria;
        $subcategoria->save();        
        return redirect()->route('subcategoria.mostrarSubCategorias')->with('success', 'SubCategoria criada com sucesso!');        
    }   

    public function update(UpdateSubcategoryRequest $request, $id)
    {
        $subcategory = SubCategoria::find($id);
        $subcategory->id_categoria = $request->categoria_id;
        $subcategory->nome_subCategoria = $request->nome_subcategoria;        
        $subcategory->save();       

        return redirect()->route('subcategoria.mostrarSubCategorias')->with('success', 'SubCategoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        SubCategoria::find($id)->delete();
        return redirect()->route('subcategoria.mostrarSubCategorias')->with('success', 'SubCategoria removida com sucesso!');
    }

}


