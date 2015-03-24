<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

 <header >
                <div class='mititulo'>
                        <div class='superior'> </div>
                  <div class='superior-derecha'></div>
                        <div class='centro'>
        

        <?php 
        	 $terms = get_the_terms( $post->ID, 'product_cat' );
                                foreach ( $terms as $term ){
                                    $category_id = $term->term_id;
                                    $category_name = $term->name;
                                    $category_slug = $term->slug;
                                    break;   
                                }
                 switch($category_slug){
                 	case 'juguetes':
?>
<img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoJuguetesmini.png">
<?php
                 	break;
                 	case 'lenceria':
?>
<img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoLenceriamini.png">
<?php               
                 	break;
                 	case 'cosmetica':
?>
<img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoCosmeticamini.png">
<?php
                 	break;
                 	case 'diversion':
?>
<img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoDiversionmini.png">
<?php
                 	break;

                 } 

         ?>
         <?php the_title(); ?>
           					 </div>
                        <div class='inferior'></div>
                  <div class='inferior-derecha'></div>
                    </div>
            </header>