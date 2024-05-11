<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle')</title>
    @yield('importCss')
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/fontawesome-free-6.5.1-web/css/fontawesome.css" rel="stylesheet" />
    <link href="css/fontawesome-free-6.5.1-web/css/brands.css" rel="stylesheet" />
    <link href="css/fontawesome-free-6.5.1-web/css/solid.css" rel="stylesheet" />
    
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
            <img src="img/logo.jpg" alt="" width="30" height="30" class="d-inline-block align-text-top">
            ISPAJ
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/"><i class="fa-solid fa-home"></i>Dasboard</a>
                </li>
                
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-book"></i>
                    Livros
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/livros">Livros</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/categorias">Categorias</a></li>                  
                    <li><a class="dropdown-item" href="/subcategorias">Sub-categorias</a></li>
                </ul>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="/estudantes"><i class="fa-solid fa-plus"></i>Alunos</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-spinner"></i>Emprestimos</a>
                </li>
                
            </ul>
                <div class="d-flex">                    
                    
                    <li class="dropdown" style="list-style:none !important;">
                        <a class=" dropdown-toggle" href="#" style="text-decoration: none;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fa-solid fa-pencil"></i>Editar</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                              <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"  onclick="event.preventDefault();
                                this.closest('form').submit();"><a class="dropdown-item" href=""><i class="fa-solid fa-sign-out"></i>Sair</a></button>
                            </form>
                          </li>                                                                            
                        </ul>
                    </li>

 



                </div>


            </div>
        </div>
    </nav>


    @yield('corpo')

      
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script>
      function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
      
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
     
    </script>
    
</body>
</html>