

@extends('admin.layouts.main')
@section('container')
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>User Admin</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit User Admin</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Edit User Admin</h3>
                                </div>
                                <div class="card-body">
                                    <form class="row needs-validation" novalidate method="post" action="/admin/userAdmin/{{ $user->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Name</label>
                                              <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="{{ old('name', $user->name) }}">
                                                <div class="invalid-feedback">
                                                  Please provide a Name here.
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Username</label>
                                              <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="User Name" required readonly value="{{ old('username', $user->username) }}">
                                                <div class="invalid-feedback">
                                                  Please provide a Username here.
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Email</label>
                                              <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required value="{{ old('email', $user->email) }}">
                                                <div class="invalid-feedback">
                                                  Please provide a Email name here.
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Old Password</label>
                                              <div class="input-group mb-3">
                                                <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Old Password" required value="">
                                                <div class="invalid-feedback">
                                                  Please provide a Password here.
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>New Password</label>
                                              <div class="input-group mb-3">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="New Password" required value="">
                                                <div class="invalid-feedback">
                                                  Please provide a New Password here.
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Confirm Password</label>
                                              <div class="input-group mb-3">
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password" required value="">
                                                <div class="invalid-feedback">
                                                  Please Confirm your Password here.
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                       
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <button type="submit" class="btn btn-primary  start" name="tambah">
                                                    <i class="fas fa-upload"></i>
                                                    <span> Add New User Admin</span>
                                                </button>
                                                <a href="{{ url('admin/userAdmin/') }}" class="btn btn-warning  cancel">
                                                    <i class="fas fa-times-circle"></i>
                                                    <span> Cancel</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- end main content -->
        @endsection

        <!-- footer -->
        @include('admin.layouts.parts.footer')
        <!-- endfooter -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>

    <!-- bs-custom-file-input -->
    <script src=" {{ asset('theme/backend/js/input-form/bs-custom-file-input.min.js') }}"></script>
   
    @include('admin.layouts.parts.script-body')
   

    <!-- Page specific script -->
    <script>
        // validasi form
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        // menampilkan gambar ketika dipilih
        function showImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-image')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        
    </script>
</body>

</html>