@extends('layouts.default')
@section('content')
<?php $nav_handoveremp = 'active'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
          <li>
              <i class="fa fa-fw fa-stack-overflow bg-purple"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Supplied Items</a></h3>

                <div class="timeline-body">
                <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Get Date</th>
                  <th>Item name</th>
                  <th>Reason</th>
                  <th>Obtained Quantity</th>
                  <th>Quantity of delivery</th>
                  <th>Select Submited Items</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2019/07/01</td>
                  <td>Glinder</td>
                  <td>Reason</td>
                  <td>2</td>
                  <td><input type="number" class="form-control" id="inputWarning" placeholder="Qty" value="2"></td>
                  <td>
                    <label style="display: table;margin: 0 auto;">
                      <input type="checkbox" class="flat-red">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>2019/07/01</td>
                  <td>drill</td>
                  <td>Reason</td>
                  <td>1</td>
                  <td><input type="number" class="form-control" id="inputWarning" placeholder="Qty" value="1"></td>
                  <td>
                    <label style="display: table;margin: 0 auto;">
                      <input type="checkbox" class="flat-red">
                    </label>
                  </td>
                </tr>
              </tbody>
            </table>
            <table>
            <tr> 
                  <td>
                    <a href="/handoveremp" class="btn btn-app btn-app-marg-top" title="Save">
                        <i class="fa fa-save"></i>
                    </a></td>
                </tr>
            </table>
                </div>
              </div>
            </li>
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a href="#">Personal Details</a></h3>
              <div class="timeline-body profile-text">
                      <span>Emp ID : 101</span>
                      <br>
                      <span>Name : W.A.Senarath</span>
                      <br>
                      <span>NID : 882251568V</span>
                      <br>

                      <br>                </div>
              </div>
            </li>
            <li>
              <i class="fa fa-camera bg-red"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">National ID </a></h3>

                <div class="timeline-body">
                  <img style="width: 200px;" src="../../dist/img/id.jpg" alt="Front view of NID" class="margin">
                  <img style="width: 200px;" src="../../dist/img/id.jpg" alt="Back view of NID" class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
            <!-- END timeline item -->
            <!-- END timeline item -->
            <li>
            <i class="fa fa-fw fa-sort-up"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  @stop