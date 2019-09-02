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
              <!-- h3>0</h3 -->
              <h3> <span style="min-height: 1em;display: inline-block;"></span> </h3>

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
              <!-- h3>0</h3 -->
              <h3> <span style="min-height: 1em;display: inline-block;"></span> </h3>

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
              @if(isset($dataArray["date_receive_count"]))
                <h3>{!! number_format($dataArray["date_receive_count"]) !!}</h3>
              @else
                <h3> 0 </h3>
              @endisset
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
              @if(isset($dataArray["quantity_low_count"]))
                <h3>{!! number_format($dataArray["quantity_low_count"]) !!}</h3>
              @else
                <h3> 0 </h3>
              @endisset
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
<form method="GET" action="{!! route('report.create') !!}" enctype="multipart/form-data" target="_blank">
    @csrf
    <input type="text" id="demo" name="datefilter" value=""/>
    <input type="hidden" id="date_start" name="date_start"/>
    <input type="hidden" id="date_end" name="date_end"/>
    <p>Select Report type</p>
    <div class="select-wrapper">
        <select class="select" name="report_type" required>
            <option value="select"> select </option>
            <option value="supply_employee">supply to employee</option>
            <option value="supply_customer">rent to customer</option>
            <option value="cash_book">cash book</option>
            <option value="stock_item">item</option>
        </select>
    </div>

    <div class="btn-group" style="margin-top: 1em;">
        <button type="submit" class="btn btn-success"> Check </button>
    </div>
    
</form>
</section>
</div>
<!-- /.content-wrapper -->

<!-- ------------------------------------------ -->
<script type="text/javascript">
$(function() {

    var date_start = moment().subtract(1, 'month');
    var date_end = moment().startOf('hour');
    var format_1 = "YYYY-MM-DD";

    function cb(start, end, label) {
        var date_start = $("#date_start");
        var date_end = $("#date_end");
        date_start.val( start.format(format_1) );
        date_end.val( end.format(format_1) );
        //$('#div_id span').html(start.format(format_1) + ' - ' + end.format(format_1));
        console.log("A new date selection was made: " + start.format(format_1) + ' to ' + end.format(format_1));
    }

    var datefilter = $('input[name="datefilter"]').daterangepicker({
        startDate: date_start,
        endDate: date_end,
        opens: 'right',
        timePicker: false,
        locale: {
            format: 'YYYY-MM-DD'
        },
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    
    datefilter.on('cancel.daterangepicker', function(ev, picker) {
        //do something, like clearing an input
        datefilter.val('');
    });
    
    cb(date_start, date_end, null);

});
</script>
<!-- script>
$('#demo').daterangepicker({
    "showISOWeekNumbers": true,
    "timePicker": false,
    "autoUpdateInput": true,
    "locale": {
        "cancelLabel": 'Clear',
        "format": "YYYY MMMM, DD",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Su",
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa"
        ],
        "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
        "firstDay": 1
    },
    "linkedCalendars": true,
    "showCustomRangeLabel": false,
    "startDate": 1,
    "endDate": "2019 August, 30",
    "opens": "right"
});
</script -->
<!-- ------------------------------------------ -->
@stop
