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
            text: '{{ session('
            loginError ') }}',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        })
    </script>
    @endif

    <div class="main">
        <input type="checkbox" id="logReg" aria-hidden="true">

        <div class="login">
            <form action="{{ route('loginAdmin') }}" method="post">
                <label for="logReg" aria-hidden="true">Masuk</label>
                @csrf
                <input type="hidden" name="is_admin" readonly value="1">

                <input type="email" name="email" class="@error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <input type="password" name="password" id="password" placeholder="Password" required>

                <button type="submit">Masuk</button>
            </form>
        </div>





        <!-- <div class="login-reg-panel">
            <div class="white-panel">
                <div class="login-show show-log-panel mt-5">
                    <h2>MASUK</h2>
                    <form action="{{ route('loginAdmin') }}" method="post">
                        @csrf
                        <input type="hidden" name="is_admin" readonly value="1">

                        <input type="email" name="email" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">

                        <input type="password" name="password" id="password" placeholder="Password" required>

                        <button type="submit" name="login" class="submit">Masuk</button>

                    </form>
                </div>
            </div>
        </div> -->
</body>