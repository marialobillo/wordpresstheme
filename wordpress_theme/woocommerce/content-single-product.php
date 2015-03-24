<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 add_action( 'woocommerce_before_single_product', 'woocommerce_template_single_title', 15 ); 
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<div class="row single-product">
	<div class="span8  panel-con-sombra singlepanel"><!-- Este es el panel blanco que engloba la foto y la descripicon-->
		
		<div class="row">
			<div class="span2 cuadro"><!--Columna foto y precio-->

				
                    
	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		 
		 //usamos esta accion para mostra imagen y precio añadiendole al hook que muestre el precio
		
		add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 25 );
		 
		do_action( 'woocommerce_before_single_product_summary' );
	?>
</div><!--Cerramos foto y precio-->
	<div class="product-description span6"><!--Columna Descripcion-->

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			
			//remove_all_actions( 'woocommerce_single_product_summary');
		//do_action('woocommerce_single_product_summary');
			add_action('mostrar_descripcion','woocommerce_template_single_excerpt',10);//Añadimos el hook para mostrar la descripcion.
			do_action('mostrar_descripcion');
			 
		?>

	</div><!--Cerramos descripcion-->
</div><!--Cerramos fila-->

</div><!-- cerramos panel blanco-->
<div class="span2"><!--Columna para el añadir a carrito-->
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
			add_action('mostrar_cart_compartir','woocommerce_template_single_add_to_cart',10);
			add_action('mostrar_cart_compartir','woocommerce_template_single_sharing',20);
			do_action('mostrar_cart_compartir');


		
	?>

	<div class='shareit'>
		
			<div class='twitter_boton'>Twitter</div>
			<div class='facebook_boton'>Facebook</div>

	</div>
</div><!--Cerramos columna añadir carrito-->

</div><!-- #product-<?php the_ID(); ?> -->
</div><!--Cerramos fila-->
<div class='clearfix'></div>
<div class="row">
	<div class="span12"><!--Esto es para los productos relacionados y upsells-->
		<?php			
	
			add_action( 'show_related', 'woocommerce_upsell_display', 15 );
			add_action( 'show_related', 'woocommerce_output_related_products', 20 );
			do_action( 'show_related' );
			?>
	</div>
</div>
			
<?php do_action( 'woocommerce_after_single_product' ); ?>