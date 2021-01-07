@extends('layout.main')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Menu</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a id="btnUpdateMenu" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Update Menu</a>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                  <div class="col-sm-12 card-box">
                    <div class="col-sm-3">
                      <select class="form-control" name="role" id="role" >
                      </select>
                    </div>
                  </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12 card-box">
                  <form id="userMenuForm">
                    <div class="col-sm-4">
                      <label class="col-sm-8 control-label">Stuff Maintenance
                      </label>
                      <div class="col-sm-2">
                          <input type="checkbox" id="stuff" class="flat">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label class="col-sm-8 control-label">User Maintenance
                      </label>
                      <div class="col-sm-2">
                          <input type="checkbox" id="user-maintenance" class="flat">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label class="col-sm-8 control-label">Stock
                      </label>
                      <div class="col-sm-2">
                          <input type="checkbox" id="stock" class="flat">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12 card-box">
                  <button class="btn btn-success pull-right" id="btnSave" type="button">Save</button>
                  <button class="btn btn-secondary pull-right" id="btnCancel" type="button">Cancel</button>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('/jsmodule/user/user-menu.js') }}"></script>
@endsection