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
                <th>Invoice No</th>
                  <th>Date</th>
                  <th>Customer Name</th>
                  <th>Contact Number</th>
                  <th>Handover Status</th>
                  <th>Items</th>
                </tr>
              </thead>
              <tbody>

                @isset($itemIssueObjectArray)
                    @foreach($itemIssueObjectArray as $key => $value)

                        @php
                            $date_today = Carbon\Carbon::now()->startOfDay();
                            $date_create = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->date_create)->startOfDay();
                            $date_receive = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->date_receive)->startOfDay();
                        @endphp
                        
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $date_create->format('Y-m-d') }}</td>
                            <td>
                                @if(isset($value->customer))
                                    {{ $value->customer->first_name . " " . $value->customer->last_name }}
                                @endif
                            </td>
                            <td>
                                @if(isset($value->customer))
                                    {{ $value->customer->phone }}
                                @endif
                            </td>
                            <td>
                                @if( $value->itemIssueDatasSum() == $value->itemReceiveDatasSum() )
                                    <span style="color:green;">Handovered</span>
                                @else
                                    <span style="color:red;">Not Yet</span>
                                @endif
                            </td>
                            <td>
                                @foreach($value->itemIssueDatas as $key_data => $value_data)
                                    <span>{{ $value_data->item->name }}</span>
                                    <span> [{{ number_format($value_data->quantity) }}] </span>
                                    <br/>
                                @endforeach
                            </td>
                        </tr>

                    @endforeach
                @endisset

              </tbody>
            </table>
      </div>
    </div>
  </section>
</div>
</body>
</html>
