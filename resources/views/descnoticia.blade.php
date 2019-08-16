<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="seo & digital marketing">
    <meta name="keywords" content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company">
    <meta name="author" content="dreambuzz">

    <!-- Bootstrap CSS -->
<link rel="stylesheet"     href="{!! url('frontend/assets/bootstrap/css/bootstrap.css') !!}" type="text/css">
    <!--  Icon Font css  -->
    <link rel="stylesheet" href="{!! url('frontend/assets/fonts/flaticon/flaticon.css') !!}" type="text/css">
    <!-- FONT AWESOME ICON  -->
    <link rel="stylesheet" href="{!! url('frontend/assets/css/all.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! url('frontend/assets/css/icofont.css') !!}" type="text/css">
    <!--  Animate STYLE  -->
    <link rel="stylesheet" href="{!! url('frontend/assets/css/animate.min.css') !!}" type="text/css">
    <!--  Theme CUSTOM STYLE  -->
    <link rel="stylesheet" href="{!! url('frontend/assets/css/style.css') !!}" type="text/css">
    <!--  RESPONSIVE STYLE  -->
    <link rel="stylesheet" href="{!! url('frontend/assets/css/responsive.css') !!}" type="text/css">

    <title>Amigos de Hardany Cedeño </title>

</head>

<body data-spy="scroll" data-target=".fixed-top">

    <nav class="navbar navbar-expand-lg fixed-top trans-navigation">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="frontend/assets/img/logo.png" alt="" class="img-fluid b-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
              </button>

        </div>
    </nav>
    <!--MAIN HEADER AREA END -->

    <!--MAIN BANNER AREA START -->
    <div class="page-banner-area page-blog" id="page-banner">
        <div class="overlay dark-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                    <div class="banner-content content-padding">
                        <h1 class="banner-title">&nbsp</h1>
                        <p>&nbsp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MAIN HEADER AREA END -->

    <!--  Blog AREA START  -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">

                                    <img src="/images/{{$noticias->imagen}}"  alt="" class="img-fluid">
                               
                                <div class="mt-4 mb-3 d-flex">
                                    <!--<div class="post-author mr-3">
                                        <i class="fa fa-user"></i>
                                        <span class="h6 text-uppercase">John mackel</span>
                                    </div>-->

                                    <div class="post-info">
                                        <i class="fa fa-calendar-check"></i>
                                        <span>{{  Carbon\Carbon::parse($noticias->fecha_publicacion)-> format('M j, Y')}}</span>
                                    </div>
                                </div>
                        
                         
                            <a href="#" class="h4 ">{{$noticias->titulo}}</a>
                                
                                <p class="mt-3">
                                    {!! $noticias->contenido !!}
                                </p>
                               
                            
                            </div>


                        </div>
                    </div>

                    
                </div>

                <!-- BlOG SIDEBAR -->
                <div class="col-lg-4">
                    <div class="row">
                       <!-- <div class="col-lg-12">
                            <div class="sidebar-widget search">
                                <div class="form-group">
                                    <input type="text" placeholder="search" class="form-control">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>-->

                        <div class="col-lg-12">
                            <div class="sidebar-widget about-bar">
                                <h5 class="mb-3">Amigos de Hardany Cedeño</h5>
                                <p>Apóyanos este 27 de octubre de 2019 marcando el el tarjetón U14 y caminemos juntos a Eddy Hardany Cedeño,aspirante al concejo distrital de Buenaventura.</p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget category">
                                <h5 class="mb-3">Menu</h5>
                                <ul class="list-styled">
                                       <li> <a href="/"><i class="fas fa-angle-right"></i> Inicio</a></li>
                                       <li><a href="/#about"><i class="fas fa-angle-right"></i> Hardany Cedeño</a></li>
                                       <li><a href="/#intro"><i class="fas fa-angle-right"></i> Politicas</a></li>
                                       <li><a href="/#service"><i class="fas fa-angle-right"></i> Pilares</a></li>                                       
                                       <li><a href="/#footer"><i class="fas fa-angle-right"></i> Contactenos</a></li>
                                </ul>
                            </div>
                        </div>

                       
                        <div class="col-lg-12">
                            <div class="sidebar-widget download">
                                <h5 class="mb-4">Descargar Archivos</h5>
                                <a href="#"> <i class="fa fa-file-pdf"></i>Propuesta de Hardany</a>
                                <a href="#"> <i class="fa fa-file-pdf"></i>Información del Movimiento</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Blog AREA End -->

    <!--  FOOTER AREA START  -->
    <section id="footer"  class="section-padding">
            <div class="container">
                <div class="row">
    
                        <div class="col-lg-4 col-sm-8 col-md-8 footerimg" >
                                <img src="{!! url('frontend/assets/img/logo2.png') !!}" alt="" width="300px" class="img-fluid b-logo">
                            </div>
    
                    <div class="col-lg-5 col-sm-8 col-md-8">
                        <div class="footer-widget footer-link">
                            <h4>AMIGOS DE HARDANY CEDEÑO.</h4>
                            <p>Apóyanos este 27 de octubre de 2019 marcando el el tarjetón U14 y caminemos juntos a Eddy Hardany Cedeño,aspirante al concejo distrital de Buenaventura.</p>
                        </div>
                    </div>
                   
    
                   
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="footer-widget footer-text">
                            <h4>Ubicación</h4>
                            <p class="mail"><span>Email:</span> info@hardany.com</p>
                            <p><span>Telefono :</span></p>
                            <p><span>Dirección:</span></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="footer-copy">
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--  FOOTER AREA END  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="frontend/assets/js/jquery.min.js"></script>
    <!-- contact form  -->
    <script src="frontend/assets/js/contact.js"></script>
    <script src="frontend/assets/bootstrap/js/popper.min.js"></script>
    <script src="frontend/assets/bootstrap/js/bootstrap.min.js"></script>
    <!--  Counter up  -->
    <script src="frontend/assets/js/jquery.waypoints.js"></script>
    <script src="frontend/assets/js/jquery.counterup.min.js"></script>

    <script src="frontend/assets/js/jquery.easing.1.3.js"></script>
    <!--  wow animation  -->
    <script src="frontend/assets/js/wow.min.js"></script>
    <script src="frontend/assets/js/custom.js"></script>

</body>

</html>