@extends('admin.layouts.main')
@section('container')

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Brand</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List All Brand</li>
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
                  <h3 class="card-title">List All Brand</h3>
                </div>
                <!-- /.card-header -->

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>PRODUCT</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      @foreach ($slidders as $slidder)
                      <tr class="text-center">
                        <td>{{ $i++; }}</td>
                        <td>
                          {{ $slidder->product->name }}
                        </td>
                        <td>{{ $slidder["title"]; }}</td>
                        <td>{{ $slidder["description"]; }}</td>
                        <td>
                          <?php
                          switch ($slidder["status"]) {
                            case 0:
                              echo "Inactive";
                              break;
                            case 1:
                              echo "Active";
                              break;
                          } ?>
                        </td>

                        <td>
                          <a href="{{ url ('admin/slidder/' .$slidder['id'].'/edit') }}" class="btn btn-sm btn-info update-link"><i class="fas fa-pencil-alt"></i></a>

                          <form action="{{ url('admin/slidder/'.$slidder['id']) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>

                          

                        <?php
                        switch ($slidder["status"]) {
                          case 0:
                            ?>  
                            <form action="{{ url('admin/slidder/'.$slidder['id'].'/inactive') }}" method="post" class="d-inline">
                              @method('put')
                              @csrf
                              <input type="hidden" name="status" value="1">
                              <button class="btn btn-sm btn-success status-link"><i class="fas fa-eye"></i></button>
                            </form>
                            <?php
                            break;
                          case 1:
                          ?>  
                            <form action="{{ url('admin/slidder/'.$slidder['id'].'/inactive') }}" method="post" class="d-inline">
                              @method('put')
                              @csrf
                              <input type="hidden" name="status" value="0">
                              <button class="btn btn-sm btn-warning status-link"><i class="fas fa-eye-slash"></i></button>
                            </form>
                            <?php
                            break;
                        } ?>

                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>PRODUCT</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>STATUS</th>
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
              text: 'One Brand has been deleted',
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
          title: 'Warning!',
          text: 'Are you sure you want to edit it?',
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