<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN Panel | Add New slidder</title>
  <!-- trix editor -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  @include('admin.layouts.parts.link-header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    @include('admin.layouts.parts.navbar')
    <!-- endnavbar -->

    <!-- sidebar -->
    @include('admin.layouts.parts.sidebar')
    <!-- endsidebar -->

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>slidder</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add New slidder</li>
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
                  <h3 class="card-title">Add New slidder</h3>
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
                            <option value="1" selected>1</option>
                            <option value="2" selected>2</option>
                            <option value="3" selected>3</option>

                          </select>
                          <div class="invalid-feedback">
                            Please provide a valid slidder Name.
                          </div>
                        </div>
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


    <!-- footer -->
    @include('admin.layouts.parts.footer')
    <!-- endfooter -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

  </div>

  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../../../themes/js/input-form/bs-custom-file-input.min.js"></script>
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
    // select2
    $(function() {
      bsCustomFileInput.init();
    });

    //Initialize Select2 Elements
    $('.select2').select2()
  </script>
</body>

</html>