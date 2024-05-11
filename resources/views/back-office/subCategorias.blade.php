@extends('layout.navBar')

@section('pageTitle')
Sub-categorias
@endsection

@section('corpo')

<main class="livros categoria subcategoria">
    <div class="container">
        <h2>Sub-categorias</h2>
        <hr>

        <div class="row justify-content-between">

            <div class="col-md-4">
                <form action="{{ route('subcategory.Inserir') }}" method="post">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="categoria">Categoria:</label>                          
                        <select class="form-control" id="categoria" name="idCategoria">
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome_categoria}}</option> 
                            @endforeach    
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="nomeCategoria">Nome da Sub-categoria:</label>
                        <input type="text" class="form-control" id="subCategoria" name="nomeSubCategoria">
                    </div>

                    <button type="submit" class="btn btn-success">Adicionar Sub-categoria</button>
                </form>
            </div>

            <div class="table-wrapper col-md-6">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control mb-2"
                    placeholder="Pesquisar por sub-categorias..">
                <table class="table table-striped" style="margin-top: 0;" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sub-categoria</th>
                            <th>Categoria</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td>{{ $subcategoria->id }}</td>
                            <td>{{ $subcategoria->nome_subCategoria }}</td>
                            {{-- <td>{{ $categoria->idSubCategoria }}</td> --}}
                            <td>
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->id == $subcategoria->id_categoria)
                                     {{$categoria->nome_categoria}}
                                    @endif
                                 @endforeach
                            </td>
                            
                            
                            <td>
                                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</a>                                   

                                <form action="{{ route('subcategory.destroy', $subcategoria) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                                </form>                                    
                                
                            </td>                            
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



        </div>





        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar Sub-categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nome_subcategoria" class="form-label">Subcategoria</label>
                                <input type="text" class="form-control" id="nome_subcategoria" name="nome_subcategoria" required>
                            </div>

                            <div class="mb-3">
                                <label for="categoria_id" class="form-label">Categoria</label>
                                <select class="form-select" id="categoria_id" name="categoria_id" required>
                                    <!-- Options will be populated by JavaScript -->
                                </select>
                            </div>
                            <input type="hidden" name="subcategory_id">
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>                            
                        </div>
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
            // Get the subcategory ID, name, and category ID from the current row
            const subcategoryId = this.closest('tr').querySelector('td:first-child').textContent;
            const subcategoryName = this.closest('tr').querySelector('td:nth-child(2)').textContent;
            const categoryId = this.closest('tr').querySelector('td:nth-child(3)').textContent;

            // Get the modal input field for subcategory name
            const modalSubcategoryInput = document.querySelector('#staticBackdrop input[name="nome_subcategoria"]');
            modalSubcategoryInput.value = subcategoryName;

            // Get the modal select field for category
            const modalCategorySelect = document.querySelector('#staticBackdrop select[name="categoria_id"]');

            // Clear the existing options
            modalCategorySelect.innerHTML = '';

            // Add the categories as options
            let optionElement;

            @foreach ($categorias as $category)
                optionElement = document.createElement('option');
                optionElement.value = {{ $category->id }};
                optionElement.textContent = '{{ $category->nome_categoria }}';
                if ({{ $category->id }} == categoryId) {
                    optionElement.selected = true;
                }
                modalCategorySelect.appendChild(optionElement);
            @endforeach


            // Set the subcategory ID in the hidden input field
            const hiddenInput = document.querySelector('#staticBackdrop input[name="subcategory_id"]');
            hiddenInput.value = subcategoryId;

            // Set the action attribute of the form with the subcategory ID
            const form = document.querySelector('#staticBackdrop form');
            form.action = `{{ route('subcategory.update', '') }}/${subcategoryId}`;
        });
    });
</script>




@endsection