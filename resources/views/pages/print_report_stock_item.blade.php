<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <section class="invoice">
    <div class="row">
    <div class="col-xs-12">
          <h2 class="page-header">
            <img src="dist/img/user2-160x160.jpg" style="max-width: 45px;"> IWC Equipment Rentel Service.
            <small class="pull-right">Billing Date: 
                @isset( $date_today )
                    {{ $date_today->format('Y-m-d') }}
                @endisset
            </small>
          </h2>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From : {!! $date_start !!}
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To : {!! $date_end !!}
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
      </div>
    <div class="row">
      <div class="col-xs-12 table-responsive">
      <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Available Qty</th>
                    <th>Rental Item's Price</th>
                    <th>Item Location</th>
                </tr>
              </thead>
              <tbody>
              
                    <tr>
                        <td>itm-001</td>
                        <td>Glinder</td>
                        <td>12</td>
                        <td>350.00</td>
                        <td>R1 : D1</td>
                    </tr>

              </tbody>
            </table>
      </div>
    </div>
  </section>
</div>
</body>
</html>
