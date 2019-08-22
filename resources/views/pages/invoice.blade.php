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
                <input type="text" class="form-control" placeholder="Deivery Charges" id="input_id_delivery">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-warning btn-flat" id="input_id_btn_delivery">Add</button>
                    </span>
              </div>
              <div class="form-group input-group min-margin">
                <input type="text" class="form-control" placeholder="Item Damage Charges" id="input_id_damage">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-danger btn-flat" id="input_id_btn_damage">Add</button>
                    </span>
              </div>
              <div class="form-group input-group min-margin">
                <input type="text" class="form-control" placeholder="Discount" id="input_id_discount">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="input_id_btn_discount">Add</button>
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
                  <td style="text-align:right"><span id="val_id_subtotal">{!! number_format( $temp_total_sum ) !!}</span></td>
              </tr>
              <tr>
                <th>Deivery Charges</th>
                  <td style="text-align:right"><span id="val_id_delivery">00.00</span></td>
              </tr>
              <tr>
                <th>Item Damage Charges:</th>
                  <td style="text-align:right;color:red"><span id="val_id_damage">00.00</span></td>
              </tr>
              <tr>
                <th>Net Total:</th>
                  <td style="text-align:right"><b><span id="val_id_net">{!! number_format( $temp_total_sum ) !!}</span></b></td>
              </tr>
              <tr>
                <th>Discount:</th>
                  <td style="text-align:right;">(<span id="val_id_discount">00.00</span>)</td>
              </tr>
              <tr>
                <th>Total:</th>
                  <td style="text-align:right"><b><u><span id="val_id_total">{!! number_format( $temp_total_sum ) !!}</span></u></b></td>
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
          <form method="POST" action="{!! route('itemReceiveCustomer.store', [$itemIssueObject->id]) !!}" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" id="transaction_type_id" name="transaction_type_id" value="7"/>
              
            @isset( $itemReceiveDataArray )
                @foreach($itemReceiveDataArray as $key => $value)

                <!-- -->
                <input 
                    type="hidden" 
                    class="form-control" 
                    id="quantity" 
                    name="quantity_{!! $value['item_issue_data_object']->id !!}"
                    placeholder="Qty" 
                    value="{!! $value['item_issue_data_quantity'] !!}"
                />

                <input 
                    type="hidden" 
                    class="form-control"
                    id="item_id" 
                    name="item_issue_data_id[]" 
                    value="{!! $value['item_issue_data_object']->id !!}"
                />
                <!-- -->

                @endforeach
            @endisset 
              
            <!-- -->
            <input 
                type="hidden" 
                class="form-control"
                id="amount" 
                name="amount" 
                value="{!! $temp_total_sum !!}"
            />
            <input 
                type="hidden" 
                class="form-control"
                id="delivery_charge" 
                name="delivery_charge" 
                value="0.0"
            />
            <input 
                type="hidden" 
                class="form-control"
                id="damage_charge" 
                name="damage_charge" 
                value="0.0"
            />
            <input 
                type="hidden" 
                class="form-control"
                id="discount" 
                name="discount" 
                value="0.0"
            />
            <!-- -->
              
            <!-- a href="/print" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a -->
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>
              
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
    
<script>
    function cal_total_val(){
        var val_id_subtotal = $("#val_id_subtotal");
        var val_id_delivery = $("#val_id_delivery");
        var val_id_damage = $("#val_id_damage");
        var val_id_net = $("#val_id_net");
        var val_id_discount = $("#val_id_discount");
        var val_id_total = $("#val_id_total");
        
        var amount = $("#amount");
        var delivery_charge = $("#delivery_charge");
        var damage_charge = $("#damage_charge");
        var discount = $("#discount");
        
        var amount_val = amount.val();
        var delivery_charge_val = delivery_charge.val();
        var damage_charge_val = damage_charge.val();
        var discount_val = discount.val();
        
        amount_val = Number( {!! $temp_total_sum !!} );
        delivery_charge_val = Number( delivery_charge_val );
        damage_charge_val = Number( damage_charge_val );
        discount_val = Number( discount_val );
        
        var temp_sum_net = ( amount_val + delivery_charge_val + damage_charge_val );
        var temp_sum_total = ( temp_sum_net - discount_val );
        temp_sum_net = (temp_sum_net) ? temp_sum_net : 0.0;
        temp_sum_total = (temp_sum_total) ? temp_sum_total : 0.0;
        val_id_net.text( temp_sum_net );
        val_id_total.text( temp_sum_total );
    }
    $(function(){
        "use strict";
        
        cal_total_val();
        
        $("#input_id_btn_delivery").on("click", function(){
            var input_id_delivery = $("#input_id_delivery");
            var val_id_delivery = $("#val_id_delivery");
            var delivery_charge = $("#delivery_charge");
            var input_id_delivery_val = input_id_delivery.val();
            input_id_delivery_val = Number( input_id_delivery_val );
            input_id_delivery_val = (input_id_delivery_val) ? input_id_delivery_val : 0.0;
            val_id_delivery.text( input_id_delivery_val );
            delivery_charge.val( input_id_delivery_val );
            input_id_delivery.val( null );
            cal_total_val();
        });
        
        $("#input_id_btn_damage").on("click", function(){
            var input_id_damage = $("#input_id_damage");
            var val_id_damage = $("#val_id_damage");
            var damage_charge = $("#damage_charge");
            var input_id_damage_val = input_id_damage.val();
            input_id_damage_val = Number( input_id_damage_val );
            input_id_damage_val = (input_id_damage_val) ? input_id_damage_val : 0.0;
            val_id_damage.text( input_id_damage_val );
            damage_charge.val( input_id_damage_val );
            input_id_damage.val( null );
            cal_total_val();
        });
        
        $("#input_id_btn_discount").on("click", function(){
            var input_id_discount = $("#input_id_discount");
            var val_id_discount = $("#val_id_discount");
            var discount = $("#discount");
            var input_id_discount_val = input_id_discount.val();
            input_id_discount_val = Number( input_id_discount_val );
            input_id_discount_val = (input_id_discount_val) ? input_id_discount_val : 0.0;
            val_id_discount.text( input_id_discount_val );
            discount.val( input_id_discount_val );
            input_id_discount.val( null );
            cal_total_val();
        });
        
    });
</script>
  @stop