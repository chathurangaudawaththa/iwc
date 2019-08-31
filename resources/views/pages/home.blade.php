@extends('layouts.default')
@section('content')
<?php $nav_home = 'active'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content  new-content">
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
<section class="col-md-12" style="min-height: 370px;">

<!-- Include Date Range Picker -->
<p>Select the date range for your report generate</p>
<input type="text" id="demo" name="datefilter" value="" />
<p>Select Report type</p>
<div class="select-wrapper">
      <select class="select">
        <option value="value1">Rent stock</option>
        <option value="value1">supply to employee</option>
        <option value="value2">Cash book</option>
        <option value="value3">other</option>
      </select>
    </div>
</section>
</div>
<!-- /.content-wrapper -->

@stop
