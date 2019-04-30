<div class="row d-flex justify-content-center">
	<?php
		$query = new WP_Query( [
			'post_type'   => 'post',
			'cat'=>6,
			'orderby'   => 'ID',
			'post_status'=>'publish',
			'posts_per_page' => 6,
		] ); ?>
	<?php if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="col-6 col-sm-4 col-md-3 col-lg-2 on-wrapper">
				<div class="on">
					<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array('class' => 'on__img') ); ?>
					<a href="<?php the_permalink(); ?>" class="on__link"><?php the_title(); ?></a>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
	<?php endif; ?>
</div>