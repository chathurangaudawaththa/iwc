@extends('layouts.default')
@section('content')
<?php $nav_emp = 'active'; ?>
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
              <label>Select Employee</label>
              <select class="form-control select2" style="width: 100%;">
                <option>Select ID</option>
                <option>101</option>
                <option>102</option>
                <option selected="selected">103</option>
                <option>104</option>
                <option>105</option>
                <option>106</option>
              </select>
              <span class="help-block">W.A.Senarath (ID:745268452V)</span>
            </div>
            <div class="form-group col-md-6 has-error add-padding">
              <span class="help-block" style="margin-top: 24px;">*Can be issue of items only current date (2019/07/06)</span>
            </div>
            </div>
            <div class="form-group has-error col-md-6 min-margin">
            <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i>Select Item</label>
              <select class="form-control select2" style="width: 100%;">
                <option>Select Item</option>
                <option>Glinder</option>
                <option>Drill</option>
                <option>Welding Plant</option>
              </select>
            </div>
            <div class="form-group col-md-6 min-margin">
            <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i>Item Count</label>
                <input type="number" class="form-control" placeholder="Item Count">
              </div>
              <div class="form-group has-error add-padding">
              <span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span>
              </div>
              <div class="form-group  col-md-4 overviewImage2"><img src="../../dist/img/item-001-sample.png" alt=""></div>

            <div class="form-group col-md-12">
            <div class="form-group input-group min-margin">
                <input type="text" class="form-control" placeholder="Reoson">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Add</button>
                    </span>
              </div>
              <span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span>

              </div>
              <div class="form-group col-md-12">

            <!-- /.box-header -->
            <div class="form-group col-md-12" style="background: #e8e1e1; padding-top:10px">
              <fieldset>
                <legend class="has-warning"><label>W.A.Senarath (ID:745268452V)</label></legend>
                <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Reason</th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td>2019/07/11</td>
                  <td>Glinder</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>2019/07/11</td>
                  <td>Drill</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
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
            <h3 class="box-title">Register New Employee</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: none;">
          <form action="">
            <div class="col-md-12 row">
            <div class="form-group has-warning col-md-4">
              <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i>Emp ID</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Emp ID">
            </div>
            <div class="form-group has-warning col-md-8">
            <label class="control-label" for="inputWarning"> Full Name with Initial</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Emp Name">
              <span class="help-block">Example : W.A.Senarath</span>

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
                <legend class="has-warning"><label>Registerd Employees</label></legend>
                <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Emp ID</th>
                  <th>Full Name</th>
                  <th>NID (Front)</th>
                  <th>NID (Back)</th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td>101</td>
                  <td>W.A.Senarath</td>
                  <td class="overviewImage"><img src="../../dist/img/id.jpg" alt=""></td>
                  <td class="overviewImage"><img src="../../dist/img/id.jpg" alt=""></td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>102</td>
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
                  <th>Date</th>
                  <th>Emp ID</th>
                  <th>Emp Name</th>
                  <th>Item name</th>
                  <th>Quantity</th>
                  <th>Reason</th>
                  <th class="th-sm" style="text-align:center"></th>
                  <th class="th-sm" style="text-align:center"></th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2019/07/11</td>
                  <td>101</td>
                  <td>W.A.Senarath</td>
                  <td>Glinder</td>
                  <td>1</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>2019/06/11</td>
                    <td>102</td>
                    <td>A.P.Amarasekara</td>
                    <td>Anchor Bolt Drop In Anchor</td>
                    <td>20</td>
                    <td>Bacon ipsum dolor sit amet	</td>
                    <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                  </tr>
                  <tr>
                  <td>2019/07/11</td>
                  <td>101</td>
                  <td>W.A.Senarath</td>
                  <td>Double End Stud</td>
                  <td>10</td>
                  <td>Bacon ipsum dolor sit amet</td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
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