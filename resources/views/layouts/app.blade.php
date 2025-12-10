<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom fonts for this template-->
        <link href="{{ asset ('adminTheme/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="{{ asset ('adminTheme/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('adminTheme/css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link href="{{ asset('adminTheme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

        <script src="https://cdn.lordicon.com/lordicon.js"></script>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    @include('layouts.navigation')
                    <!-- End of Topbar -->

                    <!-- Page Heading -->
                    @isset($header)
                        <header>
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; ECOM Website 2025</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->



        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset ('adminTheme/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset ('adminTheme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset ('adminTheme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset ('adminTheme/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset ('adminTheme/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset ('adminTheme/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset ('adminTheme/js/demo/chart-pie-demo.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset ('adminTheme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset ('adminTheme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset ('adminTheme/js/demo/datatables-demo.js') }}"></script>

        <x-common />
        @stack('scripts')

    </body>

</html>
