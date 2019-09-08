@extends('layouts.default')
@section('content')
<?php $rep = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
<section class="content col-md-12">

      
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
                        <button type="submit" class="btn btn-success pull-right"> Check </button>

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
      <!-- --- -->
      <section class="content col-md-6 add-padding">

        <!-- Default box -->
        <div class="box"><!-- collapsed-box -->
          <div class="box-header with-border" style="color:#fff; background: #222d32;">
            <h3 class="box-title">Item Record Manager</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body"><!-- style="display: none;" -->
          <div class="col-md-12 add-padding">
              <p>Prepare the report by Selected types</p>
              <li>
                <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value4">
                <label for="styled-checkbox-1">Filtering by Add date</label>
              </li>
              <li>
                <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value4">
                <label for="styled-checkbox-2">Filtering by Available quantity</label>
              </li>
              <li>
                <input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value4">
                <label for="styled-checkbox-3">Filtering by Price</label>
              </li>
              <button type="submit" class="btn btn-success pull-right"> Check </button>
            </div>
            
          </div>

          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #222d32;">
            Item Record Manager
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
</section>
      <section class="content col-md-12">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #00adef;">
            <h3 class="box-title">Report Manager</h3>

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
                    <th>Issue ID</th>
                    <th>Emp ID</th>
                    <th>Emp Name</th>
                    <th>Items</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @isset($itemIssueObjectArray)
                  @foreach($itemIssueObjectArray as $key => $value)
                  
                    @php
                        $date_today = Carbon\Carbon::now()->startOfDay();
                        $date_create = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->date_create)->startOfDay();
                        $date_receive = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->date_receive)->startOfDay();
                    @endphp
                  
                    @if($value->itemIssueDatasSum() > $value->itemReceiveDatasSum())
                    <tr
                        @if( $date_today->greaterThanOrEqualTo( $date_receive ) )
                            {{ null }}
                        @endif >
                        <!-- {!! 'style="background: rgb(253, 8, 8); color: #fff;"' !!} -->
                        <td>{{ $date_create->format('Y-m-d') }}</td>
                        <td>
                            {{ $value->id }}
                        </td>
                        <td>
                            @if(isset($value->customer))
                                {{ $value->customer->code }}
                            @endif
                        </td>
                        <td>
                            @if(isset($value->customer))
                                {{ $value->customer->first_name }}
                            @endif
                        </td>
                        <td>
                            @if(isset($value->user))
                                {{ $value->user->first_name }}
                            @endif
                        </td>
                        <td class="article-btn delete" style="text-align:center">
                              <a href="{!! route('employee.create', ['itemIssue' => $value->id]) !!}" title="Edit item">
                                  <i style="color: #ffc400" class="fa fa-pencil-square" aria-hidden="true"></i>
                              </a>
                          </td>
                          <td class="article-btn delete" style="text-align:center">
                              <a href="{!! route('itemIssue.destroy', ['itemIssue' => $value->id]) !!}" title="Delete item" onclick="return confirm('Are you sure?');">
                                  <i style="color: #c50404" class="fa fa-window-close" aria-hidden="true"></i>
                              </a>
                          </td>
                    </tr>
                    @endif
                  @endforeach
                @endisset
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #00adef;">
            Report Mangers
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <!-- /.content -->
    </div>
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
@stop