<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IWC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <!-- multiple -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('lib/iCheck/all.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

  <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script src="{{asset('js/popper.min.js')}}"></script>

<style>
#demo {
  width: 100%;
  heignth: 41px;
  padding: 9px 15px;
  margin: 10px auto;
  font-size: 16px;
  text-align:center;
  border: 1px solid #cccaca;

}
.small-box>.inner {
  padding: 0 10px;
}
.new-content {
  padding: 0 15px;
}

.select-wrapper {
  position: relative;
  width: 420px;
}
.select-wrapper::after {
  color: black;
  content: '▾';
  margin-right: 10px;
  pointer-events: none;
  position: absolute;
  right: 10px;
  top: 7px;
  font-size: 20px;
}

.select {
  -moz-appearance: none;
  -webkit-appearance: none;
  background: #acddf5;
  border: none;
  border-radius: 0;
  cursor: pointer;
  font-size: 16px;
  padding: 9px 15px;
  width: 100%;
  border: 1px solid #cccaca;
}
.select:focus {
  color: black;
}
.select::-ms-expand {
  display: none;
}


.radio {
  margin: 0.5rem;
}
.radio input[type="radio"] {
  position: absolute;
  opacity: 0;
}
.radio input[type="radio"] + .radio-label:before {
  content: '';
  background: #f4f4f4;
  border-radius: 100%;
  border: 1px solid #b4b4b4;
  display: inline-block;
  width: 1.4em;
  height: 1.4em;
  position: relative;
  top: -0.2em;
  margin-right: 1em;
  vertical-align: top;
  cursor: pointer;
  text-align: center;
  transition: all 250ms ease;
}
.radio input[type="radio"]:checked + .radio-label:before {
  background-color: #3197EE;
  box-shadow: inset 0 0 0 4px #f4f4f4;
}
.radio input[type="radio"]:focus + .radio-label:before {
  outline: none;
  border-color: #3197EE;
}
.radio input[type="radio"]:disabled + .radio-label:before {
  box-shadow: inset 0 0 0 4px #f4f4f4;
  border-color: #b4b4b4;
  background: #b4b4b4;
}
.radio input[type="radio"] + .radio-label:empty:before {
  margin-right: 0;
}
.fixed .content-wrapper, .fixed .right-side {
    padding-top: 25px !important;
}

.styled-checkbox {
  position: absolute;
  opacity: 0;
}
.styled-checkbox + label {
  position: relative;
  cursor: pointer;
  padding: 0;
}
.styled-checkbox + label:before {
  content: '';
  margin-right: 10px;
  display: inline-block;
  vertical-align: text-top;
  width: 20px;
  height: 20px;
  background: #acddf5;
}
.styled-checkbox:hover + label:before {
  background: #00acff;
}
.styled-checkbox:focus + label:before {
  box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
}
.styled-checkbox:checked + label:before {
  background: #00acff;
}
.styled-checkbox:disabled + label {
  color: #b8b8b8;
  cursor: auto;
}
.styled-checkbox:disabled + label:before {
  box-shadow: none;
  background: #ddd;
}
.styled-checkbox:checked + label:after {
  content: '';
  position: absolute;
  left: 5px;
  top: 9px;
  background: #acddf5;
  width: 2px;
  height: 2px;
  box-shadow: 2px 0 0 #acddf5, 4px 0 0 #acddf5, 4px -2px 0 #acddf5, 4px -4px 0 #acddf5, 4px -6px 0 #acddf5, 4px -8px 0 #acddf5;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}
li{
  list-style:none;
}
.unstyled {
  margin: 0;
  padding: 0;
  list-style-type: none;
}
.radio label {
    min-height: 20px;
    padding-left: 0;
    margin-bottom: 10px;
    font-weight: 400;
    cursor: pointer;
}

</style>