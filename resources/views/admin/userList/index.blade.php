@extends('admin.layouts.main')
@section('container')

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Users</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List All Users</li>
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
              <div class="card">

                <div class="card-header">
                  <h3 class="card-title">List All Users</h3>
                </div>
                <!-- /.card-header -->

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $i = 1; ?>
                      @foreach ($users as $user)
                      <tr class="text-center">
                        

                      
                          <?php
                            switch ($user['is_admin']) {
                            case ('1'):
                            echo '';
                            break;
                            case ('0' ):
                            ?>
                            <td>{{ $i++; }}</td>
                            <td>{{ $user["username"]; }}</td>
                            <td>{{ $user["email"]; }}</td>
                            <td><a href="{{ url('admin/userList/'.$user['id']) }}" class="btn btn-sm btn-info update-link"><i class="fas fa-info-circle"></i></a></td>
                            <?php
                            break;            
                            }
                          ?>
                      </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card -->
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
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    jQuery(document).ready(function($) {
      $('.delete-link').on('click', function() {
        var getLink = $(this).attr('href');

        Swal.fire({
          title: 'Warning!',
          text: 'Are you sure you want to delete it? data will be lost',
          type: 'warning',
          // html:true,
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Yes, Delete It!',
          allowOutsideClick: false
        }).then((result) => {
          if (result.value) {
            Swal.fire({
              title: 'Success!',
              text: 'One Admin has been deleted',
              type: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK',
              allowOutsideClick: false
            }).then((result) => {
              if (result.value) {
                window.location.href = getLink;
              }
            })

          }
        });
        return false;
      });
    });

    jQuery(document).ready(function($) {
      $('.update-link').on('click', function() {
        var getLink = $(this).attr('href');

        Swal.fire({
          title: 'Info',
          text: 'Do you want to see this user details?',
          type: 'question',
          // html:true,
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            window.location.href = getLink;
          }
        });
        return false;
      });
    });
  </script>
@endsection