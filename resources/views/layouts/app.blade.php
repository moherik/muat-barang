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

    @livewireStyles
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.partials._navbar')

            @include('layouts.partials._sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('content:header')</h1>
                        <div class="section-header-breadcrumb">
                            @yield('content:breadcrumb')
                        </div>
                    </div>

                    <div class="section-body">
                        @yield('content:body')
                    </div>
                </section>
            </div>

            @include('layouts.partials._footer')
        </div>
    </div>

    @yield('modal')

    @livewireScripts

    <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="{{mix('js/vendor.js')}}"></script>
    <script src="{{mix('js/manifest.js')}}"></script>
    @stack('before-scripts')
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/stisla.js')}}"></script>
    @stack('after-scripts')
</body>

</html>