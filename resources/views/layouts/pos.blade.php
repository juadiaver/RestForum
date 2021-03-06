<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif CASA JUAN</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style type="text/css">
        html {
            min-height: 100%;
            position: relative;
        }

        body {
            margin: 0;
            margin-bottom: 50px;
            background: #23EC55;
            background: -webkit-radial-gradient(top right, #23EC55, #2D51C1);
            background: -moz-radial-gradient(top right, #23EC55, #2D51C1);
            background: radial-gradient(to bottom left, #23EC55, #2D51C1);
        }

        footer {

            position: absolute;
            bottom: 0;
            width: 100%;
            height: 80px;

        }
    </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm border border-dark">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    INICIO
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth()
                        <ul class="navbar-nav mr-auto">


                        </ul>
                    @endauth()

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">Entrar</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/articulos') }}"
                                    class="nav-link"> Articulos</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/categorias') }}"
                                    class="nav-link"> Categorias</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/restaurantes') }}"
                                    class="nav-link"> Datos Restaurante</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/mesas') }}"
                                    class="nav-link"> Mesas</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/ventas') }}"
                                    class="nav-link"> Ventas</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/pedidos') }}"
                                    class="nav-link"> Pedidos</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/calendar') }}"
                                    class="nav-link"> Reservas</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/pos') }}"
                                    class="nav-link"> POS</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/menus') }}"
                                    class="nav-link"> Menus</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/cajas') }}"
                                    class="nav-link"> Cajas</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/cartas') }}"
                                    class="nav-link"> Cartas</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/promociones') }}"
                                    class="nav-link"> Promocion</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/carrusel') }}"
                                    class="nav-link"> Imagenes carrusel</a>
                            </div>
                            <div>
                                <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/user') }}"
                                    class="nav-link"> Usuarios</a>
                            </div>
                            <li class="nav-item dropdown d-none d-sm-block">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Menu
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @php
                                        $user = Auth::user();
                                    @endphp
                                    @if ($user->role == 0)
                                        <a class="dropdown-item" href="{{ url('/articulos') }}" class="nav-link">
                                            Articulos</a>

                                        <a class="dropdown-item" href="{{ url('/categorias') }}" class="nav-link">
                                            Categorias</a>

                                        <a class="dropdown-item" href="{{ url('/restaurantes') }}"
                                            class="nav-link"> Datos Restaurante</a>

                                        <a class="dropdown-item" href="{{ url('/mesas') }}" class="nav-link">
                                            Mesas</a>

                                        <a class="dropdown-item" href="{{ url('/ventas') }}" class="nav-link">
                                            Ventas</a>

                                        <a class="dropdown-item" href="{{ url('/pedidos') }}" class="nav-link">
                                            Pedidos</a>

                                        <a class="dropdown-item" href="{{ url('/calendar') }}" class="nav-link">
                                            Reservas</a>

                                        <a class="dropdown-item" href="{{ url('/pos') }}" class="nav-link">
                                            POS</a>

                                        <a class="dropdown-item" href="{{ url('/menus') }}" class="nav-link">
                                            Menus</a>

                                        <a class="dropdown-item" href="{{ url('/cajas') }}" class="nav-link">
                                            Cajas</a>

                                        <a class="dropdown-item" href="{{ url('/cartas') }}" class="nav-link">
                                            Cartas</a>

                                        <a class="dropdown-item" href="{{ url('/promociones') }}"
                                            class="nav-link"> Promocion</a>

                                        <a class="dropdown-item" href="{{ url('/carrusel') }}" class="nav-link">
                                            Imagenes carrusel</a>

                                        <a class="dropdown-item" href="{{ url('/user') }}" class="nav-link">
                                            Usuarios</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Desconectar
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>

        <br>
        <br>
        <br>


    </div>
    <footer class=" bg-dark text-center text-white">
        <div>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-linkedin-in"></i></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
        </div>
        <div class="text-center">
            ?? 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">CasaJuan.com</a>
        </div>
        <!-- Grid container -->


        <!-- Copyright -->
    </footer>
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#createDataModal').modal('hide');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#success-alert").hide();
            $("#myWish").click(function showAlert() {
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);
                });
            });
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/3ho3vmymbnsm21346vojwdxmt11x330ou89mt6u3g6xpv52u/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#mytextarea',
            height: 500,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools wordcount'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertfile image link',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
        });
    </script>
    @yield('js')
</body>

</html>
