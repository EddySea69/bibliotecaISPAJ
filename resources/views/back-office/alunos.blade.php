@extends('layout.navBar')

@section('pageTitle')
Alunos
@endsection

@section('corpo')

<main class="livros alunos">
    <div class="container">
        <h2>Alunos</h2>
        <hr>

        <div class="row mb-3 justify-content-between">

            <div class="col-md-3">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                    placeholder="Pesquisar por nomes ou num...">
            </div>

            <div class="col-md-2" style="padding-left:80px;">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-add"></i>Novo Aluno
                </button>
            </div>

        </div>


        <div class="table-wrapper">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nº Estudante</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nome do Livro </td>
                        <td>Autor 1</td>
                        <td>123</td>
                        <td>
                            <a class="btn btn-primary btn-sm">Editar</a>
                            <a class="btn btn-danger btn-sm">Apagar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Estudante</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="nestudante">Nº Estudante:</label>
                                <input type="text" class="form-control" id="nestudante" name="nestudante">
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


@endsection