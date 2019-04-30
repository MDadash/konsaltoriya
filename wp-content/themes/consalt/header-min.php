<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- Bootstrap Reboot CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/bootstrap-reboot.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css">
	<!-- pop-up -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/jquery.arcticmodal-0.3.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/news.css">
	<!-- Media CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/media.css">
</head>
<body>
<section class="header" id="header">
	<div class="container">
		<div class="row">
			<div class="col-3 col-md-2 col-lg-2">
				<a href="<?php echo get_site_url(null,'/')?>">
					<img src="<?php bloginfo('template_directory') ?>/img/logo.png" alt="" class="logo">
				</a>
			</div>
			<?php get_template_part( 'phone-me' );  ?>
		</div>
	</div>


</section>