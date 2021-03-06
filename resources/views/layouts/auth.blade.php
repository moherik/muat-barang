<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') &mdash; Muat Barang Administrator</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{mix('css/stisla.css')}}">

    <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <h4>Muat Barang</h4>
                        </div>

                        @yield('content')

                        <div class="simple-footer">
                            Copyright &copy; Muat Barang 2020
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{mix('js/vendor.js')}}"></script>
    <script src="{{mix('js/manifest.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/stisla.js')}}"></script>
</body>

</html>