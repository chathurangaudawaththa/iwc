@extends('layouts.default')
@section('content')
<?php $nav_stock = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <section class="content col-md-12">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #00adef;">
            <h3 class="box-title">Update Stock</h3>
 
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form action="{!! route('stock.store') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
            <!-- {{ csrf_field() }} || {{ Session::token() }} -->
            @csrf
            <input type="hidden" id="transaction_type_id" name="transaction_type_id" value="2"/>
            <!-- select item -->
            <div class="row add-padding">
            <div class="form-group  col-md-4">
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
            </div>

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

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:rgb(255, 255, 255); background: #00adef;">
            <h3 class="box-title">Stock Overview</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
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
                    <tr
                        @if( intval($value->stocksSum()) <= intval($value->quantity_low) )
                        {!! 'style="background: rgb(255, 138, 138); color: #fff;"' !!}
                        @endif
                    >
                        <td>{{ $value->code }}</td>
                        <td>{{ $value->name }}</td>
                        <td class="overviewImage">
                            <img src="{!! asset(Storage::url($value->image_uri)) !!}" alt=""/>
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
                        <td class="article-btn edit" style="text-align:center">
                            <a href="{!! route('item.edit', ['item' => $value->id]) !!}" title="Update item">
                                <i style="color: #ffc400" class="fa fa-pencil-square" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="article-btn delete" style="text-align:center">
                            <a href="{!! route('item.destroy', ['item' => $value->id]) !!}" title="Delete item" onclick="return confirm('Are you sure?');">
                                <i style="color: #c50404" class="fa fa-window-close" aria-hidden="true"></i>
                            </a>
                        </td>
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