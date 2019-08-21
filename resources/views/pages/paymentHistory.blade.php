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
                <tr>
                  <td><a href="/invoice">#007612</a></td>
                  <td>2019/07/11</td>
                  <td>5000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>

                </tr>
                <tr>
                <td><a href="/invoice">#007611</a></td>
                  <td>2019/07/11</td>
                  <td>4000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>

                </tr>
                <tr>
                <td><a href="/invoice">#007610</a></td>
                  <td>2019/07/10</td>
                  <td>3000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>
                  <td>5000.00</td>

                </tr>
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