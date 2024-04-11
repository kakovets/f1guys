<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        h1 {
            font-size: 4rem;
            color: lightblue;
            -webkit-text-stroke: 2px black;
        }

        .container {
            position: relative;
            text-align: center;
            color: white;
        }

        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -90%);
        }

        .imgf1 {
            width: 100%;
            height: 200px;
        }

        #homeForm:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form id="homeForm" method="get" action="{{ route('index') }}">
        <header onclick="document.getElementById('homeForm').submit();">
            <div class="container">
                <img src="{{ asset('img/ferrari.webp') }}" class="imgf1">
                <div class="centered">
                    <h1>F1 Guys</h1>
                </div>
            </div>
        </header>
    </form>

    <main>
        @yield('main')
    </main>
</body>

</html>