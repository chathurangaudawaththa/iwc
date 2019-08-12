@extends('layouts.default')
@section('content')
<?php $nav_rent = 'active'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
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
        <!-- /.col --> 
      </div>
      <!-- info row -->
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
            @isset($itemIssueObject)
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
            @isset($itemIssueObject)
                <b>Invoice #{{ $itemIssueObject->id }}</b>
                <br/>
                <br/>
                @isset($itemIssueObject->customer)
                    <b>National ID:</b> {{ $itemIssueObject->customer->nic }}<br>
                    <b>Order Date:</b> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemIssueObject->date_create)->format('Y-m-d') }}<br>
                    <b>Payment Method:</b> Cash
                @endisset
            @endisset
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-hover">
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
                            <td>{{ $value['item_issue_data_object']->item->name }}</td>
                            <td>{!! $value['item_issue_data_quantity'] !!}</td>
                            @php
                                $date_create = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemIssueObject->date_create);
                                $diff_in_days = $date_today->diffInDays($date_create, false);
                                if( $diff_in_days <= 0 ){
                                    $diff_in_days = 1;
                                }
                                $temp_total = ( $value['item_issue_data_object']->unit_price * $diff_in_days );
                                $temp_total = ( $temp_total * $value['item_issue_data_quantity'] );
                                $temp_total_sum = $temp_total_sum + $temp_total;
                            @endphp
                            <td>{!! $diff_in_days !!}</td>
                            <td>{!! $value['item_issue_data_object']->unit_price !!}</td>
                            <td>{!! number_format( $temp_total ) !!}</td>
                        </tr>

                    @endforeach
                @endisset  
                
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-4">
          <p class="lead">Additional Charges</p>

          <div class="table-responsive">
            <div class="form-group input-group min-margin">
                <input type="text" class="form-control" placeholder="Deivery Charges">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-warning btn-flat">Add</button>
                    </span>
              </div>
              <div class="form-group input-group min-margin">
                <input type="text" class="form-control" placeholder="Item Damage Charges">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-danger btn-flat">Add</button>
                    </span>
              </div>
              <div class="form-group input-group min-margin">
                <input type="text" class="form-control" placeholder="Discount">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Add</button>
                    </span>
              </div>
          </div>
        </div>
        <div class="col-xs-2"></div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 
            @isset( $date_today )
                {{ $date_today->format('Y-m-d') }}
            @endisset
          </p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td style="text-align:right">{!! number_format( $temp_total_sum ) !!}</td>
              </tr>
              <tr>
                <th>Deivery Charges</th>
                <td style="text-align:right">00.00</td>
              </tr>
              <tr>
                <th>Item Damage Charges:</th>
                <td style="text-align:right;color:red">1000.00</td>
              </tr>
              <tr>
                <th>Net Total:</th>
                <td style="text-align:right"><b>5500.00</b></td>
              </tr>
              <tr>
                <th>Discount:</th>
                <td style="text-align:right;">(500.00)</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td style="text-align:right"><b><u>5000.00</u></b></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="/print" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  @stop