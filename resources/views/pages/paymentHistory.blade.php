@extends('layouts.default')
@section('content')
<?php $nav_payment = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>
      <!-- stock overview -->
      <section class="content col-md-12">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #00adef;">
            <h3 class="box-title">Payment History</h3>
 
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                <th>Invoice No</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Delevery Charges</th>
                  <th>Damage Charges</th>
                  <th>Discount</th>
                  <th>Total</th>

                </tr>
              </thead>
              <tbody>
               @isset($itemReceiveObjectArray)
                  @foreach($itemReceiveObjectArray as $key => $value)

                    @php
                        $date_today = Carbon\Carbon::now()->startOfDay();
                        $date_create = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->date_create)->startOfDay();
                    @endphp

                    <tr>
                        <!-- {!! 'style="background: rgb(253, 8, 8); color: #fff;"' !!} -->
                        <td>#{{ $value->id }}</td>
                        <td>{{ $date_create->format('Y-m-d') }}</td>
                        <td>{{ number_format($value->amount) }}</td>
                        <td>{{ number_format($value->delivery_charge) }}</td>
                        <td>{{ number_format($value->damage_charge) }}</td>
                        <td>{{ number_format($value->discount) }}</td>
                        <td>{{ number_format( (($value->amount + $value->delivery_charge + $value->damage_charge) - $value->discount) ) }}</td>
                    </tr>

                  @endforeach
                @endisset
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #00adef;">
                Payment History
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <!-- /.content -->
    </div>
@stop