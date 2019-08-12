@extends('layouts.default')
@section('content')
<?php $nav_handoveremp = 'active'; ?>
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
            <h3 class="box-title">Employee</h3>

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
                  <th>Emp ID</th>
                  <th>Employee Name</th>
                  <th>Bill</th>
                  <th></th>
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
                    <tr
                        @if( $date_today->greaterThanOrEqualTo( $date_receive ) )
                            {{ null }}
                        @endif
                    >
                        <!-- {!! 'style="background: rgb(253, 8, 8); color: #fff;"' !!} -->
                        <td>{{ $date_create->format('Y-m-d') }}</td>
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
                            {{ $value->id }}
                        </td>
                        <td>
                            @if(isset($value->user))
                                {{ $value->user->first_name }}
                            @endif
                        </td>
                        <td class="article-btn delete" style="text-align:center">
                            <a href="{!! route('itemReceiveEmployee.create', [$value->id]) !!}" title="View Items">
                                <i style="color: #19ab09" class="fa fa-share-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                  
                  @endforeach
                @endisset
                
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