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
    <link rel="stylesheet" href="../theme/backend/css/login.css">
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
    </div>

    {{-- boostrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
