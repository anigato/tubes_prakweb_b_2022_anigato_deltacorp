<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN Panel</title>
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
              <h1>User Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List All user</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row gutters-sm">
            <div class="col-lg-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">

                    <div class="mt-3">
                      <h4></h4>
                      <p class="text-secondary mb-1"></p>
                      <p class="text-muted font-size-sm"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-md-7 text-secondary">{{ $user->username }}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-5">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-md-7 text-secondary">{{ $user->name }}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-5">
                      <h6 class="mb-0">Nama Panggilan</h6>
                    </div>
                    <div class="col-md-7 text-secondary"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-5">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-md-7 text-secondary">{{ $user->email }}</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row gutters-sm">
                <div class="col-md-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Alamat</i>Pengiriman Anda</h6>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Nama / Nomor Rumah</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Nomor Telp.</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">RT</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">RW</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Dusun</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Desa</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Kecamatan</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Kabupaten</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Provinsi</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-5">
                          <h6 class="mb-0">Kode POS</h6>
                        </div>
                        <div class="col-md-7 text-secondary"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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


  @include('admin.layouts.parts.script-body')
</body>

</html>