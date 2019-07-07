@extends('layouts.default')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Stock Controll Unit
      <small>Iron Wood Craft Stock Management System</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Stock Controll Unit</li>
    </ol>
  </section> 

  <!-- Main content -->
      <section class="content col-md-6">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:rgb(31, 31, 31); background: #ffd900;">
            <h3 class="box-title">Update Stock</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
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
              <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Use only to update item
                count.</label>
              <input type="number" class="form-control" id="inputWarning" placeholder="Add new quantity">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:rgb(31, 31, 31); background: #ffd900;">
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
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body" style="display: none;">
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
    <div class="form-group has-warning col-md-6">
      <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Use only to add a new
        item.</label>
      <input type="text" class="form-control" id="inputWarning" placeholder="New Item">
      <span class="help-block">Select Category and Sub Category related to the new item.</span>
    </div>
    <div class="form-group has-error col-md-6">
      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input low quantity
        rate</label>
      <input type="number" class="form-control" id="inputError" placeholder="Low quantity rate">
      <span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span>
    </div>

    <div class="input-group  col-md-12">
      <label class="custom-file-label" for="exampleInputFile">Add Item Image</label>

      <div class="custom-file">
        <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple="true"
          onchange="readURL(this);">
      </div>
      <div class="input-group-append">
        <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
      </div>

    </div>
    <div class="form-group col-md-4" style="background:#3c8dbc40">
      <label>Select Stock Status</label>
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
    <div class="form-group col-md-4" style="background:#3c8dbc50">
      <label>Select Rack</label>
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
    <div class="form-group col-md-4" style="background:#3c8dbc60">
      <label>Select Shelving deck</label>
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
  </div>
  <!-- /.box-body -->
  <div class="box-footer" style="color:#fff; background: #222d32;">
    Add new item to stock
  </div>
  <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
 <section class="content col-md-12">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border" style="color:rgb(255, 255, 255); background: #00ad26;">
    <h3 class="box-title">Stock Overview</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
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
          <th>Rack Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>iwc001</td>
          <td>Walding Plant</td>
          <td class="overviewImage"><img src="../../dist/img/item-001-sample.png" alt=""></td>
          <td>1000pcs</td>
          <td>100pcs</td>
          <td>Rack NO: 1 | Deck : A</td>
        </tr>
        <!-- IF itme quntity less than low rate, should be red this row  -->
        <tr style="background: rgb(253, 8, 8); color: #fff;">
        <!-- IF itme quntity less than low rate, should be red this row  -->
          <td>iwc002</td>
          <td>Glinder</td>
          <td class="overviewImage"><img src="../../dist/img/item-001-sample.png" alt=""></td>
          <td>99pcs</td>
          <td>100pcs</td>
          <td>Rack NO: 1 | Deck : A</td>
        </tr>
        <tr>
          <td>iwc003</td>
          <td>Drill</td>
          <td class="overviewImage"><img src="../../dist/img/item-001-sample.png" alt=""></td>
          <td>200pcs</td>
          <td>100pcs</td>
          <td>Rack NO: 1 | Deck : A</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer" style="color:rgb(255, 255, 255); background: #00ad26;">
    Footer
  </div>
  <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>

</div>
@stop