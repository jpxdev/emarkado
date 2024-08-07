<?php use App\Helpers\Functions; ?>

<!-- GET URL VARIABLES STATUS AND USER_ID -->
  @if (request()->query('status') === 'success' && request()->query('user_id'))
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    showSuccess("{{ request()->query('user_id') }} was successfully created!"); //SHOW SUCCESS MESSAGE VIA TOASTER.JS
  });
  </script>
  @endif

@extends('admin.main-layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('MERCHANT') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Merchant</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <!-- MERCHANT TABLE -->
        <div class="card">
              <div class="card-header border-transparent">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>

                <div class="d-flex flex-column">
                    <h3 class="card-title">Merchant Users</h3>
                    <a href="{{ route('pages.create_merchant') }}" class="pt-2">
                        <button class="btn btn-primary">Registration</button>
                    </a>
                </div>



              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-striped table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>User Role</th>
                      <th>Status</th>
                      <th>Update Record</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($merchants as $column)
                    <tr>
                        <td>{{$column->user_id}}</td>
                        <td>{{$column->name}}</td>
                        <td>{{$column->email}}</td>
                        <td><span id="status-badgeRole" class="badge badge-pill fontcolor-white {{ Functions::userrole_color($column->user_role) }}">{{$column->user_role}}</span></td>
                        <td><span id="status-badgeStatus" class="badge badge-pill {{ Functions::status_color($column->status) }}">{{$column->status}}</span></td>
                        <td class="align-middle"><a href="#" class="btn btn-tool"><i class="fas fa-pen"></i></a><a href="#" class="btn btn-tool"><i class="fas fa-check color-success"></i></a><a href="#" class="btn btn-tool"><i class="fas fa-trash color-danger"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
          </div> <!-- /.card-body -->
          <!-- /.MERCHANT TABLE -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
