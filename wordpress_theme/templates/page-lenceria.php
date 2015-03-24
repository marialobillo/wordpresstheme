<?php get_header('shop'); ?>



     <h2 class='categoria_titulo'>
                <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoTuppermini.png">
                CATEGORÍA DE LENCERÍA</h2>
<div class='clearfix'></div>
<ul class="products">
    <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'product_cat' => 'lenceria', 'orderby' => 'rand' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>



                <li class="celda_categoria panel-con-sombra">

                <div class="categoria_caja">    

                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" >
      
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'small'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                   </a>

                    </div>

                    <div class="producto_pie">
                        <div class='titulo_producto'><?php the_title(); ?></div>

                        <?php
                                echo $product->get_categories(
                                    ', ',
                                    '<div class="titulo_categoria">' . _n( '', '',
                                    sizeof( get_the_terms( $post->ID, 'product_cat' ) ),
                                    'woocommerce' ) . ' ',
                                    '</div>'
                                );
                            ?>
                        
                        <div class="titulo_precio">
                             <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                            <?php echo $product->get_price_html(); ?></div> 


                    </div>

                    <?php //woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

                </li>

    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
</ul><!--/.products-->


 

<?php get_footer('shop'); ?>