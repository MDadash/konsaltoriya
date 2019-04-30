	<div class="row justify-content-center">
		<?php $cat_data = get_categories( array( 'parent' => 11 ) ); ?>
				
			<?php	foreach ( $cat_data as $key => $one_cat_data ){ ?>
				<div class="col-12 col-sm-6 col-md-4 col-lg-4">
					<button class="header__btn" data-toggle="<?php echo $key + 1 ?>"><?php echo $one_cat_data->name ?></button>
				</div>
			<?php 	}  ?>
	</div>

	<?php	foreach ( $cat_data as $key => $one_cat_data ){ ?>
	<div class="row menu-colapse" data-toggle="<?php echo $key + 1 ?>">
		<?php
			$query = new WP_Query( [
				'post_type'   => 'post',
				'cat'=> $one_cat_data->term_id ,
				// 'orderby'   => 'ID',
				'post_status'=>'publish',
				// 'posts_per_page' => 9,
			] ); ?>
		<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="col-lg-4 service-block">
					<div class="menu-colapse__item">
						<h3 class="menu-colapse__title">
							<?php the_title(); ?>
						</h3>
						<p class="menu-colapse__text">
							<?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?>
						</p>
						<a class="menu-colapse__link" onclick="$('#post-modal-<?php echo $post->ID?>').arcticmodal();">
							подробнее
							<i class="fa fa-angle-down"></i>
						</a>
					</div>
				</div>
				<div style="display: none;">
					<div class="box-modal" id="post-modal-<?php echo $post->ID?>">
						<div class="box-modal_close arcticmodal-close">
							<i class="fa fa-times"></i>
						</div>
						<div class="pop">
							<h2 class="pop__title"><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php get_template_part('formaphone'); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

	</div>

	<?php 	}  ?>

