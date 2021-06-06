<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{isset($title) ? $title : 'TCL Tanker.cloud - BETA 2'}}</title>

    <!-- Scripts -->
    <script>
        var uploadUrl = "{{route('videos.store')}}"
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="//unpkg.com/videojs-record/dist/css/videojs.record.min.css">
    <link rel="stylesheet" href="{{ asset('css/spinner.css') }}"> 

    <!-- Icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- pixie css libraries -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <link href="{{asset('pixie/styles.min.css?v34')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.css" integrity="sha512-LDB28UFxGU7qq5q67S1iJbTIU33WtOJ61AVuiOnM6aTNlOLvP+sZORIHqbS9G+H40R3Pn2wERaAeJrXg+/nu6g==" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    @yield('styles')
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-50">

    <pixie-editor></pixie-editor>
    <div id="app">
        @include('layouts.nav')

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- <script>
        $(document).ready(function(){
            if($('.form-data').length){
                if ($('.form-date').prop('type') != "date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
                    $('.form-date').datepicker({ dateFormat: 'yy-mm-dd' });
                }
                console.log("we are here")
            }
        });
    </script> -->
    <script src="{{asset('pixie/scripts.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    @stack('scripts')

    @yield('script_sections')

    @if (session()->has('success'))
    <script>
        const notyf = new Notyf({dismissible: true})
        notyf.success('{{ session('success') }}')
    </script>
    @endif

    @livewireScripts
    <script>
        /* Simple function to retrieve data url from file */
        function fileToDataUrl(event, callback) {
            if (! event.target.files.length) return

            let file = event.target.files[0],
                reader = new FileReader()

            reader.readAsDataURL(file)
            reader.onload = e => callback(e.target.result)
        }

    </script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <!-- <script>
        (function (d, t, g) {
            var ph    = d.createElement(t), s = d.getElementsByTagName(t)[0];
            ph.type   = 'text/javascript';
            ph.async   = true;
            ph.charset = 'UTF-8';
            ph.src     = g + '&v=' + (new Date()).getTime();
            s.parentNode.insertBefore(ph, s);
        })(document, 'script', '//dashboard.snappy.io/?p=17&ph_apikey=c5dc3bc8c15d2c833cd9efc32db9e4cb');
    </script> -->
</body>
</html>
