<?php
	/*
	Template Name: Blogs
	*/
?>
<?php
	get_header('min');
?>
	<section class="info" id="info">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="info__title">Блоги</h2>
					<?php
						$query = new WP_Query( [
							'post_type'   => 'post',
							'cat'=>3,
							'orderby'   => 'ID',
							'post_status'=>'publish',
							//'posts_per_page' => 5,
						] ); ?>
					<?php if ( $query->have_posts() ) : ?>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<?php if ( has_post_thumbnail()) { ?>
								<div class="block-lg">
									<?php echo get_the_post_thumbnail( $post->ID, 'medium', array('class' => 'block-lg__img') ); ?>
									<h3 class="block-lg__title"><?php the_title(); ?></h3>
									<p class="block__text"><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
									<a href="<?php the_permalink(); ?>" class="block__link">подробнее<i class="fa fa-angle-right"></i></a>
								</div>
							<?php }else{ ?>
								<div class="block">
									<h3 class="block__title"><?php the_title(); ?></h3>
									<p class="block__text"><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
									<a href="<?php the_permalink(); ?>" class="block__link">подробнее<i class="fa fa-angle-right"></i></a>
								</div>
							<?php } ?>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php
				get_template_part( 'block-reestr' );
			?>
		</div>
	</section>

<?php
	get_footer();
