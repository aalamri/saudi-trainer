<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>المدربين السعوديين</title>

    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="/css/animate.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <!-- Light Case -->
    <link rel="stylesheet" href="/css/lightcase.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div id="main">
    <!-- <div id="preloader">
                    <div id="preloader-circle">
                        <span></span>
                        <span></span>
                    </div>
                </div> -->
    <nav class="navbar navbar-expand-md">
        <div class="container">
        <div class="site-logo"><a class="navbar-brand" href="/"><img src="img/logo.png" class="img-fluid" alt="Img" /></a></div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ url('/') }}" data-scroll-nav="7">الرئيسية</a></li>
                    <li class="nav-item"><a href="#" data-scroll-nav="1">من نحن</a></li>
                    <li class="nav-item"><a href="{{ url('/trainer') }}" data-scroll-nav="3">المدربين</a></li>
                    <li class="nav-item"><a href="{{ url('/register') }}" data-scroll-nav="4">طلب الإنضمام</a></li>
                    <li class="nav-item"><a href="{{ url('/login') }}" data-scroll-nav="4">تسجيل الدخول</a></li>
                    <li class="nav-item"><a href="#" data-scroll-nav="4">اتصل بنا</a></li>
                </ul>
                <div class="flex item-left">
                    <div class="relative">
                        <input type="text">

                    </div>
                </div>
            </div>
        </div>
    </nav>
    </div>
    @yield('content')
</body>

</html>