<?php $nav_emp = 'active'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) --> 
      <section class="content-header">

      </section>

      <section class="content col-md-6">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border" style="color:#fff; background: #222d32;">
            <h3 class="box-title">Register New Employee</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form action="{!! route('user.store') !!}" method="POST" class="" autocomplete="off" id="form" enctype="multipart/form-data">
                <!-- {{ csrf_field() }} || {{ Session::token() }} -->
                @csrf

                <input type="text" name="first_name" placeholder="first_name">
                <input type="text" name="last_name" placeholder="last_name">
                <input type="text" name="username" placeholder="username">
                <input type="text" name="password" placeholder="password">
                <button type="submit" value="submit">Save</button>
            </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
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
      <!-- stock overview -->
      <!-- /.content -->
    </div>
