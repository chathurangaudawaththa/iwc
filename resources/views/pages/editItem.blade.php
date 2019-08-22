@extends('layouts.default')
@section('content')
<?php $item = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <section class="content col-md-12">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #222d32;">
            <h3 class="box-title">Update New Item</h3>
          </div>
          <div class="box-body">
          <form action="{!! route('item.store') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
              <!-- {{ csrf_field() }} || {{ Session::token() }} -->
              @csrf
            <div class="col-md-12 row">
            <div class="form-group has-warning col-md-4">
              <label class="control-label" for="inputWarning">Item Code</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Item Code" name="code"/>
            </div>
            <div class="form-group has-warning col-md-4">
              <label class="control-label" for="inputWarning"> Use only to add a new
                item.</label>
              <input type="text" class="form-control" id="inputWarning" placeholder="Item Name" name="name"/>
            </div>
            <div class="form-group has-warning  col-md-4">
            <label class="control-label" for="inputWarning">Insert Item Count</label>
              <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Item quantity"/>
            </div>
            </div>

            
            
            <div class=" col-md-12 row">
                <div class="form-group has-error col-md-4">
                    <label class="control-label" for="inputError"><i class="fa fa-fw fa-stack-overflow"></i> Input low quantity
                        rate</label>
                    <input type="number" class="form-control" id="inputError" placeholder="Low quantity rate" name="quantity_low"/>
                    <span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span>
                </div>
                <div class="form-group has-error col-md-4">
                <label class="custom-file-label" for="exampleInputFile">Add Item Image</label>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="image_uri" multiple="false"
                  onchange="readURL(this);">
              </div>
              <div class="input-group-append">
                <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
              </div>
                </div>
                <div class="form-group has-error col-md-4">
                    <img src="" alt="Preview Image">
                </div>
            </div>
            <br>
            <div class="add-padding">
            <div class="form-group col-md-2" style="background:#00adef">
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
            <div class="form-group col-md-1" style="background:#00adef">
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
            <div class="form-group col-md-1" style="background:#00adef">
              <label style="font-size: 13px;margin-top: 10px;">Deck</label>
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
            <div class="form-group col-md-8">
              <fieldset>
                <legend class="has-warning"><label>Complete this for only rental items.</label></legend>
                <div class="form-group has-warning col-md-4">
                    <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-money"></i> Rental charge per
                      day</label>
                    <input type="text" class="form-control" id="inputWarning" placeholder="Price" name="unit_price"/>
                    <span class="help-block">Currency auto selected (LKR)</span>

                </div>
                
                <div class="form-group has-warning col-md-6">
                  
                </div>
              </fieldset>
            </div>
            </div>
            <div class="add-padding">
            <div class="col-md-8"></div>
            <div class="col-md-2">
            <button class="btn btn-app btn-app-marg-bot" title="Cancel">
                <i class="fa fa-repeat"></i>
              </button>
            </div>
            <div class="col-md-2">
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