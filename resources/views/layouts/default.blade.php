<!DOCTYPE html>
<html>
<head>
   @include('includes.head')
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
        @include('includes.header')
        @include('includes.sidebar')
        @yield('content')
        @include('includes.footer')
    </div>
    @include('includes.footScript') 
    
    <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    @if (notify()->ready())
        <script>
            swal({
                title: "{!! notify()->message() !!}",
                text: "{!! notify()->option('text') !!}",
                type: "{{ notify()->type() }}",
                @if (notify()->option('timer'))
                    timer: {{ notify()->option('timer') }},
                    showConfirmButton: false
                @endif
            });
        </script>
    @endif
</body>
</html>
