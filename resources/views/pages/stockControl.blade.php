@extends('layouts.default')
@section('content')
<?php $nav_stock = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <section class="content col-md-6">

        <!-- Default box -->
        <div class="box collapsed-box">
          <div class="box-header with-border" style="color:#fff; background: #00adef;">
            <h3 class="box-title">Update Stock</h3>
 
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: none;">
            <form action="{!! route('stock.store') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
            <!-- {{ csrf_field() }} || {{ Session::token() }} -->
            @csrf
            <input type="hidden" id="transaction_type_id" name="transaction_type_id" value="2"/>
            <!-- select item -->
            <div class="form-group  col-md-8">
              <label>Select Item</label>
              <select class="form-control select2" style="width: 100%;" id="item_id" name="item_id">
                <option>Select Item</option>
                @isset($itemObjectArray)
                  @foreach($itemObjectArray as $key => $value)
                    <option value="{!! $value->id !!}" data-image_uri-item="{!! asset(Storage::url($value->image_uri)) !!}">
                        {{ $value->code }} | {{ $value->name }}
                    </option>
                  @endforeach
                @endisset
              </select>
            </div>
            <div class="form-group  col-md-4 overviewImage2"><img id="image_uri_item" src="" alt=""></div>

            <div class="form-group has-warning  col-md-6">
              <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Add new quantity"/>
              <span class="help-block">Use only to update item count.</span>
            </div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-top" title="Cancel">
                <i class="fa fa-repeat"></i>
              </button>
            </div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-top" title="Save" type="submit">
                <i class="fa fa-save"></i>
              </button>
            </div>
            </form>
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
          <form action="{!! route('item.store') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
              <!-- {{ csrf_field() }} || {{ Session::token() }} -->
              @csrf
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
              <label class="control-label" for="inputWarning">Item Code</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Item Code" name="code"/>
            </div>
            <div class="form-group has-warning col-md-8">
              <label class="control-label" for="inputWarning"> Use only to add a new
                item.</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Item Name" name="name"/>
            </div>
            </div>
            <!-- div class="form-group col-md-6">
            <label class="control-label" for="inputError">
              <i class="fa fa-fw fa-stack-overflow"></i> Input quantity
            </label>
              <input type="number" class="form-control" id="inputError" placeholder="Quantity"/>
            </div -->
            <div class="form-group has-error col-md-6">
              <label class="control-label" for="inputError"><i class="fa fa-fw fa-stack-overflow"></i> Input low quantity
                rate</label>
              <input type="number" class="form-control" id="inputError" placeholder="Low quantity rate" name="quantity_low"/>
              <span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span>
            </div>

            <div class="input-group col-md-12 add-padding">
              <label class="custom-file-label" for="exampleInputFile">Add Item Image</label>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="image_uri" multiple="false"
                  onchange="readURL(this);">
              </div>
              <div class="input-group-append">
                <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
              </div>

            </div>
            <br>
            <div class="add-padding">
            <div class="form-group col-md-4" style="background:#00adef">
              <label style="font-size: 13px;margin-top: 10px;">Stock Status</label>
              <div class="radio">
                <label>
                  <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="2"/>
                  Piece (s)
                </label>
                <br>
                <label>
                  <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="3"/>
                  Packet (s)
                </label>
                <br>
                <label>
                  <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="4"/>
                  ml (Liquid)
                </label>
                <br>
                <label>
                  <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="5"/>
                  m (meters)
                </label>

              </div>
            </div>
            <div class="form-group col-md-4" style="background:#00adef">
              <label style="font-size: 13px;margin-top: 10px;">Rack</label>
              <div class="radio">
                  <label>
                    <input type="radio" name="rack_id" id="rack_id" value="2"/>
                    R1
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="rack_id" id="rack_id" value="3"/>
                    R2
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="rack_id" id="rack_id" value="4"/>
                    R3
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="rack_id" id="rack_id" value="5"/>
                    R4
                  </label> 
                </div>
            </div>
            <div class="form-group col-md-4" style="background:#00adef">
              <label style="font-size: 13px;margin-top: 10px;">Shelving deck</label>
              <div class="radio">
                  <label>
                    <input type="radio" name="deck_id" id="deck_id" value="2"/>
                    D1
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="deck_id" id="deck_id" value="3"/>
                    D2
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="deck_id" id="deck_id" value="4"/>
                    D3
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="deck_id" id="deck_id" value="5"/>
                    D4
                  </label> 
                </div>
            </div>
            </div>
            <br>
            <div class="form-group col-md-12">
              <fieldset>
                <legend class="has-warning"><label>Complete this for rental items.</label></legend>
                <div class="form-group has-warning col-md-4">
                  <label>Mark this for rental items..</label>
                </div>
                <div class="form-group has-warning col-md-2">
                <label style="display: table;margin: 0 auto;">
                      <input type="checkbox" name="is_rentable" class="flat-red" value="1"/>
                    </label>

                </div>
                
                <div class="form-group has-warning col-md-6">
                  <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-money"></i> Rental charge per
                      day</label>
                    <input type="text" class="form-control" id="inputWarning" placeholder="Price" name="unit_price"/>
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
                  <th>Rental Price</th>
                  <th>Stock Qty</th>
                  <th style="background: rgb(255, 138, 138)">Low Qty Rate</th>
                  <th>Item Location</th>
                  <th class="th-sm" style="text-align:center">Update</th>
                  <th class="th-sm" style="text-align:center">Remove</th>

                </tr>
              </thead>
              <tbody>
                @isset($itemObjectArray)
                  @foreach($itemObjectArray as $key => $value)
                  
                    <!-- style="background: rgb(255, 138, 138); color: #fff;" -->
                    <tr>
                        <td>{{ $value->code }}</td>
                        <td>{{ $value->name }}</td>
                        <td class="overviewImage">
                            <img src="{!! asset(Storage::url($value->image_uri)) !!}" alt="">
                        </td>
                        <th>Rs. {{ $value->unit_price }}</th>
                        <td>
                            @isset($value->measuringUnit)
                                {{ $value->stocksSum() }} {{ $value->measuringUnit->name }}
                            @endisset
                        </td>
                        <td>
                            @isset($value->measuringUnit)
                                {{ $value->quantity_low }} {{ $value->measuringUnit->name }}
                            @endisset
                        </td>
                        <td>
                            Location : 
                            @isset($value->rack)
                                {{ $value->rack->name }}
                            @endisset
                            :
                            @isset($value->deck)
                                {{ $value->deck->name }}
                            @endisset
                        </td>
                        <td class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square"
                        aria-hidden="true"></i></a></td>
                        <td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close"
                        aria-hidden="true"></i></a></td>
                    </tr>
                  
                  @endforeach
                @endisset
                
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" style="color:rgb(255, 255, 255); background: #00adef;">
          Stock Overview
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- stock overview -->
      <!-- /.content -->
    </div>
    <script>
    $(function(){
        "use strict";
        //$('#item_id').select2({});
        $('#item_id').on('select2:select', function (e) { 
            var temp_image_uri = null;
            temp_image_uri = $( e.target ).find(':selected').attr('data-image_uri-item');
            $('#image_uri_item').attr('src', temp_image_uri);
        });
    });
    </script>
@stop