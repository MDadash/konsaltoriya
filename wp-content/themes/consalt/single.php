<?php
/*
Template Post Type: post
*/
get_header('min');
?>
    <section class="section">
      <div class="container">
		<?php
		if ( have_posts() ) :
			the_post();
			//get_template_part( 'template-parts/content', get_post_type() );
        ?>
			<?php if (has_category([2])){ ?>
            <div class="row" style="padding-top: 50px;">
                <div class="section-title-back fleft"><a href="/news/" class="btn-back">&laquo;назад к Новостям</a></div>
            </div>
		<?php } the_title( '<div  class="row"><h1 class="entry-title" style="padding-left: 20px ">', '</h1></div>' );?>
            <div class="row">
                <div class="entry-content">
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
