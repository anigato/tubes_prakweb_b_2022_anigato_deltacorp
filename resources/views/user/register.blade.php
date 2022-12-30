<!doctype html>
<html lang="en">

<head>
   <!--  meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   {{-- bootstrap css --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
      <div class="register-info-box">
         <h2>Anda Memiliki Akun?</h2>
         <p>Klik tombol dibawah untuk masuk</p>
         <a class="text-white" id="label-login" href="{{ route('loginUser') }}">Masuk</a>
      </div>

      <div class="white-panel">
         {{-- form register --}}
         <div class="register-show show-log-panel">
               <h2>DAFTAR AKUN BARU</h2>
               <form action="/register" method="post">
                  @csrf

                  <div>
                     <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"placeholder="Nama"  value="{{ old('name') }}" required>
                     @error('name')
                           <div class="invalid-feedback text-center" style="margin-top: -15px; margin-bottom: -15px">
                              {{ $message }}
                           </div>
                     @enderror
                  </div>

                  <div>
                     <input type="text" name="username"
                           class="form-control @error('username') is-invalid @enderror"id="username"
                           placeholder="Username"  value="{{ old('username') }}" required>
                     @error('username')
                           <div class="invalid-feedback text-center" style="margin-top: -15px; margin-bottom: -15px">
                              {{ $message }}
                           </div>
                     @enderror
                  </div>

                  <div>
                     <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"id="email"
                           placeholder="name@example.com"  value="{{ old('email') }}" required>
                     @error('email')
                           <div class="invalid-feedback text-center" style="margin-top: -15px; margin-bottom: -15px">
                              {{ $message }}
                           </div>
                     @enderror
                  </div>

                  <div>
                     <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror=" id="password"
                           placeholder="Password" required>
                     @error('password')
                           <div class="invalid-feedback text-center" style="margin-top: -15px; margin-bottom: -15px">
                              {{ $message }}
                           </div>
                     @enderror
                  </div>

                  <div>
                     <input type="password" name="password_confirmation"
                           class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                           placeholder="password_confirmation" required>
                     @error('password_confirmation')
                           <div class="invalid-feedback text-center" style="margin-top: -15px; margin-bottom: -15px">
                              {{ $message }}
                           </div>
                     @enderror
                  </div>

                  <button type="submit" name="register" class="submit mt-4">Daftar</button>
               </form>
               <div class="panel-small-device">
                  <h2>Anda Memiliki Akun?</h2>
                  <p>Klik tombol dibawah untuk masuk</p>
                  <a class="text-white" id="label-login" href="{{ route('loginUser') }}">Masuk</a>
               </div>
         </div>
      </div>
   </div>

   {{-- boostrap js --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>

</body>
