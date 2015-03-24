<?php get_header('shop'); ?>



      <header >
                <div class='mititulo'>
                        <div class='superior'> </div>
                  <div class='superior-derecha'></div>
                        <div class='centro'>
                            <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoDiversionmini.png">
                CATEGORÍA DE DIVERSION</div>
                        <div class='inferior'></div>
                  <div class='inferior-derecha'></div>
                    </div>
            </header>
<div class='clearfix'></div>

<form class="woocommerce-ordering" method="get">
    <select name="orderby" class="orderby">
        <?php
            $catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
                'menu_order' => __( 'Default sorting', 'woocommerce' ),
              //  'popularity' => __( 'Sort by popularity', 'woocommerce' ),
                'title-asc'     => __( 'Sort by title: a to z', 'woocommerce' ),
                'title-desc'     => __( 'Sort by title: z to a', 'woocommerce' ),
                'date'       => __( 'Sort by newness', 'woocommerce' ),
                'rand'  => __( 'Sort by oldest', 'woocommerce' )
             //   'price-asc'  => __( 'Sort by price: low to high', 'woocommerce' ),
             //   'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
            ) );

            if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
                unset( $catalog_orderby['rating'] );

            foreach ( $catalog_orderby as $id => $name )
                echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
        ?>
    </select>
    <?php
        // Keep query string vars intact
        foreach ( $_GET as $key => $val ) {
            if ( 'orderby' == $key )
                continue;
            
            if (is_array($val)) {
                foreach($val as $innerVal) {
                    echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                }
            
            } else {
                echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
            }
        }
    ?>
</form>
<div class='clearfix'></div>
<?php

    if($orderby == 'title-asc'){
        $orderby = 'title';
        $order = 'asc';
        
    }
    if($orderby == 'title-desc'){
        $orderby = 'title';
        $order = 'desc';
       
    }
    if($orderby == 'price-asc'){
        $orderby = 'price';
        $order = 'asc';
        
    }
    if($orderby == 'price-desc'){
        $orderby = 'price';
        $order = 'desc';
       
    }
 ?>
<ul class="products">
    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

       
        $args = array( 
            'post_type' => 'product', 
            'posts_per_page' => 8, 
            'product_cat' => 'diversion', 
            'orderby' => $orderby,
            'order' => $order,

            'paged' => $paged );

        $temp = $wp_query;
        $wp_query= null;
        $wp_query = new WP_Query($args);

        /* PageNavi at Top */
        //if (function_exists('wp_pagenavi')){wp_pagenavi();}
        if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 


      //  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>



                <li class="celda_categoria panel-con-sombra">

                <div class="categoria_caja">    

                    <?php if ($product->is_on_sale()) : ?>
                    <div class='enoferta'>
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/img/iconos/OfertasSello.png">
                    </div>
                    <?php endif; ?>
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" >
      
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'small'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                   </a>

                    </div>

                    <div class="producto_pie">
                        <div class='titulo_producto'><?php the_title(); ?></div>

                        <?php                                
                                // global $post;
                                $terms = get_the_terms( $post->ID, 'product_cat' );
                                foreach ( $terms as $term ){
                                    $category_id = $term->term_id;
                                    $category_name = $term->name;
                                    $category_slug = $term->slug;
                                    break;   
                                }
                                
                            ?>
                        <div class="titulo_categoria"><?php echo $category_name; ?></div>
                        <div class="titulo_precio">
                             <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                            <?php echo $product->get_price_html(); ?></div> 


                        <div class='related_flecha'>
                            <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/flechaGr.png">
                            </a>
                        </div>

                    </div>

                    <?php //woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

                </li>

<?php endwhile; endif; ?>
                    <?php //endwhile; ?>
                <?php //wp_reset_query(); ?>


</ul><!--/.products-->


      
<?php if (function_exists('wp_pagenavi')){wp_pagenavi();}
$wp_query = null;
$wp_query = $temp;
wp_reset_query();
 ?>
    

<?php //wp_pagenavi(); ?>
  


<div class='clearfix'></div>
 <?php do_action('woocommerce_after_shop_loop'); // woocommerce pagination   ?>

 <div class='clearfix'></div>

<?php get_footer('shop'); ?>