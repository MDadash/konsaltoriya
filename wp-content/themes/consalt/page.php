<?php
/*
Template Name: Page
*/
?>
<?php
	get_header('min');
?>
	<section class="info" id="info">
	<div class="container">
	

				<div class="row">
				<div class="block template-page--block">
					<!-- <div class=""> -->
			<?php
			if ( have_posts() ) :
				the_post();
				the_title( '<h2 class="info__title">', '</h2>' );
				?>
					<?php
					the_content();
					?>
          </div><!-- .entry-content -->
				</div>
			<?php
			endif;
			?>
        
        </div>
    </section>
<?php
get_footer();
