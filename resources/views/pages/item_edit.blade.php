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
            <h3 class="box-title">Update Item</h3>
         </div>
         <div class="box-body">
            <form action="{!! route('item.update', ['item' => $itemObject->id]) !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
               <!-- {{ csrf_field() }} || {{ Session::token() }} -->
               @csrf
               <div class="col-md-12 row">
               @if($errors->getBag('default')->has('code'))
                  <div class="form-group has-error col-md-4">
                    <label class="control-label" for="inputError">
                    {{$errors->getBag('default')->first('code')}}
                    </label>                     
                    <input value="{{ $itemObject->code }}" type="text" class="form-control" id="inputWarning" placeholder="Update Item Code" name="code"/>
                  </div>
                  @else
                  <div class="form-group col-md-4">
                     <label class="control-label" for="inputWarning">Update Item Code</label>
                     <input value="{{ $itemObject->code }}" type="text" class="form-control" id="inputWarning" placeholder="Update Item Code" name="code"/>
                  </div>
                  @endif
                  @if($errors->getBag('default')->has('name'))
                  <div class="form-group has-error col-md-4">
                    <label class="control-label" for="inputError">
                    {{$errors->getBag('default')->first('name')}}
                    </label>                     
                    <input type="text" class="form-control" id="inputWarning" placeholder="Item Name" name="name" value="{{ $itemObject->name }}"/>
                  </div>
                  @else
                  <div class="form-group col-md-4">
                     <label class="control-label" for="inputWarning">Update Item Name</label>
                     <input type="text" class="form-control" id="inputWarning" placeholder="Item Name" name="name" value="{{ $itemObject->name }}"/>
                  </div>
                  @endif
                  <div class="form-group has-warning  col-md-4">
                     <label class="control-label" for="inputWarning">Disabled Item Count</label>
                     <input readonly type="number" class="form-control" id="quantity" name="quantity" placeholder="Item quantity" value="{{ $itemObject->stocksSum() }}"/>
                     <span class="help-block">Please use the stock control unit to update the number of items</span>
                  </div>
               </div>
               <div class=" col-md-12 row">
                  <div class="form-group col-md-4">
                     <label class="control-label" for="inputError"><i class="fa fa-fw fa-stack-overflow"></i> Update low quantity
                     rate</label>
                     <input value="0" type="number" class="form-control" id="inputError" placeholder="Low quantity rate" name="quantity_low" value="{{ $itemObject->quantity_low }}"/>
                     <span class="help-block">Notification will be issued when quantity of stock is less than this rate.</span>
                  </div>






                  @if($errors->getBag('default')->has('image_uri'))
                  <div class="form-group has-error col-md-4">
                    <label class="control-label" for="image_uri">
                    {{$errors->getBag('default')->first('image_uri')}}
                    </label>                     
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image_uri" name="image_uri" multiple="false"
                           onchange="readURL(this);">
                     </div>
                     <div class="input-group-append">
                        <span class="help-block">Select Item Image, less than 100kb Image capacity.</span>
                     </div>
                  </div>
                  <div class="form-group has-error col-md-4" style="max-height: 10em !important;min-height: 10em;">
                     <img src="{{ Storage::url($itemObject->image_uri) }}" id="image_uri_preview" style="min-height:-webkit-fill-available;max-height:-webkit-fill-available;">
                  </div>
                  @else
                  <div class="form-group col-md-4">
                     <label class="custom-file-label" for="image_uri">Update Item Image</label>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image_uri" name="image_uri" multiple="false"
                           onchange="readURL(this);">
                     </div>
                     <div class="input-group-append">
                        <span class="help-block">Select Item Image, less than 100kb Image capacity.</span>
                     </div>
                  </div>
                  <div class="form-group col-md-4" style="max-height: 10em !important;min-height: 10em;">
                     <img src="{{ Storage::url($itemObject->image_uri) }}" id="image_uri_preview" style="min-height:-webkit-fill-available;max-height:-webkit-fill-available;">
                  </div>
                  @endif
               </div>
               <br>
               <div class="add-padding">
                  <div class="form-group col-md-2" style="background:#00adef">
                     <label style="font-size: 13px;margin-top: 10px;">Stock Status</label>
                     <div class="radio">
                        <label>
                        <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="2" {!! ($itemObject->measuring_unit_id == 2) ?"checked":null; !!}/>
                        Piece (s)
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="3" {!! ($itemObject->measuring_unit_id == 3) ?"checked":null; !!}/>
                        Packet (s)
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="4" {!! ($itemObject->measuring_unit_id == 4) ?"checked":null; !!}/>
                        ml (Liquid)
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="measuring_unit_id" id="measuring_unit_id" value="5" {!! ($itemObject->measuring_unit_id == 5) ?"checked":null; !!}/>
                        m (meters)
                        </label>
                     </div>
                  </div>
                  <div class="form-group col-md-1" style="background:#00adef">
                     <label style="font-size: 13px;margin-top: 10px;">Rack</label>
                     <div class="radio">
                        <label>
                        <input type="radio" name="rack_id" id="rack_id" value="2" {!! ($itemObject->rack_id == 2) ?"checked":null; !!}/>
                        R1
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="rack_id" id="rack_id" value="3" {!! ($itemObject->rack_id == 3) ?"checked":null; !!}/>
                        R2
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="rack_id" id="rack_id" value="4" {!! ($itemObject->rack_id == 4) ?"checked":null; !!}/>
                        R3
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="rack_id" id="rack_id" value="5" {!! ($itemObject->rack_id == 5) ?"checked":null; !!}/>
                        R4
                        </label> 
                     </div>
                  </div>
                  <div class="form-group col-md-1" style="background:#00adef">
                     <label style="font-size: 13px;margin-top: 10px;">Deck</label>
                     <div class="radio">
                        <label>
                        <input type="radio" name="deck_id" id="deck_id" value="2" {!! ($itemObject->deck_id == 2) ?"checked":null; !!}/>
                        D1
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="deck_id" id="deck_id" value="3" {!! ($itemObject->deck_id == 3) ?"checked":null; !!}/>
                        D2
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="deck_id" id="deck_id" value="4" {!! ($itemObject->deck_id == 4) ?"checked":null; !!}/>
                        D3
                        </label>
                        <br>
                        <label>
                        <input type="radio" name="deck_id" id="deck_id" value="5" {!! ($itemObject->deck_id == 5) ?"checked":null; !!}/>
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
                           <input type="text" class="form-control" id="inputWarning" placeholder="Price" name="unit_price" value="{{ $itemObject->unit_price }}"/>
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
            Update item in stock
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
       
   $(function(){
       "use strict";
       $('#image_uri').change(function () {
           var imgPath = this.value;
           var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
           if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg"){
               readURL(this);
           }
       });
       function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.readAsDataURL(input.files[0]);
               reader.onload = function (e) {
                   $('#image_uri_preview').attr('src', e.target.result);
               };
           }
       }
   });
</script>
@stop