@extends('layouts.default')
@section('content')
<?php $nav_rent = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <section class="content col-md-6">

        <!-- Default box -->
        <div class="box collapsed-box">
          <div class="box-header with-border" style="color:#ffffff; background: #00adef;">
            <h3 class="box-title">Issue of items</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: none;">
            <!-- select item -->
            <div class="row add-padding">
            <div class="form-group  col-md-6">
              <label>Select Client</label>
              <select class="form-control select2" style="width: 100%;">
                <option>Select ID</option>
                <option>922251568V</option>
                <option>562248546V</option>
                <option selected="selected">882251568V</option>
                <option>785562541V</option>
                <option>785596538V</option>
                <option>932254869V</option>
              </select>
              <span class="help-block">W.A.Senarath (ID:882251568V)</span>
            </div>
            <!-- Date -->
            <div class="form-group col-md-6 has-erro">
                <label>Submit Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group has-error col-md-6 min-margin">
              <select class="form-control select2" style="width: 100%;">
                <option>Select Item</option>
                <option>Glinder</option>
                <option>Drill</option>
                <option>Welding Plant</option>
              </select>
            </div>
            <div class="form-group col-md-6 input-group min-margin">
                <input type="text" class="form-control" placeholder="Qty">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Add</button>
                    </span>
              </div>
              <div class="form-group  col-md-4 overviewImage2"><img src="../../dist/img/item-001-sample.png" alt=""></div>

              <br>
              <div class="form-group col-md-12">

            <!-- /.box-header -->
            <div class="form-group col-md-12" style="background: #e8e1e1; padding-top:10px">
              <fieldset>
                <legend class="has-warning"><label>W.A.Senarath (ID:745268452V)</label></legend>
                <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Submit Date</th>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Image</th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td>2019/07/11</td>
                  <td>Glinder</td>
                  <td>1</td>
                  <td class="overviewImage"><img src="../../dist/img/item-001-sample.png" alt=""></td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>2019/07/11</td>
                  <td>Drill</td>
                  <td>1</td>
                  <td class="overviewImage"><img src="../../dist/img/item-001-sample.png" alt=""></td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                  </tr>
              </tbody>
            </table>
              </fieldset>
            </div>
            <!-- /.box-body -->
         
              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #00adef;">
            Issue of items
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <section class="content col-md-6">

        <!-- Default box -->
        <div class="box collapsed-box">
          <div class="box-header with-border" style="color:#fff; background: #222d32;">
            <h3 class="box-title">Register New Client</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: none;">
          <form action="">
            <div class="row add-padding">
            <div class="form-group has-warning col-md-4">
              <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i>National ID No</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="882251568V">
            </div>
            <div class="form-group has-warning col-md-8">
            <label class="control-label" for="inputWarning"> Full Name with Initial</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="W.A.Senarath">
            </div>
            <div class="form-group col-md-6">
                <label>Address</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                  </div>
                  <input type="text" class="form-control" id="inputWarning" placeholder="188/B,Aluthgama,Bogamuwa.">
                </div>
                <!-- /.input group -->
              </div>
            <div class="form-group col-md-6">
                <label>Contact Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group col-md-6 add-padding">
              <label class="custom-file-label" for="exampleInputFile">Add Image of NID (Front)</label>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple="true"
                  onchange="readURL(this);">
              </div>
              <div class="input-group-append">
                <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
              </div>
            </div>
            <div class="form-group col-md-6 add-padding">
              <label class="custom-file-label" for="exampleInputFile">Add Image of NID (Back)</label>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple="true"
                  onchange="readURL(this);">
              </div>
              <div class="input-group-append">
                <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
              </div>
            </div>
            <div class="add-padding">
            <div class="col-md-6"></div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-bot" title="Cancel">
                <i class="fa fa-repeat"></i>
              </button>
            </div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-bot" title="Save">
                <i class="fa fa-save"></i>
              </button>
            </div>
            </div>
          </form>
            <div class="form-group col-md-12" style="background: #e8e1e1; padding-top:10px">
              <fieldset>
                <legend class="has-warning"><label>Last Registerd Client</label></legend>
                <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NID</th>
                  <th>Full Name</th>
                  <th>NID (Front)</th>
                  <th>NID (Back)</th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td>922251568V</td>
                  <td>W.A.Senarath</td>
                  <td class="overviewImage"><img src="../../dist/img/id.jpg" alt=""></td>
                  <td class="overviewImage"><img src="../../dist/img/id.jpg" alt=""></td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                </tr>
              </tbody>
            </table>
              </fieldset>
            </div>
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #222d32;">
            Register New Employee
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <section class="content col-md-12">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #00adef;">
            <h3 class="box-title">Issue of items overview</h3>

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
                  <th>Get Date</th>
                  <th style="background: rgb(255, 138, 138)">Submit Date</th>
                  <th>NID</th>
                  <th>Cient Name</th>
                  <th>Item name</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2019/07/01</td>
                  <td>2019/07/11</td>
                  <td><a href="id" title="Click to view Client Details">922251568V</a></td>
                  <td>W.A.Senarath</td>
                  <td>Glinder</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>2019/07/01</td>
                  <td>2019/07/11</td>
                  <td><a href="id" title="Click to view Client Details">922251568V</a></td>
                  <td>W.A.Senarath</td>
                  <td>Drill</td>
                  <td>1</td>
                </tr>
                <tr style="background: rgb(253, 8, 8); color: #fff;">
                  <td>2019/07/01</td>
                  <td>2019/07/10</td>
                  <td><a style="color: #ffffff" href="id" title="Click to view Client Details">882251568V</a></td>
                  <td>W.A.Senarath</td>
                  <td>Glinder</td>
                  <td>1</td>
                </tr>
              </tbody> 
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #00adef;">
            Issue of items overview
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <!-- /.content -->
    </div>
@stop