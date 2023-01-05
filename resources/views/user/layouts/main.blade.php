<!doctype html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="{{ asset('image/deltacorp.png') }}">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

   <!-- icon bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

   {{-- sweetalert --}}
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   @include('user.layouts.parts.link-head')

   @yield('css')

   <title>DeltaCorp | {{ $title }}</title>
   
</head>

<body>
   
   @if (session()->has('success'))
   <script type='text/javascript'>
      Swal.fire({
         title: 'Success!',
         text: '{{ session('success') }}',
         icon: 'success',
         confirmButtonColor: '#3085d6',
         confirmButtonText: 'OK'
      })
   </script>
   @endif

   <!-- End header area -->
   @include('user.layouts.parts.header')

   <!-- End site branding area -->
   @include('user.layouts.parts.branding-area')

   <!-- End mainmenu area -->
   @include('user.layouts.parts.main-menu')

   @yield('slidder')

   <div class="container mt-2">
      
      @yield('container')
   </div>

   <!-- End brands area -->
   @include('user.layouts.parts.brands-area')


   <!-- End footer bottom area -->
   @include('user.layouts.parts.footer')

   <!--End script-body-->
   @include('user.layouts.parts.script-body')

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>

   @yield('custom-script')
</body>

</html>
