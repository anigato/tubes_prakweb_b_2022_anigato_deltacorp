<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/frontend/about_us.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <title>About Us</title>
</head>
<body>
    {{-- Main Content --}}

    <div class="container">
        <h1>About Us</h1>
        <a href="{{ url('/') }}"class="btn btn-sm btn-secondary"><i class="fas fa-reply"></i></a>

        <hr class="hr">

        <div class="delta">
            <img src="{{ asset('image/deltacorp.png') }}" alt="">
        <h2><span class="d">Delta</span> <span class="c">Corp</span></h2>
        </div>

    </div>

<div class="container">
    <div class="row" >

        <h3>Team ANIGATO</h3>

        <div class="col-lg-3 col-md-6 col-sm-6 mt-6">
            <div class="card bg-white  d-flex align-items-center justify-content-center ">
                <div class="w-100" ><img src="{{ asset('image/khoerul.jpg') }}"></div>
                <div class="text-center ">
                    <p class="name">Khoerul Anam</p>
                    <p class="job">Project Manager</p>
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon mx-2"><span class="fab fa-facebook"></span></li>
                        <li class="icon "><a style="text-decoration: none; color: white;   " href="https://www.instagram.com/yt.anigato/" rel="stylesheet"><span class="fab fa-instagram"></span></a>
                    </ul>
                    <p class="dis pb-4" >203040096</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-80">
            <div class="card bg-white  d-flex align-items-center justify-content-center">
                <div class="w-100"><img src="{{ asset('image/qisty.jpg') }}" alt="" class="rounded-circle"></div>
                <div class="text-center ">
                    <p class="name">Qisty Izzatussyabani</p>
                    <p class="job">Front-End</p>
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon mx-2"><span class="fab fa-facebook"></span></li>
                        <li class="icon "><a style="text-decoration: none; color: white;   " href="https://www.instagram.com/qistiizatus_/" rel="stylesheet"><span class="fab fa-instagram"></span></a>
                    </ul>
                    <p class="dis pb-4" >203040083</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-80">
            <div class="card bg-white  d-flex align-items-center justify-content-center">
                <div class="w-100"><img src="{{ asset('image/zay.jpg') }}"></div>
                <div class="text-center ">
                    <p class="name">Muhammad Anendha Zaska</p>
                    <p class="job">Back-End</p>
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon mx-2"><span class="fab fa-facebook"></span></li>
                        <li class="icon "><a style="text-decoration: none; color: white;   " href="https://www.instagram.com/zay.nvr/" rel="stylesheet"><span class="fab fa-instagram"></span></a>
                    </ul>
                    <p class="dis pb-4" >203040090</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-80">
            <div class="card bg-white  d-flex align-items-center justify-content-center">
                <div class="w-100"><img src="{{ asset('image/fakih.jpg') }}"></div>
                <div class="text-center ">
                    <p class="name">Fakih Favian Wibowo</p>
                    <p class="job">Back-End</p>
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon mx-2"><span class="fab fa-facebook"></span></li>
                        <li class="icon "><a style="text-decoration: none; color: white;   " href="https://www.instagram.com/fakihfavian/" rel="stylesheet"><span class="fab fa-instagram"></span></a>
                    </ul>
                    <p class="dis pb-4" >203040073</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
