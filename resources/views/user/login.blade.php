<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('theme/frontend/css/login-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <div class="main">
        <input type="checkbox" id="logReg" aria-hidden="true">

        <div class="login">
            <form action="{{ url('login') }}" method="post">
                <label for="logReg" aria-hidden="true">Masuk</label>
                @csrf
                <input type="hidden" name="is_admin" readonly value="0">

                <input type="text" name="username" id="username" placeholder="Username" autofocus required>

                <input type="password" name="password" id="password" placeholder="Password" required>
                
                <a href="{{ route('loginAdmin') }}">Are you Admin?</a>

                <button type="submit">Masuk</button>
            </form>
        </div>

        <div class="signup">
            <form action="{{ url('register') }}" method="post">
                <label for="logReg" aria-hidden="true">Daftar</label>
                @csrf
                <div>
                    <input type="text" name="name" class="@error('name') is-invalid @enderror" id="name"placeholder="Nama" value="{{ old('name') }}" required>
                    @error('name')
                        <div style="text-align:center;margin-top: -15px; margin-bottom: -15px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="username"
                        class="@error('username') is-invalid @enderror"id="username"
                        placeholder="Username" value="{{ old('username') }}" required>
                    @error('username')
                        <div style="text-align:center;margin-top: -15px; margin-bottom: -15px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <input type="email" name="email"
                        class="@error('email') is-invalid @enderror"id="email"
                        placeholder="email@contoh.com" value="{{ old('email') }}" required>
                    @error('email')
                        <div style="text-align:center;margin-top: -15px; margin-bottom: -15px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" class="@error('password') is-invalid @enderror="
                        id="password" placeholder="Password" required>
                    @error('password')
                        <div style="text-align:center;margin-top: -15px; margin-bottom: -15px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password_confirmation"
                        class="@error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" placeholder="Konfirmasi Password" required>
                    @error('password_confirmation')
                        <div style="text-align:center;margin-top: -15px; margin-bottom: -15px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit">Sign up</button>
            </form>
        </div>
    </div>
</body>
