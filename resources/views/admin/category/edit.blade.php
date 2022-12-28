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
                <li class="breadcrumb-item active">Update Category</li>
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
                  <h3 class="card-title">Update Category</h3>
                </div>
                <div class="card-body">
                  <form class="row needs-validation" novalidate method="post" action="/admin/category/{{ $category->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required value="{{ old('name', $category->name) }}">
                          <div class="invalid-feedback">
                            Please provide a Category Name.
                          </div>
                        </div>
                      </div>
                    </div>

                        
                    <div class="col-md-12">
                      <div class="form-group ">
                        <button type="submit" class="btn btn-primary  start">
                          <i class="fas fa-upload"></i>
                          <span> Update Category</span>
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
    