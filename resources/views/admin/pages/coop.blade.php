<?php use App\Helpers\Functions; ?>

@if (request()->query('status') === 'success' && request()->query('user_id'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showSuccess(
                "{{ request()->query('user_id') }} was successfully created!"
            ); //SHOW SUCCESS MESSAGE VIA TOASTER.JS
        });
    </script>
@elseif (request()->query('status') === 'error' && request()->query('user_id'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showError(
                "{{ request()->query('user_id') }} was not created!"
            ); //SHOW ERROR MESSAGE VIA TOASTER.JS
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
                    <h1>{{ __('COOP') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Coop</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                            <div class="d-flex flex-column">
                                <h3 class="card-title">Coop Users</h3>
                                <a href="{{ route('pages.create_coop') }}" class="pt-2">
                                    <button class="btn btn-primary">Registration</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-striped table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Authorized Representative</th>
                                            <th>Email</th>
                                            <th>User Role</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Update Record</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coop as $coop)
                                            <tr>
                                                <td  class="align-middle">{{ $coop->user_id }}</td>
                                                <td class="align-middle">
                                                    <img src="{{ $coop->profile_picture ? URL::to('/storage') . '/' . $coop->profile_picture : asset('images/icons8-user.png') }}" alt="Profile" class="table-avatar" onerror="this.onerror=null;this.src='{{ asset('images/icons8-user.png') }}">
                                                    {{ $coop->coop_representative_personel }}
                                                </td>
                                                <td class="align-middle">{{ $coop->email }}</td>
                                                <td class="align-middle"><span id="status-badgeRole"
                                                        class="badge badge-pill fontcolor-white {{ Functions::userrole_color($coop->user_role) }}">{{ $coop->user_role }}</span>
                                                </td>
                                                <td class="align-middle"><span id="status-badgeStatus"
                                                        class="badge badge-pill {{ Functions::status_color($coop->status) }}">{{ $coop->status }}</span>
                                                </td>
                                                <td class="align-middle">{{ Functions::GetDateInterval($coop->created_at)  === "More than a week ago" ? $coop->created_at :  Functions::GetDateInterval($coop->created_at)}}</td>
                                                <td class="align-middle"><a href="#" class="btn btn-tool"><i
                                                            class="fas fa-pen"></i></a><a href="#"
                                                        class="btn btn-tool"><i
                                                            class="fas fa-check color-success"></i></a><a href="#"
                                                        class="btn btn-tool"><i class="fas fa-trash color-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
