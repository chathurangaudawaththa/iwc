@extends('layouts.default')
@section('content')
<?php $nav_stock = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Stock Control Unit
        <small><b> | Iron Wood Craft </b>| Stock Management System</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Stock Control Unit</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content col-md-6">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #00adef;">
            <h3 class="box-title">Update Stock</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <!-- select item -->
            <div class="form-group  col-md-12">
              <label>Select Item</label>
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Item</option>
                <option>Item</option>
                <option>Item</option>
                <option>Item</option>
                <option>Item</option>
                <option>Item</option>
                <option>Item</option>
              </select>
            </div>
            <div class="form-group has-warning  col-md-6">
              <input type="number" class="form-control" id="inputWarning" placeholder="Add new quantity">
              <span class="help-block">Use only to update item count.</span>
            </div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-top" title="Cancel">
                <i class="fa fa-repeat"></i>
              </button>
            </div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-top" title="Save">
                <i class="fa fa-save"></i>
              </button>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #00adef;">
            Update stock
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <section class="content col-md-6">

        <!-- Default box -->
        <div class="box collapsed-box">
          <div class="box-header with-border" style="color:#fff; background: #222d32;">
            <h3 class="box-title">Add New Item</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: none;">
          <form action="">
            <!-- select category -->
            <!-- <div class="form-group col-md-6">
              <label>Select Category</label>
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Category</option>
                <option>Category</option>
                <option>Category</option>
                <option>Category</option>
                <option>Category</option>
                <option>Category</option>
                <option>Category</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Select Sub Category</label>
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Sub Category</option>
                <option>Sub Category</option>
                <option>Sub Category</option>
                <option>Sub Category</option>
                <option>Sub Category</option>
                <option>Sub Category</option>
                <option>Sub Category</option>
              </select>
            </div> -->
            <div class="col-md-12 row">
            <div class="form-group has-warning col-md-4">
              <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i> Item Code</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Item Code">
            </div>
            <div class="form-group has-warning col-md-8">
              <label class="control-label" for="inputWarning"> Use only to add a new
                item.</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Item Name"></div>
            </div>
            <div class="form-group col-md-6">
            <label class="control-label" for="inputError">
              <i class="fa fa-fw fa-stack-overflow"></i> Input quantity
            </label>
              <input type="number" class="form-control" id="inputError" placeholder="Quantity">
            </div>
            <div class="form-group has-error col-md-6">
              <label class="control-label" for="inputError"><i class="fa fa-fw fa-stack-overflow"></i> Input low quantity
                rate</label>
              <input type="number" class="form-control" id="inputError" placeholder="Low quantity rate">
              <span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span>
            </div>

            <div class="input-group col-md-12 add-padding">
              <label class="custom-file-label" for="exampleInputFile">Add Item Image</label>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple="true"
                  onchange="readURL(this);">
              </div>
              <div class="input-group-append">
                <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
              </div>

            </div>
            <div class="add-padding">
            <div class="form-group col-md-4" style="background:#00adef">
              <label style="font-size: 13px;margin-top: 10px;">Select Stock Status</label>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadioStatus" id="optionsRadios1" value="option1">
                  itm
                </label>
                <br>
                <label>
                  <input type="radio" name="optionsRadioStatus" id="optionsRadios1" value="option1">
                  pcs
                </label>
                <br>
                <label>
                  <input type="radio" name="optionsRadioStatus" id="optionsRadios1" value="option1">
                  pkt
                </label>
                <br>
                <label>
                  <input type="radio" name="optionsRadioStatus" id="optionsRadios1" value="option1">
                  ml
                </label>
                <br>
                <label>
                  <input type="radio" name="optionsRadioStatus" id="optionsRadios1" value="option1">
                  m
                </label>

              </div>
            </div>
            <div class="form-group col-md-4" style="background:#00adef">
              <label style="font-size: 13px;margin-top: 10px;">Select Rack</label>
              <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadiosDeck" id="optionsRadios3" value="option1">
                    A
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosDeck" id="optionsRadios3" value="option1">
                    B
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosDeck" id="optionsRadios3" value="option1">
                    C
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosDeck" id="optionsRadios3" value="option1">
                    D
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosDeck" id="optionsRadios3" value="option1">
                    E
                  </label>
  
                </div>
            </div>
            <div class="form-group col-md-4" style="background:#00adef">
              <label style="font-size: 13px;margin-top: 10px;">Select Shelving deck</label>
              <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadiosRack" id="optionsRadios2" value="option1">
                    1
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosRack" id="optionsRadios2" value="option1">
                    2
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosRack" id="optionsRadios2" value="option1">
                    3
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosRack" id="optionsRadios2" value="option1">
                    4
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="optionsRadiosRack" id="optionsRadios2" value="option1">
                    5
                  </label>
  
                </div>
            </div>
            </div>
            <div class="form-group col-md-12">
              <fieldset>
                <legend class="has-warning"><label>Complete this for rental items.</label></legend>

                <div class="form-group has-warning col-md-2">
                  <section title=".squaredOne">
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="squaredOne" name="check" />
                      <label for="squaredOne"></label>
                    </div>
                    <!-- end .squaredOne -->
                  </section>

                </div>
                <div class="form-group has-warning col-md-4">
                  <label>Mark this for rental items..</label>
                </div>
                <div class="form-group has-warning col-md-6">
                  <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-money"></i> Rental charge per
                    day
                    <input type="text" class="form-control" id="inputWarning" placeholder="Price">
                    <span class="help-block">Currency auto selected (LKR)</span>
                </div>
              </fieldset>
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
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:#fff; background: #222d32;">
            Add new item to stock
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <section class="content col-md-12">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:rgb(255, 255, 255); background: #00adef;">
            <h3 class="box-title">Stock Overview</h3>

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
                  <th>Item Code</th>
                  <th>Item Name</th>
                  <th>Image</th>
                  <th>Stock Count</th>
                  <th style="background: rgb(255, 138, 138)">Low Qty Rate</th>
                  <th>Item Location</th>
                  <th class="th-sm" style="text-align:center">Update</th>
                  <th class="th-sm" style="text-align:center">Remove</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="iwc001" title="Click to view item">iwc001</a></td>
                  <td>Walding Plant</td>
                  <td class="overviewImage"><img src="../../dist/img/item-001-sample.png" alt=""></td>
                  <td>1000pcs</td>
                  <td>100pcs</td>
                  <td>Location : A3</td>
                  <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                  <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                </tr>
                <!-- IF itme quntity less than low rate, should be red this row  -->
                <tr style="background: rgb(253, 8, 8); color: #fff;">
                    <!-- IF itme quntity less than low rate, should be red this row  -->
                    <td><a style="color: #ffffff" href="iwc002" title="Click to view item">iwc002</a></td>
                    <td>Glinder</td>
                    <td class="overviewImage"><img src="../../dist/img/item-001-sample.png" alt=""></td>
                    <td>99pcs</td>
                    <td>100pcs</td>
                    <td>Location : D5</td>
                    <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffffff" class="fa fa-pencil-square"
                      aria-hidden="true"></i></a></td>
                    <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #ffffff" class="fa fa-window-close"
                      aria-hidden="true"></i></a></td>
                  </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:rgb(255, 255, 255); background: #00adef;">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <!-- /.content -->
    </div>
@stop