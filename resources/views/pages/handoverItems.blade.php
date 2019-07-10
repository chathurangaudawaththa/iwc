@extends('layouts.default')
@section('content')
<?php $nav_handover = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Handover Items
        <small><b> | Iron Wood Craft </b>| Rental Service</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Rental Service</a></li>
          <li class="active">Handover</li>
        </ol>
      </section>
      <!-- stock overview -->
      <section class="content col-md-12">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #00adef;">
            <h3 class="box-title">Clients</h3>

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
                  <th>Date</th>
                  <th>Invoice No</th>
                  <th>NID</th>
                  <th>Cient Name</th>
                  <th>Item name</th>
                  <th>Quantity</th>
                  <th>Note</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2019/07/01</td>
                  <td>2019/07/11</td>
                  <td>922251568V</td>
                  <td>W.A.Senarath</td>
                  <td>Drill</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td class="article-btn delete" style="text-align:center"><a href="/id" title="Delete item"><i style="color: #19ab09" class="fa fa-share-square-o"
                      aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>2019/07/01</td>
                  <td>2019/07/10</td>
                  <td>882251568V</td>
                  <td>W.A.Sarath</td>
                  <td>Glinder</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td class="article-btn delete" style="text-align:center"><a href="/id" title="Delete item"><i style="color: #19ab09" class="fa fa-share-square-o"
                      aria-hidden="true"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #00adef;">
                Clients
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <!-- /.content -->
    </div>
@stop