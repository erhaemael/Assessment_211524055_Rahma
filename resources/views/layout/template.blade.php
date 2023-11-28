<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PUJASERA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('dashmin')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('dashmin')}}/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">PUJASERA</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="{{ url('barang') }}" class="nav-item nav-link"><i class="fas fa-address-card"></i>Barang</a>
                  </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('kasir') }}" class="nav-item nav-link"><i class="fas fa-file"></i>Kasir</a>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('tenan') }}" class="nav-item nav-link"><i class="fas fa-user-graduate"></i>Tenan</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
            </nav>
            <!-- Navbar End -->
            <main class="container">
              @yield('konten')
            </main>
        </div>
        <!-- Content End -->

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('dashmin')}}/lib/chart/chart.min.js"></script>
    <script src="{{asset('dashmin')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('dashmin')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('dashmin')}}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset('dashmin')}}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{asset('dashmin')}}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{asset('dashmin')}}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('dashmin')}}/js/main.js"></script>
</body>

</html>
