<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- vue.jsのための　-->
        <!-- ajax通信をするときはcsrfトークンを使う -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        
        <title>在庫データ取得</title>
　　　　　<link rel="stylesheet" type="text/css" href="/css/app.css">　
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
                font-size: 30px;
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
                margin-bottom: 5px;
            }
            .stick {
                position: -webkit-sticky;
                position: sticky;
                top:0;
            }
            table{
                margin-right:auto;
                margin-left:auto;
            }

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
            <div>
                <div style="position:sticky;top:0;background-color:#c0c0c0">   
                    <div class="title m-b-md">
                        @yield('title')  
                    </div> 
                    <div class="links">
                        <a href="{{ route('Stockout') }}">在庫不足</a>
                        <a href="{{ route('StockAdd') }}">在庫追加</a>
                        <a href="{{ route('newItem') }}">新商品</a>
                        <a href="{{ route('setting') }}">set Parameters</a>
                        <a href="{{ route('CsvImport_index') }}">Csv Import</a>
                        <a href="{{ route('tallsecretStock') }}">不足現状</a>
                        <a href="https://github.com/kouymmt/inventory/tree/dev">GitHub</a>
                    </div>
                </div>
                    @section('content')
                    @show
                </div>
                </div>
            </div>
        </div>
        <!-- vue.jsのための　-->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
