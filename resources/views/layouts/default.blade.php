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
    <footer class="main-footer">
        @include('includes.footer')
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<script>
$(document).ready(()=>{

                })</script>
    @include('includes.footScript')        
</body>
</html>
