<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Viral Story - Viral News Magazine Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <x-news.header></x-news.header>
    <!-- ##### Header Area End ##### -->
    <!-- ##### Blog Post Area Start ##### -->
    <div class="viral-story-blog-post section-padding-0-50">
        <div class="container">
            <div class="row">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <!-- Single Blog Post -->
                    @yield('content')
                </div>
                <!-- Sidebar Area -->
                <x-news.sidebar></x-news.sidebar>
            </div>
        </div>
    </div>
    <!-- ##### Blog Post Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   @include('components.news.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js')}}"></script>
</body>

</html>
