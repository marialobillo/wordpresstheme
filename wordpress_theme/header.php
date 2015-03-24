<!doctype html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <title><?php wp_title(); ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php bloginfo('template_url'); ?>/css/normalize.css" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
    <link href="<?php bloginfo('template_url'); ?>/css/custom.css" rel="stylesheet" media="screen">
     <link rel='stylesheet' href="<?php bloginfo('stylesheet_url'); ?>" type='text/css' />
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/css/points.css' type='text/css' media='screen'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <?php wp_head(); ?>
</head>
<body>


<!-- QUIEN SABE -->
    <div class="container contenedor">


<div class="row-fluid headerTop">
        <div class="span13 top">
        

            <div class="logo">
                <a class='alogo' href="<?php get_site_url(); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/img/logo.png"></a>
            </div>


              <div class="carrito">
                <div class="boton boton2">
                    <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoCarrito3.png">
            
                    
                        <?php global $woocommerce; ?>
 
                    <a class="cart-contents acarrito" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                        <?php echo sprintf(_n('%d Articulo', '%d Articulos', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
                          <?php //echo $woocommerce->cart->get_cart_total(); ?></a>
                  

                </div>
            </div>


            <div class="cuenta">
                <div class="boton boton1">
                    <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoUsuario.png">
                <?php
                    $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
                        if ( $myaccount_page_id ) {
                            $myaccount_page_url = get_permalink( $myaccount_page_id );
                    }

                ?>
                    <a class='acarrito' href='mi-cuenta/'>Iniciar sesión / Regístrate</a>
                </div>
            </div>


        </div>
       

</div>


        <header>
            
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <nav class="navPrincipal nav">
                    <ul>
                        <li><a href="<?php bloginfo('url'); ?>/5sentidos/"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoOfertas.png"><span>Ofertas</span></div></a></li>
                        <li><a href="<?php bloginfo('url'); ?>/juguetes/"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoJuguetes.png"><span>Juguetes</span></div></a></li>
                        <li><a href="<?php bloginfo('url'); ?>/cosmetica/"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoCosmetica.png"><span>Cosmética</span></div></a></li>
                        <li><a href="<?php bloginfo('url'); ?>/lenceria"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoLenceria.png"><span>Lenceria</span></div></a></li>
                        <li><a href="<?php bloginfo('url'); ?>/diversion"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoDiversión.png"><span>Diversión</span></div></a></li>
                        <li><a href="<?php bloginfo('url'); ?>/eventos"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoEventos.png"><span>Eventos</span></div></a></li>
                        <li><a href="<?php bloginfo('url'); ?>/tuppersense"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoTupper.png"><span>TupperSense</span></div></a></li>
                        <li><a href="<?php bloginfo('url'); ?>/contacto"><div><img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoContacto.png"><span>Contacto</span></div></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>      </header>

	


	<section class='container'>
	