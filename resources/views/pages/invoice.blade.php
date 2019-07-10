@extends('layouts.default')
@section('content')
<?php $nav_rent = 'active'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#007612</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <img src="dist/img/user2-160x160.jpg" style="max-width: 45px;"> IWC Equipment Rentel Service.
            <small class="pull-right">Billing Date: 10/07/2019</small>
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
          <address>
            <strong>W.A.Senarath</strong><br>
            795 Walpitamulla, Dewalapola.
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>National ID:</b> 882251568V<br>
          <b>Order Date:</b> 01/07/2019<br>
          <b>Payment Method:</b> Cash
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
            <tr>
              <td>Drill</td>
              <td>1</td>
              <td>5</td>
              <td>300</td>
              <td>1500.00</td>
            </tr>
            <tr>
              <td>Glinder</td>
              <td>2</td>
              <td>5</td>
              <td>300</td>
              <td>3000.00</td>
            </tr>
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
          <p class="lead">Amount Due 10/7/2019</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td style="text-align:right">4500.00</td>
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