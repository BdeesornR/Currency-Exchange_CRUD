<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row my-3 ms-auto me-0 justify-content-between bg-light">
                @if ( Auth::check() )
                    <div class="col-6 d-flex text-start">
                        <a class="nav-link" href="{{ route('show-profile') }}">Profile</a>
                        <a class="nav-link" href="{{ route('show-history') }}">History</a>
                        <a class="nav-link" href="{{ route('show-market') }}">Market</a>
                    </div>
                    <div class="col-2 text-end">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="col-1"></div>
                    <div class="col-4 d-flex justify-content-end">
                        <a class="nav-link" href="{{ route('show-login') }}">Login</a>
                        <a class="nav-link" href="{{ route('show-register') }}">Register</a>
                    </div>
                @endif
            </div>

            @yield('content')

            <div class="modal fade" id="tradeModal" tabindex="-1" aria-labelledby="tradeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tradeModalLabel">Make Trade</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="tradeForm" action="{{ route('trade') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="tradeQuantity" class="form-label">Trade Worth:</label>
                                    <input type="number" class="form-control" id="tradeQuantity" name="tradeQuantity" step=".00000001">
                                    <input type="hidden" id="modalShop" name="shop" value="">
                                    <input type="hidden" id="modalMaxFiat" name="maxFiat" value="">
                                </div>
                                <div class="mb-3 d-flex">
                                    <div class="me-2">Trade Available:</div>
                                    <div class="me-2 text-uppercase" id="modalCurrency"></div>
                                    <div id="modalAvailable"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" form="tradeForm" class="btn btn-primary">Trade</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @stack('scripts')
    </body>
</html>
