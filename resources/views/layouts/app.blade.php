<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>UmFinance - Home</title>
<meta name="title" content="@yield('meta_title', 'Default Title')">
<meta name="keywords" content="@yield('meta_keywords', 'Default description')">
<meta name="description" content="@yield('meta_description', 'Default description')">
<link rel="canonical" href="@yield('canonical_url', env('APP_URL'))">
<!-- Open Graph Tags -->
<meta property="og:title" content="@yield('og_title' , 'default og title')">
<meta property="og:description" content="@yield('og_description' , 'default og description')">
<meta property="og:image" content="@yield('og_image' , 'default og image')">
<meta name="author" content="">
<base href="/">
<!-- Site Icons -->
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="assets/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="assets/css/colors.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
</head>

<body>
    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="assets/images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper" style="overflow-x: hidden">
        <!-- include topbar here -->
        @include('partials.topbar')

        {{-- yeild here --}}

        @yield('content')
        <div class="dmtop" style="overflow: hidden">Scroll to Top</div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Recent Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach (App\Services\DefaultService::recentBlogs() as $blog)
                                        <a href="{{route('blog.show' , $blog->slug)}}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{Storage::url($blog->image)}}" alt="{{$blog->image_alt}}"
                                                    class="img-fluid float-left" style="height: 80px;object-fit: cover">
                                                <h5 class="mb-1">{{$blog->title}}</h5>
                                                <small>{{Carbon\Carbon::parse($blog->published_at)->format('d M , Y')}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach (App\Services\DefaultService::popularPosts() as $post)
                                    <a href="single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{Storage::url($post->image)}}" alt="{{$post->image_alt}}"
                                                    class="img-fluid float-left" style="height: 80px;object-fit: cover">
                                            <h5 class="mb-1">{{$post->title}}</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            @include('partials.popular-categories')
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis1">

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="index.html"><img src="assets/images/flogo.png" alt=""
                                        class="img-fluid"></a>
                                <p>Cloapedia is a personal blog for handcrafted, cameramade photography content, fashion
                                    styles from independent creatives around the world.</p>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form class="form-inline">
                                        <input type="text" class="form-control"
                                            placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">Subscribe <i
                                                class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright">&copy; Created With ❤️ By Muhammad Awais.</a>
                        </div>
                        <div class="copyright">{{date('Y')}} All Rights Reserved .</a>
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
