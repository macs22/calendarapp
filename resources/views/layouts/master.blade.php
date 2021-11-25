<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>{{ env('APP_NAME') }} :: @yield('title')</title>
        <meta name="description" content="">
        <meta name="author" content="aubrey macasaet">
        <link rel="shortcut icon" href="">
    
        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    
        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome-free/css/all.min.css') }}">
    
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/dist/css/iziToast.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/modules/Parsley.js/src/parsley.css') }}" />
    
        @stack('styles')

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/general.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/amsify.css') }}">
    </head>
    

    @yield('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">

    <body class="sidebar-mini">
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>

                <!-- Main Content -->
                <div class="main-content">
                    @yield('content')
                </div>
                <footer class="main-footer">
                    <div class="footer-left">
                        &copy; {{ now()->year }}
                        <div class="bullet"></div>
                    </div>
                    <div class="footer-right">
                        Aubrey Macasaet
                    </div>
                </footer>
            </div>
        </div>

        <script>
            var date_picker_locale = {
                format: 'YYYY-MM-DD',
                daysOfWeek: [
                    "{{ __('Sun') }}",
                    "{{ __('Mon') }}",
                    "{{ __('Tue') }}",
                    "{{ __('Wed') }}",
                    "{{ __('Thu') }}",
                    "{{ __('Fri') }}",
                    "{{ __('Sat') }}"
                ],
                monthNames: [
                    "{{ __('January') }}",
                    "{{ __('February') }}",
                    "{{ __('March') }}",
                    "{{ __('April') }}",
                    "{{ __('May') }}",
                    "{{ __('June') }}",
                    "{{ __('July') }}",
                    "{{ __('August') }}",
                    "{{ __('September') }}",
                    "{{ __('October') }}",
                    "{{ __('November') }}",
                    "{{ __('December') }}"
                ],
            };
        </script>
        <!-- General JS Scripts -->
        <script src="{{ asset('assets/modules/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/modules/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/modules/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/modules/moment/min/moment-with-locales.min.js') }}"></script>
        <script src="{{ asset('assets/modules/axios/dist/axios.min.js') }}"></script>
        <script src="{{ asset('assets/modules/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/modules/Parsley.js/dist/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/stisla.js') }}"></script>

        <!-- JS Libraies -->
        <script src="{{ asset('assets/modules/izitoast/dist/js/iziToast.min.js') }}"></script>
        <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        
        <!-- Template JS File -->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/amsify.js') }}"></script>
        
        @stack('scripts')

    </body>

</html>
