<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<?php if ($product->is_on_sale()) : ?>

	<?php //echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__( 'Sale!', 'woocommerce' ).'</span>', $post, $product); ?>
	<div class='enoferta2'><img src="<?php echo get_bloginfo('template_directory'); ?>/img/iconos/OfertasSello.png"></div>
<?php endif; ?>