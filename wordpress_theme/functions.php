<?php 
register_nav_menus( 
	array(
		'menu_superior' => 'Menu Superior',
		'menu_aside' => 'Mi Aside'
	 ));


/*
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

//require_once ( get_template_directory() . '/theme_options.php' );
// Load up our awesome theme options
*/
//background color configure, elegir un color de background
$args = array(
	'default-color' => '000000',
	'default-image' => get_template_directory_uri() . '/images/bg.jpg',
);
add_theme_support( 'custom-background', $args );

//for header custom
$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


//Configurarmos las imagenes
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

	function pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}


//creo que los enalces de redes sociales
global $wp_version;
if ( version_compare( $wp_version, '3.0', '>=' ) ) :
    add_theme_support( 'automatic-feed-links' ); 
else :
    automatic_feed_links();
endif;



// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    
    ob_start();
    
    ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return $fragments;
    
}



if ( function_exists('register_sidebar') )
register_sidebar(array(
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

function quickchic_widgets_init() {
register_sidebar(array(
'name' => __( 'Sidebar 1', 'quickchic' ),
'id' => 'sidebar-1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}
add_action( 'init', 'quickchic_widgets_init' );



/*
remove_action('woocommerce_pagination', 'woocommerce_pagination', 8);

function woocommerce_pagination() {

        wp_pagenavi();     

    }

add_action( 'woocommerce_pagination', 'woocommerce_pagination', 8);

*/
//PARA QUE LAS IMAGENES DE WOOCOMMCE NO SE CORTEN
function custom_product_large_thumbnail_size()    {
    return 'medium';
}
add_filter('single_product_large_thumbnail_size', 'custom_product_large_thumbnail_size');

//PARA QUITAR EL BREADCRUMB, DE UN PLUMAZO
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

 ?>