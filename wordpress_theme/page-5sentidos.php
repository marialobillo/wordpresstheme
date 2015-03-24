<?php get_header(); ?>

	
<div id="content" class="widecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="post">
       
        <article>

          <div class='slider-portada'>
                <div class='panel-con-sombra'>
                  <?php the_content(); ?>

                </div>
          </div>
          
        <div class='portal_izquierda'>

           <header>
          <div class='mititulo'>
                        <div class='superior'> </div>
                
                        <div class='centro'>
                          <img src="<?php bloginfo('template_url'); ?>/img/iconos/twitterrosa.png">SÍGUENOS</div>
                        <div class='inferior'></div> 
          </div>

                  
             
               
            </header>
           
           <div class='redes_sociales'>
               
      
              <a href='#' class='twitter_boton'>
                <img src="<?php bloginfo('template_url'); ?>/img/twitter.png">Twitter/@5Sentidos</a>
           
              <a href='#' class='facebook_boton'>
                <img src="<?php bloginfo('template_url'); ?>/img/facebook.png">Facebook/5Sentidos</a>

           </div>
        
          <div class='clearfix'></div>

          <header>
          <div class='mititulo'>
                        <div class='superior'> </div>
                
                        <div class='centro'>
                          <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoCarritorosa.png">GUIA DE COMPRA
                        </div>
                        <div class='inferior'></div>
                 
                    </div>

                  
             
            
            </header>
              <div class='clearfix'></div>

                 <div class='texto-portada'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                  Saepe, maiores, dolorum.</div>
                  <br>  
              <!-- primer boton -->
             <div class='boton_guia '>

            <a href="<?php bloginfo('url'); ?>/como-comprar/" class='boton_ofertas'>
           
              <span class='ordinal'>1</span>
              <span class='guia'>Proceso de compra</span>


               <div class='guia_flecha'>
                            <a href="<?php bloginfo('url'); ?>/como-comprar/">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/flechaGr.png">
                            </a>
               </div>

            </a>
          </div>

          <!-- segundo boton -->
           <div class='clearfix'></div>
             <div class='boton_guia '>
            <a href="<?php bloginfo('url'); ?>/envio-de-pedidos" class='boton_ofertas'>
             
                     <span class='ordinal'>2</span>
              <span class='guia'>Envío de pedidos</span>
                 <div class='guia_flecha'>
                            <a href="<?php bloginfo('url'); ?>/envio-de-pedidos">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/flechaGr.png">
                            </a>
               </div>

            </a>
          </div>

          <div class='clearfix'></div>

          <!-- tercer boton -->
             <div class='boton_guia '>
            <a href="<?php bloginfo('url'); ?>/devoluciones" class='boton_ofertas'>
             
                     <span class='ordinal'>3</span>
              <div class='guia'>Devoluciones</div>
                 <div class='guia_flecha'>
                            <a href="<?php bloginfo('url'); ?>/devoluciones">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/flechaGr.png">
                            </a>
               </div>

            </a>
          </div>
           
        </div>
        <div class='portal_derecha'>

            <header  >
                <div class='mititulo'>
                        <div class='superior'> </div>
                  
                        <div class='centro'>
                           <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoOfertasmini.png">
                          OFERTAS</div>
                        <div class='inferior'></div>
               
                    </div>
            </header>
               <div class='clearfix'></div>
            <?php get_sidebar(); ?>

              <div class='boton_portada boton'>
            <a href="<?php bloginfo('url'); ?>/ofertas/" class='boton_ofertas'>
              <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoOfertasmini.png">
              <span>Descubre mas Ofertas</span>
            </a>
          </div>

        </div>
            <?php endwhile; endif; ?>


        
        </article>
</div>
</div>


		
<?php get_footer(); ?>