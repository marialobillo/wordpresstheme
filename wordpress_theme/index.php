<?php get_header(); ?>

	
<div id="content" class="widecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="post">
        
        <div class='mititulo'>
            <div class='superior'> </div>
                <div class='centro'>
                    <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoOfertasmini.png">
                   <?php the_title();?>
                </div>
            <div class='inferior'></div>
                 
        </div>
        <div class="entrytext">
            <?php the_content(); ?>
        </div>
    </div>
    <?php endwhile; endif; ?>

</div>


		
<?php get_footer(); ?>

