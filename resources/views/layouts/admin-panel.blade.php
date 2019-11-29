<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Dashboard')</title>

    {{-- Main Global CSS --}}
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/admin/sb-admin.css') }}">
    @yield('page-css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('components.admin-sidenav')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('components.admin-topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; KnowYourWay 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- Modals Area --}}
    @include('components.admin-logout-md')

    {{-- Main Global JS --}}
    <script src="{{ asset('js/sb-admin.js') }}"></script>
    @yield('page-script')
</body>

</html>