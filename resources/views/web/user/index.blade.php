@extends('layout.main')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Users</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a id="btnAdd" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Add User</a>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <table id="DataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /page content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<h4>User Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            	<form class="forms-sample" id="userForm">
            		<div class="form-group">
                      <label for="fullName">Full Name</label>
                      <input type="text" class="form-control" name="fullName" id="fullName">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                      <label for="confirmPassword">Confirm Password</label>
                      <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
                    </div>
                    <div class="form-group">
	                  <label for="exampleSelectGender">Role</label>
	                  <select class="form-control" name="role" style="width: 100%" id="role">
	                  	<option value="">--- Choose Role ---</option>
	                  </select>
	                 </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button class="btn btn-primary" id="btnSaveUser">Save</button>
            </div>
        </div>
    </div>
</div>
<div id="modalDetail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4>User Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-4"><strong>Name</strong></div>
                <div class="col-sm-1"><strong>:</strong></div>
                <div class="col-sm-6" id="modalDetailName"></div>
              </div>
              <div class="row">
                <div class="col-sm-4"><strong>Email</strong></div>
                <div class="col-sm-1"><strong>:</strong></div>
                <div class="col-sm-6" id="modalDetailEmail"></div>
              </div>
              <div class="row">
                <div class="col-sm-4"><strong>Username</strong></div>
                <div class="col-sm-1"><strong>:</strong></div>
                <div class="col-sm-6" id="modalDetailUsername"></div>
              </div>
              <div class="row">
                <div class="col-sm-4"><strong>Role</strong></div>
                <div class="col-sm-1"><strong>:</strong></div>
                <div class="col-sm-6" id="modalDetailRole"></div>
              </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('/jsmodule/user/user.js') }}"></script>
@endsection