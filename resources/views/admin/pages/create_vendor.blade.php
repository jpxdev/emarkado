@extends('admin.main-layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('VENDOR') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('pages.vendor') }}">Vendor</a></li>
                        <li class="breadcrumb-item active">Registration</li>
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
                        <div class="card-header bg-primary">
                            <h4>Add New Vendor</h4>
                        </div>
                        <form id="vendorForm" action="{{ route('create.vendor') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Vendor name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        aria-describedby="name" name="name">
                                                    <div class="error-container text-danger mt-1" style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="business_name">Business name</label>
                                                    <input type="text" class="form-control" id="business_name"
                                                        aria-describedby="business_name" name="business_name">
                                                    <div class="error-container text-danger mt-1" style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address"
                                                        aria-describedby="address" name="address">
                                                    <div class="error-container text-danger mt-1" style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_number">Contact number</label>
                                                    <input type="text" class="form-control" id="contact_number"
                                                        aria-describedby="contact_number" name="contact_number">
                                                    <div class="error-container text-danger mt-1" style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control" id="email"
                                                        aria-describedby="email" name="email">
                                                    <div class="error-container text-danger mt-1" style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <label for="vendor_profile_picture">Profile picture</label>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="vendor_profile_picture"
                                                            name="vendor_profile_picture">
                                                        <label class="custom-file-label" for="vendor_profile_picture"
                                                            aria-describedby="vendor_profile_picture">Choose</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="vendor_profile_picture">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <label for="vendor_valid_id_picture">Valid ID
                                                    picture</label>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="vendor_valid_id_picture" name="vendor_valid_id_picture">
                                                        <label class="custom-file-label" for="vendor_valid_id_picture"
                                                            aria-describedby="vendor_valid_id_picture">Choose</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="vendor_valid_id_picture">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group mb-3">
                                                    <label for="agency_affiliation">Agency Affiliation</label>
                                                    <select class="custom-select" id="agency_affiliation"
                                                        name="agency_affiliation">
                                                        <option selected disabled>Are your business affiliated with any
                                                            government agencies?</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <div class="error-container text-danger mt-1"
                                                        style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div id="agency_affiliation_details" class="d-none">
                                                    <div class="form-group">
                                                        <label for="agency_affiliation_name">Agency Affiliation
                                                            Name</label>
                                                        <input type="text" id="agency_affiliation_name"
                                                            name="agency_affiliation_name" class="form-control">
                                                        <div class="error-container text-danger mt-1"
                                                            style="font-size: 12px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                        aria-describedby="username" name="username">
                                                    <div class="error-container text-danger mt-1"
                                                        style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        aria-describedby="password" name="password">
                                                    <div class="error-container text-danger mt-1"
                                                        style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="password" class="form-control"
                                                        id="password_confirmation"
                                                        aria-describedby="password_confirmation"
                                                        name="password_confirmation">
                                                    <div class="error-container text-danger mt-1"
                                                        style="font-size: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-5">Add</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/display_file_name.js') }}"></script>
@endpush
