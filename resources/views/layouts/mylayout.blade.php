
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Hammersmith+One:400" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet"> -->

        <link href="{{URL::asset('bootstrap/css/font-awesome.min.css.css')}}" rel="stylesheet">

        <link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="css/aos.css">
        
         <link href="{{URL::asset('css/aos.css')}}" rel="stylesheet">

        <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet">


</head>

<body>

    @yield('content1')

    

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9 content-para about-para" data-aos-easing="ease-out-cubic" data-aos="fade-right" data-aos-duration="1000">
                    <p>we help you live in a better world</p>
                    <p>specialized in webdesign, wordpress development and much much more</p>
                </div>
                <div class="col-12 col-md-4 col-lg-3" data-aos-easing="ease-out-cubic" data-aos="fade-left" data-aos-duration="1000">
                    <a href="{{url('/')}}" class="service-btn f-r about-btn">find our more services</a>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid subscribe">
        <div class="gradient">
            <img src="images/gradient.jpg" alt="gradient" class="img-fluid">
        </div>
       

        </div>
       
    </section>



    
    <div class="scrolltop" style="display: block;">
        <div class="scroll icon">
            <i class="fa fa-angle-up"></i>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{URL::asset('/bootstrap/js/jquery.min.js')}}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="{{URL::asset('/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="{{URL::asset('/bootstrap/js/popper.min.js')}}"></script>

    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script src="{{URL::asset('/bootstrap/js/aos.js')}}"></script>

    <script src="js/script.js"></script>
    <script src="{{URL::asset('js/script.js')}}"></script>

</body>

</html>