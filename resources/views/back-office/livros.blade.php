@extends('layout.navBar')

@section('pageTitle')
    Livros
@endsection

@section('corpo')

    <main class="livros">
        <div class="container">
            <h2>Livros</h2>
            <hr>
            <div class="row mb-3 justify-content-between">
                <div class="col-md-3">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                        placeholder="Pesquisar por titulos...">
                </div>

                <div class="col-md-2" style="padding-left:80px;">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-add"></i>Novo Livro
                    </button>
                </div>

            </div>


            <div class="table-wrapper">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Sub-Categoria</th>
                            <th>Categoria</th>
                            <th>Editora</th>
                            <th>Quantidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($livros as $livro)
                        <tr>
                            <td>{{ $livro->id }}</td>
                            <td>{{ $livro->titulo }}</td>
                            <td>{{ $livro->autor }}</td>

                            @foreach ($subcategorias as $subcategoria)
                                
                                    @if ($subcategoria->id == $livro->id_subCategoria)
                                    <td>{{ $subcategoria->nome_subCategoria}} </td>
                                        @foreach ($categorias as $categoria)
                                         @if ($categoria->id == $subcategoria->id_categoria)
                                            <td>{{$categoria->nome_categoria}} </td>
                                         @endif
                                        @endforeach
                                    @endif
                                
                            @endforeach

                            <td>{{ $livro->editora }}</td>
                            <td>{{ $livro->qtd }}</td>

                            <td>
                                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="">Editar</a>                                   

                                <form action="{{ route('livro.destroy', $livro) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                                </form>
                            </td>                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>


            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Livro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('livro.Inserir') }}" method="POST">

                                @csrf
                                <div class="form-group">
                                    <label for="titulo">Título:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo">
                                </div>

                                <div class="form-group">
                                    <label for="categoria">Categoria:</label>
                                    <select class="form-control" id="categoria" name="categoria">
                                        @foreach ($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nome_categoria}}</option> 
                                         @endforeach  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="subcategoria">Subcategoria:</label>
                                    <select class="form-control" id="subcategoria" name="idSubcategoria">
                                        @foreach ($subcategorias as $subcategoria)
                                        <option value="{{$subcategoria->id}}">{{$subcategoria->nome_subCategoria}}</option> 
                                        @endforeach  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="autor">Autor:</label>
                                    <input type="text" class="form-control" id="autor" name="autor">
                                </div>
                                <div class="form-group">
                                    <label for="editora">Editora:</label>
                                    <input type="text" class="form-control" id="editora" name="editora">
                                </div>
                                <div class="form-group">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="number" class="form-control" id="quantidade" name="quantidade">
                                </div>
                                <button type="submit" class="btn btn-success">Adicionar Livro</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection
