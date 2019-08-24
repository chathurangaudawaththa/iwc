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
        <div class="box">
          <div class="box-header with-border" style="color:#ffffff; background: #00adef;">
            <h3 class="box-title">Issue of items</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          <form action="{!! route('itemIssue.store') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
            <!-- {{ csrf_field() }} || {{ Session::token() }} -->
            @csrf
            
            <input type="hidden" id="transaction_type_id" name="transaction_type_id" value="4"/>
            <!-- select item -->
            <div class="row add-padding">
            <div class="form-group  col-md-6">
              <label>Select Employee</label>
              <select class="form-control select2" style="width: 100%;" id="customer_id" name="customer_id">
                <option>Select Employee</option>
                @isset($customerObjectArray)
                  @foreach($customerObjectArray as $key => $value)
                    <option value="{!! $value->id !!}" 
                            data-image_uri-customer="{!! asset(Storage::url($value->image_uri)) !!}"
                            data-first_name-customer="{!! $value->first_name !!}"
                            data-last_name-customer="{!! $value->last_name !!}"
                            data-nic-customer="{!! $value->nic !!}"
                            data-code-customer="{!! $value->code !!}"
                    >
                        {{ $value->code }} | {{ $value->first_name }}
                    </option>
                  @endforeach
                @endisset
              </select>
              <!-- span class="help-block" id="info_customer_data">name (code)</span -->
            </div>
            <div class="form-group col-md-6 has-error add-padding">
              <!-- span class="help-block" style="margin-top: 24px;">*Can be issue of items only current date (2019/07/06)</span -->
            </div>
            </div>
            <div class="form-group has-error col-md-6 min-margin">
            <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i>Select Item</label>
              <select class="form-control select2" style="width: 100%;" id="item_id_select" name="item_id_select">
                <option>Select Item</option>
                @isset($itemObjectArray)
                  @foreach($itemObjectArray as $key => $value)
                    <option value="{!! $value->id !!}" 
                            data-image_uri-item="{!! asset(Storage::url($value->image_uri)) !!}"
                            data-name-item="{!! $value->name !!}"
                            data-rack-item="{!! !empty($value->rack) ? $value->rack->name  : null !!}"
                            data-deck-item="{!! !empty($value->deck) ? $value->deck->name  : null !!}"
                            data-measuring_unit-item="{!! !empty($value->measuringUnit) ? $value->measuringUnit->name  : null !!}"
                    >
                        {{ $value->code }} | {{ $value->name }}
                    </option>
                  @endforeach
                @endisset
              </select>
            </div>
            <div class="form-group col-md-6 min-margin">
            <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i>Item Count</label>
                <input type="number" class="form-control" placeholder="Item Count" id="quantity_item_issue_data" name="quantity_item_issue_data"/>
              </div>
              <div class="form-group has-error add-padding">
              <!-- span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span -->
              <br/><br/>
              <span class="help-block" id="irack_item">Rack </span>
              <span class="help-block" id="ideck_item">Deck </span>
              <span class="help-block" id="imeasuring_unit_item">Measuring Unit </span>
              </div>
              <div class="form-group  col-md-4 overviewImage2"><img id="image_uri_item" src="" alt=""/></div>

            <div class="form-group col-md-12">
            <div class="form-group input-group min-margin">
                    <input type="text" class="form-control" placeholder="Reoson" id="description_item_issue_data" name="description_item_issue_data"/>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="btn_add_item_data">Add</button>
                    </span>
              </div>
              <!-- span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span -->

              </div>
              <div class="form-group col-md-12">

            <!-- /.box-header -->
            <div class="form-group col-md-12" style="background: #e8e1e1; padding-top:10px">
              <fieldset>
                <legend class="has-warning"><label id="info_customer_data">-</label></legend>
                <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Reason</th>
                  <!-- th class="th-sm" style="text-align:center;color: #d2c7c7;"></th -->
                  <th class="th-sm" style="text-align:center;color: #d2c7c7;"></th>
                </tr>
              </thead>
              <tbody id="tbody_item">
              </tbody>
            </table>
              </fieldset>
            </div>
            <!-- /.box-body -->
         
              </div>
              <!-- -->
            <div class="form-group col-md-12">
                <div class="form-group input-group min-margin">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-flat">Save</button>
                    </span>
                </div>
            </div>
              <!-- -->
          </form>
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
          <form action="{!! route('employee.store') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
            <!-- {{ csrf_field() }} || {{ Session::token() }} -->
            @csrf
            <input type="hidden" id="user_type_id" name="user_type_id" value="2"/>
            <div class="col-md-12 row">
            <div class="form-group has-warning col-md-4">
              <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-barcode"></i>Emp ID</label>
              <input type="text" class="form-control" id="code" name="code" placeholder="Emp ID"/>
            </div>
            <div class="form-group has-warning col-md-8">
            <label class="control-label" for="inputWarning"> Full Name with Initial</label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Emp Name"/>
              <span class="help-block">Example : W.A.Senarath</span>

            </div>
            </div>
            <div class="form-group col-md-6 add-padding">
              <label class="custom-file-label" for="exampleInputFile">Add Image of NID (Front)</label>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image_uri_nic_front" name="image_uri_nic_front" multiple="false" onchange="readURL(this);">
              </div>
              <div class="input-group-append">
                <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
              </div>
            </div>
            <div class="form-group col-md-6 add-padding">
              <label class="custom-file-label" for="exampleInputFile">Add Image of NID (Back)</label>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image_uri_nic_back" name="image_uri_nic_back" multiple="true" onchange="readURL(this);"/>
              </div>
              <div class="input-group-append">
                <span class="help-block">Select Item Image, less than 200kb Image capacity.</span>
              </div>
            </div>
            <div class="add-padding">
            <div class="col-md-6"></div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-bot" title="Cancel" type="reset">
                <i class="fa fa-repeat"></i>
              </button>
            </div>
            <div class="col-md-3">
            <button class="btn btn-app btn-app-marg-bot" title="Save" type="submit">
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
                  
                @isset($customerObjectArray)
                  @foreach($customerObjectArray as $key => $value)
                  
                    <tr>
                        <td>{{ $value->code }}</td>
                        <td>{{ $value->first_name }}</td>
                        <td class="overviewImage"><img src="{!! asset(Storage::url($value->image_uri_nic_front)) !!}" alt=""></td>
                        <td class="overviewImage"><img src="{!! asset(Storage::url($value->image_uri_nic_back)) !!}" alt=""></td>
                        <td class="article-btn edit" style="text-align:center">
                            <a href="#" title="Update item">
                                <i style="color: #ffc400" class="fa fa-pencil-square" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="article-btn delete" style="text-align:center">
                            <a href="#" title="Delete item">
                                <i style="color: #c50404" class="fa fa-window-close" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                  
                  @endforeach
                @endisset
                  
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
                <!-- tr>
                  <th>Date</th>
                  <th>Emp ID</th>
                  <th>Emp Name</th>
                  <th>Item name</th>
                  <th>Quantity</th>
                  <th>Reason</th>
                  <th class="th-sm" style="text-align:center"></th>
                  <th class="th-sm" style="text-align:center"></th>
                  <th class="article-btn edit" style="text-align:center"><a href="#" title="Update item"><i style="color: #ffc400" class="fa fa-pencil-square" aria-hidden="true"></i></a></th>
                  <th class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close" aria-hidden="true"></i></a></th>
                </tr -->
                <tr>
                    <th>Date</th>
                    <th>Emp ID</th>
                    <th>Emp Name</th>
                    <th>Issue ID</th>
                    <th>Created User</th>
                </tr>
              </thead>
              <tbody>
                @isset($itemIssueObjectArray)
                  @foreach($itemIssueObjectArray as $key => $value)
                  
                    @php
                        $date_today = Carbon\Carbon::now()->startOfDay();
                        $date_create = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->date_create)->startOfDay();
                        $date_receive = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->date_receive)->startOfDay();
                    @endphp
                  
                    @if($value->itemIssueDatasSum() > $value->itemReceiveDatasSum())
                    <tr
                        @if( $date_today->greaterThanOrEqualTo( $date_receive ) )
                            {{ null }}
                        @endif
                    >
                        <!-- {!! 'style="background: rgb(253, 8, 8); color: #fff;"' !!} -->
                        <td>{{ $date_create->format('Y-m-d') }}</td>
                        <td>
                            @if(isset($value->customer))
                                {{ $value->customer->code }}
                            @endif
                        </td>
                        <td>
                            @if(isset($value->customer))
                                {{ $value->customer->first_name }}
                            @endif
                        </td>
                        <td>
                            {{ $value->id }}
                        </td>
                        <td>
                            @if(isset($value->user))
                                {{ $value->user->first_name }}
                            @endif
                        </td>
                    </tr>
                    @endif
                  
                  @endforeach
                @endisset
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
    <script>
    $(function(){
        "use strict";
        //$('#item_id').select2({});
        $('#customer_id').on('select2:select', function (e) { 
            //e.preventDefault();
            var temp_image_uri = null;
            var temp_first_name = null;
            var temp_last_name = null;
            var temp_nic = null;
            var temp_code = null;
            temp_image_uri = $( e.target ).find(':selected').attr('data-image_uri-customer');
            temp_first_name = $( e.target ).find(':selected').attr('data-first_name-customer');
            temp_last_name = $( e.target ).find(':selected').attr('data-last_name-customer');
            temp_nic = $( e.target ).find(':selected').attr('data-nic-customer');
            temp_code = $( e.target ).find(':selected').attr('data-code-customer');
            $('#info_customer_data').text( temp_first_name + ' ' + temp_last_name + '(' + temp_code + ')' );
        });
        
        //$('#item_id').select2({});
        $('#item_id_select').on('select2:select', function (e) { 
            //e.preventDefault();
            var temp_image_uri = null;
            var temp_rack_item = null;
            var temp_deck_item = null;
            var temp_measuring_unit_item = null;
            temp_image_uri = $( e.target ).find(':selected').attr('data-image_uri-item');
            temp_rack_item = $( e.target ).find(':selected').attr('data-rack-item');
            temp_deck_item = $( e.target ).find(':selected').attr('data-deck-item');
            temp_measuring_unit_item = $( e.target ).find(':selected').attr('data-measuring_unit-item');
            $('#image_uri_item').attr('src', temp_image_uri);
            $('#irack_item').text( 'Rack : ' + temp_rack_item );
            $('#ideck_item').text( 'Deck : ' + temp_deck_item );
            $('#imeasuring_unit_item').text( 'Measuring Unit : ' + temp_measuring_unit_item );
        });
    });
        
    $('#btn_add_item_data').on('click', function(e){
        //e.preventDefault();
        var item_id_select = $('#item_id_select');
        var quantity_item_issue_data = $('#quantity_item_issue_data');
        var description_item_issue_data = $('#description_item_issue_data');
        var item_id_select_value = item_id_select.val();
        var quantity_item_issue_data_value = quantity_item_issue_data.val();
        var description_item_issue_data_value = description_item_issue_data.val();
        item_id_select_value = Number(item_id_select_value);
        if( isNaN(item_id_select_value) || (item_id_select_value == 0) ){
            
        }else{
            var tr_1 = $('<tr></tr>');
            var td_1 = $('<td>' 
                         + item_id_select.find(':selected').attr('data-name-item') 
                         + '<input type="hidden" readonly name="item_id[]" value="' 
                         + item_id_select_value 
                         + '"/></td>');
            var td_2 = $('<td>' 
                         + quantity_item_issue_data_value 
                         + '<input type="hidden" readonly name="quantity[]" value="' 
                         + quantity_item_issue_data_value + '"/></td>');
            var td_3 = $('<td>' 
                         + description_item_issue_data_value 
                         + '<input type="hidden" readonly name="description[]" value="' 
                         + description_item_issue_data_value + '"/></td>');
            //var td_4 = $('<td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #ffc400" class="fa fa-pencil-square" aria-hidden="true"></i></a></td>');
            var td_5 = $('<td class="article-btn delete" style="text-align:center"><a href="#" title="Delete item"><i style="color: #c50404" class="fa fa-window-close" aria-hidden="true"></i></a></td>');
            
            td_5.bind('click', null, function(){
                $( this ).closest('tr').remove();
            });
            
            tr_1.addClass('default');
            tr_1.append(td_1);
            tr_1.append(td_2);
            tr_1.append(td_3);
            //tr_1.append(td_4);
            tr_1.append(td_5);
            
            $('#tbody_item').append( tr_1 );
        }
        
        item_id_select.val(null).trigger('change');
        quantity_item_issue_data.val(null);
        description_item_issue_data.val(null);
        
        $('#image_uri_item').attr('src', null);
        $('#irack_item').text( null);
        $('#ideck_item').text( null );
        $('#imeasuring_unit_item').text( null );
    });
    </script>
@stop