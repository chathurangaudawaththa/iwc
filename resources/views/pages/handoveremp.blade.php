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
                  <th>Supplied Items</th>
                  <th></th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  <td>2019/07/01</td>
                  <td>101</td>
                  <td>W.A.Senarath</td>
                  <td>4</td>
                  <td class="article-btn delete" style="text-align:center"><a href="/eid" title="View Items"><i style="color: #19ab09" class="fa fa-share-square-o"
                      aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>2019/07/01</td>
                  <td>102</td>
                  <td>W.A.Bandara</td>
                  <td>2</td>
                  <td class="article-btn delete" style="text-align:center"><a href="/eid" title="View Items"><i style="color: #19ab09" class="fa fa-share-square-o"
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