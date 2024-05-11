@extends('layout.navBar')

@section('pageTitle')
    Categorias
@endsection

@section('corpo')

    <main class="livros categoria">
        <div class="container">
            <h2>Categorias</h2>
            <hr>


            <div class="row justify-content-between">

                <div class="col-md-4">
                    <form action="{{ route('categoria.Inserir') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="nomeCategoria">Nome da Categoria:</label>
                            <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria">
                        </div>

                        <button type="submit" class="btn btn-success">Adicionar Categoria</button>
                    </form>

                        
                </div>

                <div class="table-wrapper col-md-6">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control mb-2"
                        placeholder="Pesquisar por categorias..">
                    <table class="table table-striped" style="margin-top: 0;" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoria as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome_categoria }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</a>                                   

                                    <form action="{{ route('category.destroy', $categoria) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                                    </form>                                    
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"> 

                            <form method="post" id="updateCategoryForm">
                                @csrf                                
                                <div class="form-group">
                                    <input type="hidden" name="category_id">
                                    <label for="categoria">Categoria:</label>
                                    <input type="text" class="form-control" id="categoria" name="nome_categoria">
                                </div>
                                <button type="submit" class="btn btn-success">Salvar</button>
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

    <script>
        // Get all the "Editar" buttons
        const editButtons = document.querySelectorAll('a[data-bs-target="#staticBackdrop"]');

        // Add a click event listener to each "Editar" button
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get the category ID and name from the current row
                const categoryId = this.closest('tr').querySelector('td:first-child').textContent;
                const categoryName = this.closest('tr').querySelector('td:nth-child(2)').textContent;

                // Fill the modal input field with the category name
                const modalInput = document.querySelector('#staticBackdrop input[name="nome_categoria"]');
                modalInput.value = categoryName;

                // Set the category ID in the hidden input field
                const hiddenInput = document.querySelector('#staticBackdrop input[name="category_id"]');
                hiddenInput.value = categoryId;

                // Set the action attribute of the form with the category ID
                const form = document.querySelector('#staticBackdrop form');
                form.action = `{{ route('category.update', '') }}/${categoryId}`;
            });
        });

    </script>

@endsection
