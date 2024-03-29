<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>دكة</title>

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

    @stack('styles')
</head>

<body>
    <div id="app">
        <!--
        <div id="preloader">
            <div id="preloader-circle">
                <span></span>
                <span></span>
            </div>
        </div>
        -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Dakkah</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item"><a href="{{ url('/trainer') }}" data-scroll-nav="3">المدربين</a></li>
      <li class="nav-item"><a href="{{ url('/course') }}" data-scroll-nav="3">دورات</a></li>
      <li class="nav-item"><a href="{{ url('/register') }}" data-scroll-nav="4">طلب الإنضمام</a></li>
      <li class="nav-item"><a href="{{ url('/login') }}" data-scroll-nav="4">تسجيل الدخول</a></li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
  </div>
</nav>
        @yield('content')
        <!-- Start Footer Area -->
        <footer>
            <div class="shape-top"></div>
            <div class="container">
                <!-- End Footer Top  Area -->
                <div class="top-footer">
                    <div class="row">
                        <!-- Start Column 1 -->
                        <div class="col-md-4">
                            <div class="footer-logo">
                                <img src="img/logo.png" class="img-fluid" alt="Img" />
                            </div>
                            <p>
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت
                            </p>
                            <div class="footer-social-links">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter-alt"></i></a>
                                <a href="#"><i class="ti-instagram"></i></a>
                                <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>
                        <!-- End Column 1 -->

                        <!-- Start Column 2 -->
                        <div class="col-md-2">
                            <h4 class="footer-title">روابط مهمه</h4>
                            <ul class="footer-links">
                                <li><a href="index.html">الرئيسية</a></li>
                                <li><a href="about-us.html">من نحن</a></li>
                                <li><a href="contact-us.html">اتصل بنا</a></li>
                                <li><a href="reviews.html">الأراء</a></li>
                                <li><a href="faqs.html">الأسئلة المتكررة</a></li>
                                <li><a href="blog-1.html">المقالات</a></li>
                            </ul>
                        </div>
                        <!-- End Column 2 -->

                        <!-- Start Column 3 -->
                        <div class="col-md-2">
                            <h4 class="footer-title">حساب المستخدم</h4>
                            <ul class="footer-links">
                                <li><a href="signin.html">تسجيل الدخول</a></li>
                                <li><a href="signup.html">مستخدم جديد</a></li>
                                <li><a href="recover-account.html">استعادة الحساب</a></li>
                                <li><a href="recover-account.html">تغير كلمة المرور</a></li>
                                <li><a href="error-404.html">404 صفحة الخطأ</a></li>
                                <li><a href="coming-soon.html">صفحة الظهور قريبا</a></li>
                            </ul>
                        </div>
                        <!-- End Column 3 -->

                        <!-- Start Column 4 -->
                        <div class="col-md-4">
                            <h4 class="footer-title">الرسائل الاخبارية</h4>
                            <p>
                                اشترك في النشرة الإخبارية للحصول على التحديث الخاص بك. نحن لا نرسل البريد الإلكتروني الممتد إليك.
                            </p>
                        </div>
                        <!-- End Column 4 -->
                    </div>
                </div>
                <!-- End Footer Top  Area -->

                <!-- Start Copyrights Area -->
                <div class="copyrights">
                    <p>Copyrights © 2020. Designed by  <i class="flaticon-like-2"></i> <a href="https://elmanawy.info">Marwa El-Manawy</a>.</p>
                </div>
                <!-- End Copyrights Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    @stack('scripts')
</body>

</html>