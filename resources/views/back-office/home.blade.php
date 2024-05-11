@extends('layout.navBar')

@section('pageTitle')
Dashboard
@endsection

@section('corpo')

    <main class="dashboard">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="card" style="background-image: url('img/2151007391.jpg');">                
                    <div class="card-body">
                        <h1 class="number">10</h1>
                        <p>Titulos Disponiveis</p>
                    </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="background-image: url('img/2148898285.jpg');">                
                    <div class="card-body">
                        <h1 class="number">10</h1>
                        <p>Categorias</p>
                    </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="background-image: url('img/2148827223.jpg');">                
                    <div class="card-body">
                        <h1 class="number">10</h1>
                        <p>Livros em Acervo</p>
                    </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="background-image: url('img/elegant-touching-reading-concentrated-sophisticated_1134-997.jpg');">                
                    <div class="card-body">
                        <h1 class="number">10</h1>
                        <p>Alunos Registados</p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="background-image: url('img/front-view-man-holding-comics_23-2150347314.jpg');">                
                    <div class="card-body">
                        <h1 class="number">10</h1>
                        <p>Emprestimos Concedidos</p>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </main> 

@endsection