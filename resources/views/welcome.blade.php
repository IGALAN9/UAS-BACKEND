<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            .center-nav {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .btn-blue {
                background-color: #1E90FF;
                color: white;
                border: none;
                padding: 10px 20px;
                margin: 5px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
                cursor: pointer;
            }

            .btn-blue:hover {
                background-color: #1C86EE;
            }

            .btn-blue:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.5);
            }
        </style>

    </head>
    <body>
        @if (Route::has('login'))
            <nav class="center-nav">
                @auth
                    <form action="{{ url('/dashboard') }}" method="get">
                        <button type="submit" class="btn-blue">
                            Dashboard
                        </button>
                    </form>
                @else
                    <form action="{{ route('login') }}" method="get">
                        <button type="submit" class="btn-blue">
                            Log in
                        </button>
                    </form>

                    @if (Route::has('register'))
                        <form action="{{ route('register') }}" method="get">
                            <button type="submit" class="btn-blue">
                                Register
                            </button>
                        </form>
                    @endif
                @endauth
            </nav>
        @endif
    </body>
</html>
