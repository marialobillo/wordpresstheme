<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
$classes[]='span3';

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li  class="related_celda panel-con-sombra">
	<!-- <?php post_class( $classes ); ?> -->

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<a href="<?php the_permalink(); ?>">
	 	<div class="related_imagen">  
	 	<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
	
		
		
		</a>

		</div>

		
		<div class='related_pie'>
		<div class='related_titulo product_title'><?php the_title(); ?></div>

		 <?php
                                
                                 $terms = get_the_terms( $post->ID, 'product_cat' );
                                foreach ( $terms as $term ){
                                    $category_id = $term->term_id;
                                    $category_name = $term->name;
                                    $category_slug = $term->slug;
                                    break;   
                                }

                            ?>
     <div class="titulo_categoria"><?php echo $category_name; ?></div>
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		<div class='related_flecha'>
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_bloginfo('template_directory'); ?>/img/flechaGr.png">
			</a>
		</div>
	<?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>

		
</li>