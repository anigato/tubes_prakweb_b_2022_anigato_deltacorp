@extends('admin.layouts.main')
@section('container')
        <!-- Main content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>slidder</h1>
                </div>
                <div class="card-body">
                  <form class="row needs-validation" novalidate method="post" action="/admin/slidder" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Product</label>
                        <div class="input-group mb-3">
                          <select class="custom-select" name="product_id" required>
                            <option value="" disabled selected>Choose Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                            @endforeach

                          </select>
                          <div class="invalid-feedback">
                            Please provide a valid slidder Name.
                          </div>
                        </div>
    
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Title</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                              <div class="invalid-feedback">
                                Please provide a valid Brand Title.
                              </div>
                            </div>
                          </div>
                        </div>
    
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="description">Description</label>
                            <input id="description" type="hidden" name="description">
                            <trix-editor input="description"></trix-editor>
                          </div>
                        </div>
    
                        <div class="col-md-12">
                          <div class="form-group ">
                            <button type="submit" class="btn btn-primary  start" name="tambah">
                              <i class="fas fa-upload"></i>
                              <span> Add New slidder</span>
                            </button>
                            <a href="{{ url('admin/slidder/') }}" class="btn btn-warning  cancel">
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
@section('script-custom')
    
  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    // select2
    $(function() {
      bsCustomFileInput.init();
    });

    //Initialize Select2 Elements
    $('.select2').select2()
  </script>
@endsection