@extends('layouts.default')
@section('content')
<?php $nav_rent = 'active'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>Client Details
        <small><b> | Iron Wood Craft </b>| Stock Management System</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Rental to Customer</a></li>
        <li class="active">Client View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a href="#">Personal Details</a></h3>
              <div class="timeline-body profile-text">
                      <span>Name : W.A.Senarath</span>
                      <br>
                      <span>NID : 882251568V</span>
                      <br>
                      <span>Address : 188/B, Aluthgama, Bogamuwa.</span>
                      <br>
                      <span>Contact Number : (071) 406 7638</span>
                </div>
              </div>
            </li>
            <li>
              <i class="fa fa-camera bg-red"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">National ID </a></h3>

                <div class="timeline-body">
                  <img src="../../dist/img/item-001-sample.png" alt="Front view of NID" class="margin">
                  <img src="../../dist/img/item-001-sample.png" alt="Back view of NID" class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-fw fa-stack-overflow bg-purple"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Rented Items</a></h3>

                <div class="timeline-body">
                <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Get Date</th>
                  <th style="background: rgb(255, 138, 138)">Submit Date</th>
                  <th>Item name</th>
                  <th>Quantity</th>
                  <th>Note</th>
                  <th>Select Submited Items</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2019/07/01</td>
                  <td>2019/07/11</td>
                  <td>Glinder</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td>
                    <label style="display: table;margin: 0 auto;">
                      <input type="checkbox" class="flat-red">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>2019/07/01</td>
                  <td>2019/07/11</td>
                  <td>Drill</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td>
                    <label style="display: table;margin: 0 auto;">
                      <input type="checkbox" class="flat-red">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>2019/07/01</td>
                  <td>2019/07/10</td>
                  <td>Glinder</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td>
                    <label style="display: table;margin: 0 auto;">
                      <input type="checkbox" class="flat-red">
                    </label>
                  </td>
                </tr>
                <tr style="background: rgb(31, 144, 4); color: #fff;">
                  <td>2019/07/01</td>
                  <td>2019/07/10</td>
                  <td>Glinder</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                      <td class="article-btn delete" style="text-align:center"><a href="#" title="Handovered"><i style="color: #ffffff" class="fa fa-check"
                        aria-hidden="true"></i></a></td>
                </tr>
              </tbody>
            </table>
            <table>
            <tr>
                  <td>
                    <a href="/invoice" class="btn btn-app btn-app-marg-top" title="Save">
                        <i class="fa fa-save"></i>
                    </a></td>
                </tr>
            </table>
                </div>
              </div>
            </li>
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