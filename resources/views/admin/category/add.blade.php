@extends('admin.layouts.main')
@section('container')
    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add New Category</li>
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
                  <h3 class="card-title">Add New Category</h3>
                </div>
                <div class="card-body">
                  <form class="row needs-validation" novalidate method="post" action="/admin/category" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required>
                          <div class="invalid-feedback">
                            Please provide a valid Category Name.
                          </div>
                        </div>
                      </div>
                    </div>

                        <div class="row">
                          <div class="col-md-3 mx-auto d-block">
                            <img class="rounded" src="#" alt="" id="show-image" style="width: 100%;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group ">
                        <button type="submit" class="btn btn-primary  start" name="tambah">
                          <i class="fas fa-upload"></i>
                          <span> Add New Category</span>
                        </button>
                        <a href="index.php" class="btn btn-warning  cancel">
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

 
@endsection