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
    <link rel="stylesheet" href="frontend/assets/bootstrap/css/bootstrap.css" type="text/css">
    <!--  Icon Font css  -->
    <link rel="stylesheet" href="frontend/assets/fonts/flaticon/flaticon.css" type="text/css">
    <!-- FONT AWESOME ICON  -->
    <link rel="stylesheet" href="frontend/assets/css/all.css" type="text/css">
    <link rel="stylesheet" href="frontend/assets/css/icofont.css" type="text/css">
    <!--  Animate STYLE  -->
    <link rel="stylesheet" href="frontend/assets/css/animate.min.css" type="text/css">
    <!--  Theme CUSTOM STYLE  -->
    <link rel="stylesheet" href="frontend/assets/css/style.css" type="text/css">
    <!--  RESPONSIVE STYLE  -->
    <link rel="stylesheet" href="frontend/assets/css/responsive.css" type="text/css">

      <!--  NOTIFICACION  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" type="text/css">
   
    <title>Amigos de hardany cedeño </title>

</head>

<body data-spy="scroll" data-target=".fixed-top">

    <nav class="navbar navbar-expand-lg fixed-top trans-navigation">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="frontend/assets/img/logo2.png" alt="" width="100px" class="img-fluid b-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
              </button>

            <div class="collapse navbar-collapse justify-content-end" id="mainNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active smoth-scroll" href=".banner-area">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link smoth-scroll" href="#about">Hardany Cedeño</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="#intro">Politica</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="#service">Pilares</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="#blog">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="#footer">Contactenos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--MAIN HEADER AREA END -->

     <!--MAIN BANNER AREA STARt -->
    <div class="banner-area banner-1">
        <div class="overlay gr-overlay"></div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
					
                        <div class="col-lg-6  text-center col-sm-12 col-md-12">
                            <div class="banner-content content-padding">
                                <h5 class="subtitle">Caminemos Juntos</h5>
                                <h1 class="banner-title">Amigos de Hardany Cedeño</h1>
                                <h1 class="banner-title">Marca U14</h1>                                   
                                <p>Apóyanos este 27 de octubre de 2019 marcando el el tarjetón U14 y caminemos juntos a Eddy Hardany Cedeño,aspirante al concejo distrital de Buenaventura</p>

                           
                            </div>
                        </div>
						
						
						  <div class="col-lg-5 offset-1 col-sm-12 col-md-12">
                            <div class="banner-content2 content-padding2">                               
                                <h1 class="banner-title">Registrate</h1>
                                <p>Si deseas apoyar esta campaña, por favor registrate, y mantente informado de este proceso</p>
                                                <form  name="" method="POST" action="{{route('registro')}}">
                                                    {{ csrf_field() }}
													  <div class="form-row">
														<div class="form-group col-md-6">
                                                            <input type="text"  name="nombre" class="form-control"  placeholder="*Nombre"  value="{{old('nombre')}}">
                                                            @if($errors->has('nombre'))         
                                                              <small class="text-danger">{{$errors->first('nombre')}}</small>  
                                                            @endif
														</div>
														<div class="form-group col-md-6">
                                                            <input type="text"  name="apellido" class="form-control" id="inputPassword4" placeholder="*Apellido" value="{{old('apellido')}}">
                                                            @if($errors->has('apellido'))         
                                                            <small class="text-danger">{{$errors->first('apellido')}}</small>  
                                                          @endif
														</div>
													  </div>
													  <div class="form-group">
                                                        <input type="email"  name="email" class="form-control" id="inputPassword4" placeholder="*Correo" value="{{old('email')}}">
                                                        @if($errors->has('email'))         
                                                        <small class="text-danger">{{$errors->first('email')}}</small>  
                                                      @endif
													  </div>
													  <div class="form-group">
                                                        <input type="text" name="direccion" class="form-control"  placeholder="Dirección">
                                                        @if($errors->has('direccion'))         
                                                           <small class="text-danger">{{$errors->first('direccion')}} </small>  
                                                        @endif
													  </div>
													  <div class="form-row">
														<div class="form-group col-md-6">
                                                            <input type="text" name="documento" class="form-control"  placeholder="*Docuemento">
                                                            @if($errors->has('documento'))         
                                                               <small class="text-danger">{{$errors->first('documento')}} </small>  
                                                            @endif
														</div>
													   
														<div class="form-group col-md-6">
                                                            <input type="text"  name="telefono" class="form-control"  placeholder="*Telefono"  value="{{old('telefono')}}">
                                                            @if($errors->has('telefono'))         
                                                              <small class="text-danger">{{$errors->first('telefono')}}</small>  
                                                            @endif
														</div>
													  </div>

                                                      <input type="submit" class="btn btn-primary btn-block" value="Registrarse">
													  <br>
                                                            <div class="text-center">
                                                                {!! $errors->first('msj','<small class="text-danger">:message</small>')!!}
                                                            </div>
                                                           
												</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MAIN HEADER AREA END -->
  <!--  SERVICE AREA START  -->
  <section id="about" class="bg-light">
        <div class="about-bg-img d-none d-lg-block d-md-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-12 col-md-8">
                    <div class="about-content">
                         <h3>Eddy Hardany Cedeño Velasco</h3>
                        <p>Nacido el 13 de Octubre de 1990 en el Distrito de Buenaventura - Valle, hijo de Luis Alfredo Cedeño Ortiz y Daniza Velasco Aguirre, cursó sus estudios de primaria en los colegios: Liceo de Occidente, San Vicente y Gabriela Mistral; luego realizó el Bachillerato en la Institución Educativa Técnica Industrial Gerardo Valencia Cano (ITI GVC) donde se graduó como bachiller técnico en Dibujo arquitectónico.</p>
                        <p>Comenzó el Pregrado en la Universidad del Pacífico estudiando Tecnología en Informática graduado en Abril de 2013, continuó su profesionalización en la misma Universidad, Ingeniería de Sistemas graduado en Septiembre de 2016; Actualmente cursa Posgrado en Derecho Administrativo en Universidad Santiago de Cali.</p>
                        <p>Joven líder, responsable, emprendedor, íntegro, de buenos principios morales y éticos; que desde muy temprano se ha desempeñado como independiente ejerciendo su profesión en diferentes entidades de Buenaventura y el Valle del Cauca.</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  SERVICE AREA END  -->
    <!--  ABOUT AREA START  -->
    <section id="intro" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="section-heading">
                        <h3>POLÍTICA</h3>
                        <p class="lead">Nuestra actividad política funciona bajo 3 valores fundamentales</p>
                    </div>
                </div>
            </div>
            <div class="row">
               <!-- <div class="col-lg-4 d-none d-lg-block col-sm-12">
                    <div class="intro-img">
                        <img src="frontend/assets/img/h1.jpeg" alt="intro-img" class="img-fluid">
                    </div>
                </div>-->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                  

                        <div class="col-lg-4 col-sm-6">
                                <div class="pricing-block ">
                                    <div class="price-header">
                                        <i class="fas fa-hands-helping"></i>
                                        <h3>SERVICIO</h3>
                                    </div>
                                    <p >Vivimos para servir, no sólo en campañas políticas sino en todos los tiempos y mientras esté bajo mi alcance sirvo a las personas con mucha satisfacción..</p>
                                </div>
                            </div>


                            <div class="col-lg-4 col-sm-6">
                                    <div class="pricing-block ">
                                        <div class="price-header">
                                            <i class="fas fa-bible"></i>
                                            <h3>VERDAD</h3>
                                        </div>
                                        <p>No me comprometo en lo que no pueda cumplir, no gano votos con mentiras y es de vital importancia recuperar la credibilidad para hacer un cambio de paradigma político. </p>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6">
                                        <div class="pricing-block ">
                                            <div class="price-header">
                                                <i class="fas fa-users"></i>
                                                <h3>AMISTAD</h3>
                                            </div>
                                            <p>Más que un político quiero ser tu amigo, aprecio y valoro el significado de la amistad.</p>
                                        </div>
                                    </div>
                       
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!--  ABOUT AREA END  -->

  

    <!--  SERVICE PARTNER START  -->
    <!--<section id="service-head" class=" bg-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 m-auto">
                    <div class="section-heading text-white">
                        <h4 class="section-title">PILARES</h4>
                        <p>Dentro de los pilares de proyección que se tiene para el desarrollo y control político de nuestro Distrito de Buenaventura tenemos los siguientes:</p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--  SERVICE PARTNER END  -->

    <!--  SERVICE AREA START  -->
    <section id="service">
        <div class="container">
            <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 wrapservice">
                        <h4 class="section-title">PILARES</h4>
                        <p>Dentro de los pilares de proyección que se tiene para el desarrollo y control político de nuestro Distrito de Buenaventura tenemos los siguientes:</p>
                    </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="service-box">
                            <i class="fas fa-server fa-4x"></i>
                        <div class="service-inner">
                            <h4>DESARROLLO TECNOLÓGICO</h4>
                            <p>Como Ingeniero de Sistemas y con experiencia en el área tecnológica, me inclinaré en que podamos crear la Secretaría de las Tecnologías de Información y las Comunicaciones en Nuestro Distrito de Buenaventura..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="service-box ">
                            <i class="fas fa-swimmer fa-4x"></i>
                       
                        <div class="service-inner">
                            <h4>RECREACIÓN Y DEPORTE</h4>
                            <p>Conozco la importancia del deporte y la recreación para el progreso colectivo desde las familias hasta la comunidad en general; por lo tanto me enfocaré en la infraestructura deportiva, la recreación de infancia-adolescencia y adultos mayores.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="service-box">
                            <i class="fas fa-city fa-4x"></i>
                        <div class="service-inner">
                            <h4>CULTURA CIUDADANA</h4>
                            <p>Debemos luchar por la cultura ciudadana a través de la  autoestima y el sentido de pertenencia por Buenaventura; ejecutando programas sociales que ayuden a contribuir el bienestar de nuestra ciudad.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="service-box">
                      
                                    <i class="fas fa-brain fa-4x"></i>
                            
                        <div class="service-inner">
                            <h4>EMPRENDIMIENTO</h4>
                            <p>Apoyaremos la reactivación económica en el Distrito de Buenaventura para la generación de empleo y oportunidades de empresas en nuestra ciudad..</p>
                        </div>
                    </div>
                </div>
              
               
            </div>
        </div>
    </section>
    <!--  SERVICE AREA END  -->



    <!--  TESTIMONIAL AREA START  
    <section id="testimonial" class="section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto col-sm-12 col-md-12">
                    <div class="carousel slide" id="test-carousel2">
                        <div class="carousel-inner">
                            <ol class="carousel-indicators">
                                <li data-target="#test-carousel2" data-slide-to="0" class="active"></li>
                                <li data-target="#test-carousel2" data-slide-to="1"></li>
                                <li data-target="#test-carousel2" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="testimonial-content style-2">
                                            <div class="author-info ">
                                                <div class="author-img">
                                                    <img src="frontend/assets/img/author/3b.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>

                                            <p><i class="icofont icofont-quote-left"></i>They is a great platform to anyone like who want to start buisiness but not get right decision. It’s really great placefor new to start the buisness in righ way! <i class="icofont icofont-quote-right"></i></p>
                                            <div class="author-text">
                                                <h5>Marine Joshi</h5>
                                                <p>Senior designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="testimonial-content style-2">
                                            <div class="author-info ">
                                                <div class="author-img">
                                                    <img src="frontend/assets/img/author/5b.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>

                                            <p><i class="icofont icofont-quote-left"></i>They is a great platform to anyone like who want to start buisiness but not get right decision. It’s really great placefor new to start the buisness in righ way! <i class="icofont icofont-quote-right"></i></p>
                                            <div class="author-text">
                                                <h5>Marine Joshi</h5>
                                                <p>Senior designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             ITEM END  

                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="testimonial-content style-2">
                                            <div class="author-info ">
                                                <div class="author-img">
                                                    <img src="frontend/assets/img/author/3b.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>

                                            <p><i class="icofont icofont-quote-left"></i>They is a great platform to anyone like who want to start buisiness but not get right decision. It’s really great placefor new to start the buisness in righ way!<i class="icofont icofont-quote-right"></i></p>
                                            <div class="author-text">
                                                <h5>Marine Joshi</h5>
                                                <p>Senior designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          ITEM END  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    TESTIMONIAL AREA END  -->
    
    <!--  PARTNER START  
    <section id="clients" class="section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 text-center">
                    <div class="client-img">
                        <img src="frontend/assets/img/clients/client01.png" alt="partner" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 text-center">
                    <div class="client-img">
                        <img src="frontend/assets/img/clients/client06.png" alt="partner" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 text-center">
                    <div class="client-img">
                        <img src="frontend/assets/img/clients/client04.png" alt="partner" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 text-center">
                    <div class="client-img">
                        <img src="frontend/assets/img/clients/client05.png" alt="partner" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
     PARTNER END  -->

    <!--  BLOG AREA START  -->
    <section id="blog" class="section-padding bg-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 m-auto">
                    <div class="section-heading">
                        <h4 class="section-title">PUBLICACIONES</h4>
                        <div class="line"></div>
                        <p>Enterate de las actividades y noticias de nuestro movimiento  </p>
                    </div>
                </div>
            </div>

            <div class="row">
                    @foreach ($noticias as $noticia)                      
                    <div class="col-lg-4 col-sm-6 col-md-4">
                              <div class="blog-block ">
                                  <img src="images/{{$noticia->imagen}}" width="370px" height="240px" alt="" class="img-fluid">
                                  <div class="blog-text">
                                      <!--<h6 class="author-name"><span>Tips and tricks</span>john Doe</h6>-->
                                      <a href="/noticia/{{$noticia->idnoticia}}" class="h5 my-2 d-inline-block">
                                         {{$noticia->titulo}}
                                      </a><br>
                                      <small class="text-muted">Fecha de Publicación: {{  Carbon\Carbon::parse($noticia->fecha_publicacion)-> format('M j, Y')}}</small>
                                    <!--<p>{{!! str_limit($noticia->contenido,20) !!}}</p>-->
                                  </div>
                              </div>
                           </div>
               @endforeach              
          
            </div>
        </div>
    </section>
    <!--  BLOG AREA END  -->

    <!--  PARTNER START  -->
   <!-- <section id="contact" class="section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-mfd-12">
                    <div class="section-heading">
                        <h4 class="section-title">Contactenos</h4>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-sm-12 m-auto">
                    <div class="contact-form ">
                        <form class="contact__form" method="post" action="mail.php">
                           
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                        Your message was sent successfully.
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input name="subject" type="text" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="col-12 form-group">
                                    <textarea name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <input name="submit" type="submit" class=" btn btn-hero btn-circled" value="Send Message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--  CONTACT END  -->

    

    <!--  FOOTER AREA START  -->
    <section id="footer"  class="section-padding">
        <div class="container">
            <div class="row">

                    <div class="col-lg-4 col-sm-8 col-md-8 footerimg" >
                            <img src="frontend/assets/img/logo2.png" alt="" width="300px" class="img-fluid b-logo">
                        </div>

                <div class="col-lg-5 col-sm-8 col-md-8">
                    <div class="footer-widget footer-link">
                        <h4>AMIGOS DE HARDANY CEDEÑO</h4>
                        <p>Apóyanos este 27 de octubre de 2019 marcando el el tarjetón U14 y caminemos juntos a Eddy Hardany Cedeño,aspirante al concejo distrital de Buenaventura. </p>
                    </div>
                </div>
               

               
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="footer-widget footer-text">
                        <h4>Ubicación</h4>
                        <p class="mail"><span>Email:</span> info@hardany.com</p>
                        <p><span>Telefono :</span></p>
                        <p><span>Dirección:</span> </p>
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

     <!--  Notificacion -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
    <script>

         @if(session()->has('msg'))  
         toastr.success("{{ session('msg') }}") 
         @endif

      
    </script>
    

</body>

</html>