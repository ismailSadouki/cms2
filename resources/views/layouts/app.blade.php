<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <!-- Styles -->

    <style>
        a,
        a:hover
        {
            text-decoration: none;
            color: black;
        }
        .form-control:focus
        {
            box-shadow: none;
        }
        .navbar 
        {
            font-weight: bold;
            background-color: #214462 !important;
            top: -1px;
            left: 0;
            right: 0;
            width: 100%;
            background: var(--bs-secondary);
            z-index: 999; 
          
        }
        .navbar-nav .nav-item .nav-link.active 
        {
            color: #02cfaa ;
        }
        .navbar-nav .nav-item .nav-link 
        {
            color: white;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #02cfaa !important; 
            cursor: pointer;
        }
        .navbar-nav .nav-item .dropdown-menu
        {
            border-width: 0;
            border-radius: 0;
        }
        
        section.home
        {
            background: url({{isset($setting->image_main) ? asset('images/'.$setting->image_main) : asset('images/bg.jpg')}}) no-repeat scroll center center;
            background-size: auto;
            background-size: cover;
            position: relative;
            padding-top: 300px;
            padding-bottom: 190px;
            width: 100%;
            overflow: hidden;
        }
        section.home .overlay 
        {
            background-color: rgba(24, 23, 20, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
        }
        .breadcrumb-content {
            color: white;
        }
        breadcrumb-heading h3
        {
            text-align: center;
            margin-bottom: 0.75rem;
            color: white;
            display: inline !important;
            font-weight: bold
        }

        .breadcrumb-content ol 
        {
            text-align: center;
            display: inline ;
            padding: 0.438rem 0.834rem 0.438rem 0.5rem;
            border-radius: 6.25rem;
            background-color:  #02cfaa; 
            padding: 10px;

        }
        .breadcrumb-content ol li
        {
            display: inline;
            font-weight: bold
        }
        .breadcrumb-content ol li a i 
        {
            background-color: white;
            color: #02cfaa;
            border-radius: 50%;
            font-size: 13px;
            padding: 8px;
            transition: .5s ease-in-out;
        }
        .breadcrumb-content ol li a i:hover 
        {
            background-color: #214462;
        }
        @media(min-width: 991px)
        {
            .navbar {
                padding: 20px 80px !important;
            position: fixed;

            }
            .navbar-nav .nav-item .dropdown-menu
            {
                border-bottom: 5px solid #02cfaa;
            }
        }
        /* @media(max-width: 991px)
        {
            .navbar {
                position: inline !important;
            }
        } */

        .dropdown-menu .nav-item .nav-link 
        {
            color:#1e2125;
            text-align: inherit;
            font-weight: 400;
            clear: both;
        }

        nav.navbar
        {
            background-color: {{$setting['background_nav'] ?? '#214462'}} !important;

        }
        main
        {
            background-color:{{$setting['background_main'] ?? '#ffffff'}} !important;

        }
        #app 
        {
            background-color:{{$setting['background_main'] ?? '#ffffff'}} !important;
            
               
            
        }
        footer
        {
            background-color:{{$setting['background_footer'] ?? '#323232'}} !important;
            
        }
        footer .contact .overlay
        {
            background-color:{{$setting['background_footer'] ?? '#323232'}} !important;

        }

        .card_color
        {
            background-color: {{$setting['card_color'] ?? '#ffffff'}} !important;
        }

        .card_com_pos_nav
        {
            background-color: {{$setting['card_com_pos_nav'] ?? '#214462'}} !important;
        }
        .card_com_pos_body
        {
            background-color: {{$setting['card_com_pos_body'] ?? '#ffffff'}} !important;
        }





        
        
    </style>

    @yield('style')

</head>
<body dir="rtl">
    <div id="app">
        @include('layouts.navbar')

        <section class="home">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="breadcrumb-content">
                            
                            <ol >
                                <li>
                                    <a href="/">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li>الرئيسية</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <main class="py-4 mt-5">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            @include('alerts.success')
                            @yield('content')
                        </div>


                    <div class="col-md-12 col-lg-4">
                        @include('layouts.sidebar')
                    </div>
                </div>
            </div>
            </section>
        </main>


        @include('layouts.footer')
    </div>


    <script src="https://kit.fontawesome.com/dc9e78ad18.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    {{-- <script>
          $(document).on("scroll", function(){
        if($(document).scrollTop() > 100){
          $(".navbar").animate({
            backgroundColor: 'red'
          }, 5000);
        } else {
          $(".navbar").removeClass("shrink");
        }
      });
    </script> --}}

            <!-- include summernote css/js-->
           
    @yield('script')
</body>
</html>
