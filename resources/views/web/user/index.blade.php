@extends('layout.main')

@section('content')
<section id="mySection">
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;User&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">List User</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="row">
	<div class="col-md-12 stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<div class="row card-title">
	    		<p class="col-md-2">List User</p>
	    		<div class="col-md-10">
	    			<button type="button" id="btnAdd" data-toggle="modal" data-target="#myModal" class="btn btn-success float-right">Add</button>
	    		</div>
	    	</div>
	      <div class="table-responsive">
	        <table id="DataTable" class="table">
	          <thead>
	            <tr>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Username</th>
	                <th>Role</th>
	                <th>Created At</th>
	                <th></th>
	            </tr>
	          </thead>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
</div>
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
</section>
@endsection

@section('javascript')
<script src="{{ asset('/jsmodule/user/user.js') }}"></script>
@endsection