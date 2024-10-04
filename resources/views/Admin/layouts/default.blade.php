<!doctype html>
<html>

<head>
    @include('Admin.includes.head')
</head>

<body>

    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('Admin.includes.sidebar')
        <!--close sidebar wrapper -->

        <header class="row">
            @include('Admin.includes.header')
        </header>

        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>

        <footer class="row">
            @include('Admin.includes.footer')
        </footer>

    </div>
</body>

</html>
