@extends('layout.navBar')

@section('pageTitle')
    Categorias
@endsection

@section('corpo')

<main class="editUserForm">
    <div class="container">

        <div class="row justify-content-center">
            <form class="col-md-4 mt-5">
                <h3 style="text-align: center;">Atualizar Dados do Perfil</h3>
                <hr>
                <div class="form-group mb-2">
                    <label for="nomeCompleto">Nome Completo:</label>
                    <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto">
                </div>
                <div class="form-group mb-2">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group mb-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group mb-2">
                    <label for="senhaAntiga">Senha Antiga:</label>
                    <input type="password" class="form-control" id="senhaAntiga" name="senhaAntiga">
                </div>
                <div class="form-group mb-2">
                    <label for="novaSenha">Nova Senha:</label>
                    <input type="password" class="form-control" id="novaSenha" name="novaSenha">
                </div>
                <div class="form-group mb-2">
                    <label for="confirmarNovaSenha">Confirmar Nova Senha:</label>
                    <input type="password" class="form-control" id="confirmarNovaSenha" name="confirmarNovaSenha">
                </div>
                <button type="submit" class="btn btn-primary">Atualizar Dados</button>
            </form>
        </div>

    </div>
</main>

@endsection
