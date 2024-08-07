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
              <li class="breadcrumb-item active"><a href="{{ route('pages.merchant') }}">Merchant</a></li>
              <li class="breadcrumb-item active">Create Merchant</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          showError('Error processing merchant record.'); //SHOW WARNING MESSAGE VIA TOASTER.JS
        });
      </script>
      <!--div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div-->
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
                       <!-- general form elements -->
                       <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Merchant</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('create.merchant') }}" enctype="multipart/form-data">
              @csrf
              @method('post')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" placeholder="Enter name" value="{{ old('name') }}">
                    <p class="text-danger">
                      @error('name')
                        {{$message}}
                      @enderror 
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" id="address" placeholder="Enter address" value="{{ old('address') }}">
                    <p class="text-danger">
                      @error('address')
                        {{$message}}
                      @enderror 
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : ''}}" id="contact_number" placeholder="Enter contact" value="{{ old('contact_number') }}">
                    <p class="text-danger">
                      @error('contact_number')
                        {{$message}}
                      @enderror 
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" placeholder="Enter email" value="{{ old('email') }}">
                    <p class="text-danger">
                      @error('email')
                        {{$message}}
                      @enderror 
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" id="username" placeholder="Enter Username" value="{{ old('username') }}">
                    <p class="text-danger">
                      @error('username')
                        {{$message}}
                      @enderror 
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" placeholder="Password">
                    <p class="text-danger">
                      @error('password')
                        {{$message}}
                      @enderror 
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" placeholder="Password">
                    <p class="text-danger">
                      @error('password')
                        {{$message}}
                      @enderror 
                    </p>
                  </div>
                  <!-- <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_picture">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="valid_id_picture">Valid ID</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="valid_id_picture">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection