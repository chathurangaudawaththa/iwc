@extends('layouts.default')
@section('content')
<?php $nav_home = 'active'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header"></section>
<!-- Main content -->
<section class="content  new-content">
<!-- Small boxes (Stat box) -->
<div class="row">
   <section class="content col-md-6">
      <!-- Default box -->
      <div class="box">
         <div class="box-header with-border" style="color:#ffffff; background: #00adef;">
            <h3 class="box-title">Report Manager</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
               <i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
               <i class="fa fa-times"></i></button>
            </div>
         </div>
         <div class="box-body">
            <div class="row add-padding">
               <div class="form-group  col-md-12">
                  <p>Select the date range for your report generate</p>
                  <form method="GET" action="{!! route('report.create') !!}" enctype="multipart/form-data" target="_blank">
                     @csrf
                     <input type="text" id="demo" name="datefilter" value=""/>
                     <input type="hidden" id="date_start" name="date_start"/>
                     <input type="hidden" id="date_end" name="date_end"/>
                     <p>Select Report type</p>
                     <div class="col-md-12">
                        <div class="radio">
                           <input type="radio" value="supply_employee" name="report_type" id="radio-1">
                           <label for="radio-1" class="radio-label"><strong>Supply to Employee reocrd</strong></label>
                        </div>
                        <br>
                        <div class="radio">
                           <input type="radio" value="supply_customer" name="report_type" id="radio-2">
                           <label for="radio-2" class="radio-label"><strong>Supply to Customer reocrd</strong></label>
                        </div>
                        <br>
                        <div class="radio">
                           <input type="radio" value="cash_book" name="report_type" id="radio-3">
                           <label for="radio-3" class="radio-label"><strong>Cash book Record</strong></label>
                        </div>
                        <br>
                        <div class="radio" title="Go to the Reports section">
                           <input type="radio" value="cash_book" name="report_type" id="radio-4" disabled>
                           <label for="radio-4" class="radio-label"><strong>Item Report</strong></label>
                        </div>
                        <button type="submit" class="btn btn-success pull-right"> Check </button>
                     </div>

                  </form>
               </div>
            </div>
         </div>
         <!-- /.box-body -->
         <div class="box-footer" style="color:#fff; background: #00adef;">
            Report Manager
         </div>
         <!-- /.box-footer-->
      </div>
      <!-- /.box -->
   </section>
   <!-- ./col -->
   <a href="rent" title="Click to visit">
      <div class="col-lg-3 col-xs-6" style="padding: 15px;">
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
      </div>
   </a>
   <!-- ./col -->
   <a href="stock" title="Click to visit">
      <div class="col-lg-3 col-xs-6" style="padding: 15px;">
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