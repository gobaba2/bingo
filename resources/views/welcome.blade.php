<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BINGOO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
 
        </style>
        <style>
        .contenedor{
            width:500px;
            height:500px;
            border:1px solid red;
            display:flex;
            justify-content:center;
            align-items:center;
            background:blue;
        }
        #test {
            position:relative;
            display:flex;
            justify-content:center;
            align-items:center;
            color:#015b79;
            font-size:34px;
            width:100px;
            height:100px;
            border-radius:50%;
            background:rgb(251,251,251);
            opacity:0;
            font-weight:bold;
        }
        .translate_xy {
            transform:  translate(-120px, 80px);
            opacity:1 !important;
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Bingo
                </div>
                <button id="play">JUGAR</button>
                <div style="display:flex;">
                    @for ($i = 1; $i < 76; $i++)
                        <div id="{{$i}}" style="">
                            <span>
                                {{ $i }}
                            </span>
                        </div>
                    @endfor
                </div>
                <div class="contenedor">
                    <div id="test"></div>
                </div>
                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
        crossorigin="anonymous"></script>
        <script>
            $('#play').click(function(){
                document.getElementById("test").style.transition = "transform 700ms  ease-in,opacity 2s"; 
                $('#test').addClass('translate_xy');
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let respuesta=JSON.parse(this.responseText);
                        setTimeout('', 5000);
                        document.getElementById("test").innerHTML=respuesta.numero;
                    }
                };
                xhttp.open("GET", "numero", true);
                xhttp.send();
            });
            
        </script>
    </body>
</html>
