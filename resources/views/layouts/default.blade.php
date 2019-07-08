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
</body>
</html>
