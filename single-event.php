	<?php // single-event.php ?>
	
	<?php get_header(); ?>
	
		<?php if (have_posts()) : ?>
		
			<?php while (have_posts()) : the_post(); ?>
			
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					
				</article>
					
			<?php endwhile; ?>
			
		<?php else: ?>
		
			<h2>Hot dog! There are no events to display</h2>
			
		<?php endif; ?>
	
	<?php get_footer(); ?>