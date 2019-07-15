@extends('layouts.default')
@section('content')
<?php $nav_home = 'active'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <a href="rent" title="Click tio visit">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner"> 
              <h3>150</h3>

              <p>Equipment Rental<br>To Customer</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div></a>
        <!-- ./col -->
        <a href="emp" title="Click to visit">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>

              <p>Equipment Supply<br>To Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-gear-b"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div>
        </a>
        <!-- ./col -->
<a href="rent" title="Click to visit">
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Handover date<br>is over</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-calendar"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div></a>
        <!-- ./col -->
<a href="stock" title="Click to visit">
<div class="col-lg-3 col-xs-6"> 
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>The stocks<br>are low</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
            <div href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div>
</a>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      <section class="col-lg-7 connectedSortable">

<!-- Chat box -->

<!-- /.box (chat box) -->

<!-- TO DO List -->
<div class="box box-primary">
  <div class="box-header">
    <i class="ion ion-clipboard"></i>

    <h3 class="box-title">The stocks
are low</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
    <ul class="todo-list">
      <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
        <span class="text">Wood screws</span>
        <small class="label label-danger" style="font-size: 13px;"></i>92 Piece(s)</small>
      </li>
      <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
        <span class="text">Bolt</span>
        <small class="label label-danger" style="font-size: 13px;"></i>80 Piece(s)</small>
      </li>
    </ul>
  </div>
</div>
</section>
<!-- /.Left col -->
        <section class="col-lg-5 connectedSortable">
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop
