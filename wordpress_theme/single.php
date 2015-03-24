<?php get_header(); ?>

	<section>
		<article class='article'>
			<?php the_post(); ?>
			
			<h2><?php the_title(); ?></h2>
			
        	<?php the_content(); ?>
        </article>

	</section>
		<div style="clear:both;"></div>

		
<?php get_footer(); ?>

