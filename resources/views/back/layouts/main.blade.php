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
            <div class="row" style="border-bottom-color: gray; border-bottom-style: solid;">
                <div class="col-11"></div>
                <div class="col-1" style="padding: 5px;"><a href="/" class="btn btn-secondary btn-sm">前台</a></div>
            </div>
            <div class="row">
                <div class="col-2" style="border-right-color: gray; border-right-style: solid;">
                    <br>
                    <p><a href="/control" class="link-success"><i class="fa fa-home" aria-hidden="true"></i> 首頁</a></p>
                    <p><a href="/news/table" class="link-success"><i class="fa fa-sticky-note" aria-hidden="true"></i> 最新消息</a></p>
                    <p><a href="/product/table" class="link-success"><i class="fa fa-star" aria-hidden="true"></i> 產品</a></p>
                    <p><a href="/type" class="link-success"><i class="fa fa-share-alt" aria-hidden="true"></i> 產品分類</a></p>
                    <p><a href="/contact/table" class="link-success"><i class="fa fa-commenting" aria-hidden="true"></i> 聯絡我們</a></p>
                </div>
                <div class="col-10">
                    <br>
                    @yield('home')
                    @yield('news_table')
                    @yield('news_info')
                    @yield('contact_table')
                    @yield('contact_info')
                    @yield('type')
                    @yield('product_table')
                    @yield('product_info')
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
