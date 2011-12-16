<?php get_header(); ?>

<?php

	// for our custom loop, get the last 5 event posts
	$the_query = new WP_Query(
		array(
			'post_type'		=> 'event',
			'posts_per_page'	=> '5'
		)
	);

?>
		
<?php if ($the_query->have_posts()) while ($the_query->have_posts()) : $the_query->the_post(); ?>

	<?php $custom = get_post_custom(); ?>
	
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<?php if (!empty($custom['td_event_location'][0])) : ?>
		
		<p><strong>Location: <?php echo $custom['td_event_location'][0]; ?></strong></p>
		
	<?php endif; ?>
	
	<?php the_excerpt(); ?>
	
<?php endwhile; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>