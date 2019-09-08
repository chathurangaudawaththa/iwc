<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>IWC Stock | Login</title>

    <!-- Fontfaces CSS-->
    <link href="login/css/font-face.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="login/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">



    <!-- Main CSS-->
    <link href="login/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 login-logo-padding">
                            <img class="login-logo" src="dist/img/logo-log.png" alt="CoolAdmin">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 new-padding">
                        <div class="login-wrap">                       
                            <div class="login-content">
                                <div class="login-logo">
                                    <a href="#">
                                        <img src="dist/img/logo-login.png" alt="CoolAdmin">
                                    </a>
                                </div>
                                <div class="login-form">
                                    <form action="{!! route('login.doLogin') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
                                        <!-- {{ csrf_field() }} || {{ Session::token() }} -->
                                        @csrf
                                        <div class="form-group">
                                            <br><br>
                                            @if (session()->has('message'))
                                                <label style="color:red; text-align:center">{{session()->get('message')}}</label> 
                                            @endif
                                            <input class="au-input au-input--full" type="text" name="username"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input class="au-input au-input--full" type="password" name="password"
                                                placeholder="Password"> 
                                        </div>
                                        <div class="login-checkbox">
                                            <label>
                                            </label>
                                            <label>
                                                <a title="Please Contact Development Team" href="#">Forgotten Password?</a>
                                            </label>
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign
                                            in</button>
                                    </form>
                                    <div class="register-link">
                                    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
      </div>
      <strong>Copyright &copy; 2019 Iron Wood Craft</a></strong> | All rights
    reserved. Developed by &nbsp;&nbsp;<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC0AAAAYCAYAAABurXSEAAAACXBIWXMAAC4jAAAuIwF4pT92AAACHElEQVRYw+2WP47TQBTGf2+1DdKOSEEfc4KEE2w4AW5AomL3BOvt6DZ0UOE9QdxFYgtyA8wNwglI+hSOpkg5FH42g5NYtrwyu9I+KVLiifW+efP9GXGcTYEbmtUaSIEFzi74T3XS8v9D4APwHTErxEweA+jqBn4g5qJv0Kd63E1rDLypPJshJuuTLuKca/mGGQMJMPKeboEAZ7OHSQ9nl0CoQIt6DkT9TZqzC6ApL+OSBmKqrrPG2aAv0G0sD+Alzq4QEwC/K2s/ve9LnI10g6GeTqZ2mXYVYtsKdeIrxFTXzg9oIFGbLOoKMdc4GwO8ePb+G/AW+Kjrnw/0vNvs5u+6WF6qYIIGoh3oJotTKHQw6UuIW+BShXis8WucFf1MgEBFijrOGLjG2fBQg81u/mWzm4s39bvNbi7+lAt6LGuA3pa83J9gfFCoYrJ/OC1mrUE0003H3S0vd4PtkfWrvajOAafeBP0aKa/PdapU7HGGmKg76Lzq0ixRoD6nRy19feIB/9oVeAE6qpn2EJh6v+saVjntAw+AXyXwzqDz+K0LmL80yT32tmHkDxAzRUy816PDDfHUm8YCMZcqmGM0GWvzqXJ1WCtEGJQenYNceemZ3o/lOZsAryrJtk+T4ydTFWLkUWLk3RCT+03EQjh5eIQqokF5NRUT4OwKZ1PEfKoJiiXOZl6Ehzrp2PP6nq6mD6BOeIT1BPoJdE39AVkByN9vDJ15AAAAAElFTkSuQmCC" alt="" />
    </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="login/jquery-3.2.1.min.js"></script>
    <script src="login/animsition/animsition.min.js"></script>
    <script src="login/js/main.js"></script>
    
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
<!-- end document-->