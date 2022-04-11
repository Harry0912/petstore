<!DOCTYPE html>
<html>
    <head>
        <title>ＯＯＯ貓狗寵物水族館</title>
        <meta name="_token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}"></link>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <nav>
                        <ul class="nav nav-pills justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">首頁</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/news/list">最新消息</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/product_list">產品</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact/form">聯絡我們</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-1" style="padding: 5px;"><a href="/control" class="btn btn-secondary btn-sm">後台</a></div>
            </div>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('images/banner1.jpg') }}" width="1920" height="320" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('images/banner2.jpg') }}" width="1920" height="320" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('images/banner3.jpg') }}" width="1920" height="320" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div><br>

            @yield('main')
            @yield('news_list')
            @yield('news_show')
            @yield('contact')
        </div>

        <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
