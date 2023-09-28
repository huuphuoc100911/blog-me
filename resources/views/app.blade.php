<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Photozone - Photo Studio Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/vue/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- assets/vue/libraries Stylesheet -->
    <link href="assets/vue/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/vue/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vue/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/vue/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/vue/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <div id="app">
        <router-view />
    </div>

    <!-- JavaScript assets/vue/libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vue/lib/wow/wow.min.js"></script>
    <script src="assets/vue/assets/vue/lib/easing/easing.min.js"></script>
    <script src="assets/vue/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/vue/lib/counterup/counterup.min.js"></script>
    <script src="assets/vue/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/vue/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/vue/js/main.js"></script>
    <script src="main.js"></script>
</body>

</html>
