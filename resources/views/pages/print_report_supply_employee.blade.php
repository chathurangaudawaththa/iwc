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
          From
          <address> 
            <strong>IWC Rental Service.</strong><br>
            188/B, Aluthgama,<br>
            Bogamuwa.<br>
            Phone: (070) 388-8400<br>
            Email: info@ironwoodcraft.lk<br>
            Web: www.ironwoodcraft.lk
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
            @isset($itemReceiveObject)
                @php
                    $itemIssueObject = $itemReceiveObject->itemIssue;
                @endphp
                @isset($itemIssueObject->customer)
                    <address>
                        <strong>{{ $itemIssueObject->customer->first_name }}</strong>
                        <br/>
                        {{ $itemIssueObject->customer->address }}
                    </address>
                @endisset
            @endisset
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            @isset($itemReceiveObject)
                @php
                    $itemIssueObject = $itemReceiveObject->itemIssue;
                @endphp
                <b>Invoice #{{ $itemReceiveObject->id }}</b>
                <br/>
                @isset($itemIssueObject->customer)
                    <br/>
                    <b>National ID:</b> {{ $itemIssueObject->customer->nic }}<br/>
                @endisset
                <b>Order Date:</b> 
                @isset( $itemIssueObject )
                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemIssueObject->date_create)->format('Y-m-d') }}
                @endisset
                <br/>
                <b>Payment Method:</b> Cash
            @endisset
        </div>
        <!-- /.col -->
      </div>
    <div class="row">
      <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
            <thead>
            <tr>
              <th>Item</th>
              <th>Qty</th>
              <th>Dates</th>
              <th>Price per Date</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
                
                @php
                    $temp_total_sum = 0;
                @endphp
                
                @isset( $itemReceiveDataArray )
                    @foreach($itemReceiveDataArray as $key => $value)

                        <tr>
                            <td>{{ $value['item_receive_data_object']->item->name }}</td>
                            <td>{!! $value['item_receive_data_object']->quantity !!}</td>
                            @php
                                $tempItemReceiveObject = $value['item_receive_data_object']->itemReceive;
                                $tempItemIssueObject = $tempItemReceiveObject->itemIssue;
                                $date_create_receive = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tempItemReceiveObject->date_create);
                                $date_create_issue = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tempItemIssueObject->date_create);
                                $diff_in_days = $date_create_receive->diffInDays($date_create_issue, false);
                                if( $diff_in_days <= 0 ){
                                    $diff_in_days = 1;
                                }
                                $temp_total = ( $value['item_receive_data_object']->unit_price * $diff_in_days );
                                $temp_total = ( $temp_total * $value['item_receive_data_object']->quantity );
                                $temp_total_sum = $temp_total_sum + $temp_total;
                            @endphp
                            <td>{!! $diff_in_days !!}</td>
                            <td>{!! $value['item_receive_data_object']->unit_price !!}</td>
                            <td>{!! number_format( $temp_total ) !!}</td>
                        </tr>

                    @endforeach
                @endisset
                            
            </tbody>
          </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6">
      </div>
      <div class="col-xs-6">
          <p class="lead">Amount Due 
            @isset( $date_today )
                {{ $date_today->format('Y-m-d') }}
            @endisset
          </p>

          <div class="table-responsive">
            @isset($itemReceiveObject)
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td style="text-align:right"><span id="val_id_subtotal">{!! number_format( $itemReceiveObject->amount ) !!}</span></td>
                    </tr>
                    <tr>
                        <th>Deivery Charges</th>
                        <td style="text-align:right"><span id="val_id_delivery">{!! number_format( $itemReceiveObject->delivery_charge ) !!}</span></td>
                    </tr>
                    <tr>
                        <th>Item Damage Charges:</th>
                        <td style="text-align:right;color:red"><span id="val_id_damage">{!! number_format( $itemReceiveObject->damage_charge ) !!}</span></td>
                    </tr>
                    <tr>
                        <th>Net Total:</th>
                        <td style="text-align:right"><b><span id="val_id_net">{!! number_format( $itemReceiveObject->amount + $itemReceiveObject->delivery_charge + $itemReceiveObject->damage_charge ) !!}</span></b></td>
                    </tr>
                    <tr>
                        <th>Discount:</th>
                        <td style="text-align:right;">(<span id="val_id_discount">{!! number_format( $itemReceiveObject->discount ) !!}</span>)</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td style="text-align:right"><b><u><span id="val_id_total">{!! number_format( ( ( $itemReceiveObject->amount + $itemReceiveObject->delivery_charge + $itemReceiveObject->damage_charge ) - $itemReceiveObject->discount ) ) !!}</span></u></b></td>
                    </tr>
                </table>
            @endisset
          </div>
        </div>
    </div>
  </section>
</div>
</body>
</html>
