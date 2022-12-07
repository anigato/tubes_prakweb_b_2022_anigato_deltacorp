<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   {{-- bootstrap css --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   {{-- fontawesome --}}
   <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
   </link>

   {{-- jquery --}}
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   {{-- sweetalert --}}
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   {{-- custom css login --}}
   <link rel="stylesheet" href="theme/frontend/css/login.css">
   <title>DeltaCorp | {{ $title }}</title>
</head>

<body>

   @if (session()->has('loginError'))
      <script type='text/javascript'>
         Swal.fire({
               title: 'Maaf!',
               text: '{{ session('loginError') }}',
               icon: 'error',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'OK'
         })
      </script>
   @endif

   <div class="login-reg-panel">
      <div class="login-info-box">
         <h2>Anda Memiliki Akun?</h2>
         <p>Klik tombol dibawah untuk masuk</p>
         <label id="label-register" for="log-reg-show">Masuk</label>
         <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
      </div>

      <div class="register-info-box">
         <h2>Tidak memiliki Akun?</h2>
         <p>Daftar sekarang dengan klik tombol dibawah</p>
         <label id="label-login" for="log-login-show">Daftar</label>
         <input type="radio" name="active-log-panel" id="log-login-show">
      </div>

      <div class="white-panel">
         <div class="login-show">
               <h2>MASUK</h2>
               <form action="/login" method="post">
                  @csrf
                  <input type="hidden" name="is_admin" readonly value="0">

                  <input type="email" name="email" id="email" placeholder="name@example.com" autofocus
                     required value="{{ old('email') }}">
                  @error('email')
                     <div class="invalid-feedback">
                           {{ $message }}
                     </div>
                  @enderror

                  <input type="password" name="password" id="password" placeholder="Password" required>

                  <button type="submit" name="login" class="submit">Masuk</button>

                  <a href="">Lupa password?</a>
               </form>
               <div class="panel-small-device">
                  <h2>Tidak memiliki Akun?</h2>
                  <p>Daftar sekarang dengan klik tombol dibawah</p>
                  <label id="label-login" for="log-login-show">Daftar</label>
                  <input type="radio" name="active-log-panel" id="log-login-show">
               </div>
         </div>

         {{-- form register --}}
         <div class="register-show">
               <h2>DAFTAR AKUN BARU</h2>
               <form action="/register" method="post">
                  @csrf

                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                     id="name"placeholder="Nama" required value="{{ old('name') }}">

                  <input type="text" name="username"
                     class="form-control @error('username') is-invalid @enderror"id="username"
                     placeholder="Username" required value="{{ old('username') }}">

                  <input type="email" name="email"
                     class="form-control @error('email') is-invalid @enderror"id="email"
                     placeholder="name@example.com" required value="{{ old('email') }}">

                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror="
                     id="password" placeholder="Password" required>

                  <input type="password" name="confirmPassword"
                     class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword"
                     placeholder="confirmPassword" required>

                  @error('name')
                     <div class="invalid-feedback">
                           {{ $message }}
                     </div>
                  @enderror
                  @error('username')
                     <div class="invalid-feedback">
                           {{ $message }}
                     </div>
                  @enderror
                  @error('email')
                     <div class="invalid-feedback">
                           {{ $message }}
                     </div>
                  @enderror
                  @error('password')
                     <div class="invalid-feedback">
                           {{ $message }}
                     </div>
                  @enderror
                  @error('confirmPassword')
                     <div class="invalid-feedback">
                           {{ $message }}
                     </div>
                  @enderror

                  <button type="submit" name="register" class="submit">Daftar</button>
               </form>
               <div class="panel-small-device">
                  <h2>Anda Memiliki Akun?</h2>
                  <p>Klik tombol dibawah untuk masuk</p>
                  <label id="label-register" for="log-reg-show">Masuk</label>
                  <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
               </div>
         </div>
      </div>
   </div>

   {{-- boostrap js --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>

   <script src="theme/frontend/js/login.js"></script>
</body>
