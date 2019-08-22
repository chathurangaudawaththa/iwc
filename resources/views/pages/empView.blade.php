@extends('layouts.default')
@section('content')
<?php $nav_handoveremp = 'active'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
          <li>
              <i class="fa fa-fw fa-stack-overflow bg-purple"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Supplied Items</a></h3>

                <div class="timeline-body">
                    <!-- form -->
                    @isset($itemIssueObject)
                    <form method="POST" action="{!! route('itemReceiveEmployee.store', [$itemIssueObject->id]) !!}" enctype="multipart/form-data">
                    @csrf
                        
                    <input type="hidden" id="transaction_type_id" name="transaction_type_id" value="4"/>
                    <!-- -->
                <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Get Date</th>
                  <th>Item name</th>
                  <th>Reason</th>
                  <th>Obtained Quantity</th>
                  <th>Quantity of delivery</th>
                  <th>Select Submited Items</th>
                </tr>
              </thead>
              <tbody>
                @isset($itemIssueObject->itemIssueDatas)
                    @foreach($itemIssueObject->itemIssueDatas as $key => $value)
                        @if( ($value->quantity > $value->itemReceiveDatasSum()) )

                        <tr>
                            <td>{{ $itemIssueObject->date_create }}</td>
                            <td>{{ $value->item->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{!! $value->quantity !!} {{ $value->measuringUnit->name }}</td>
                            <td>
                                <input 
                                       type="number" 
                                       class="form-control" 
                                       id="quantity" 
                                       name="quantity_{!! $value->id !!}"
                                       placeholder="Qty" 
                                       value="{!! ($value->quantity - $value->itemReceiveDatasSum()) !!}"
                                       />
                                <span>{{ $value->measuringUnit->name }}</span>
                            </td>
                            <td>
                            <label style="display: table;margin: 0 auto;">
                            <input 
                                   type="checkbox" 
                                   class="flat-red"
                                   id="item_id" 
                                   name="item_issue_data_id[]" 
                                   value="{!! $value->id !!}"
                                   />
                            </label>
                            </td>
                        </tr>

                        @endif
                    @endforeach
                @endisset    
              </tbody>
            </table>
            <table>
            <tr> 
                <td>
                <button class="btn btn-app btn-app-marg-top" title="Save" type="submit">
                    <i class="fa fa-save"></i>
                </button>
                </td>
            </tr>
            </table>
            <!-- -->
            </form>
            @endisset 
            <!-- /.form -->
                </div>
              </div>
            </li>
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a href="#">Personal Details</a></h3>
              <div class="timeline-body profile-text">
                    @isset($itemIssueObject)
                        @isset($itemIssueObject->customer)
                            <span>Emp ID : {{ $itemIssueObject->customer->code }}</span>
                            <br>
                            <span>Name : {{ $itemIssueObject->customer->first_name }}</span>
                            <br>
                            <span>NID : {{ $itemIssueObject->customer->nic }}</span>
                            <br>

                            <br>
                        @endisset
                    @endisset                
                  </div>
              </div>
            </li>
            <li>
              <i class="fa fa-camera bg-red"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">National ID </a></h3>

                <div class="timeline-body">
                    @isset($itemIssueObject)
                        @isset($itemIssueObject->customer)
                            <img style="width: 200px;" src="{!! Storage::url( $itemIssueObject->customer->image_uri_nic_front ) !!}" alt="Front view of NID" class="margin">
                            <img style="width: 200px;" src="{!! Storage::url( $itemIssueObject->customer->image_uri_nic_back ) !!}" alt="Back view of NID" class="margin">
                        @endisset
                    @endisset
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
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