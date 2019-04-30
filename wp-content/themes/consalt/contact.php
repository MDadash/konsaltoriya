<?php
	/*
	Template Name: Контакты
	*/
?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/jquery.arcticmodal-0.3.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/contacts.css">
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
		<div class="row">
			<div class="col-lg-12">
				<img src="<?php bloginfo('template_directory') ?>/img/Konsalt.png" alt="" class="konsalt">
			</div>
		</div>
	</div>
</section>
<section class="contacts" id="contacts">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-5">
				<h2 class="contacts__title">
					Контакты
				</h2>
				<div class="contacts__info">
					<h3 class="contacts__info__title">
						Реквизиты
					</h3>
					<p class="contacts__info__text">
						<?php echo get_option('my_requisites'); ?>
					</p>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="contacts__man">
					<img src="<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>" alt="" class="contacts__man__img">
					<!-- <h3 class="contacts__man__title"> -->
						<?php echo get_option('my_fio'); ?>
					<!-- </h3> -->
				</div>
			</div>
			<div class="col-lg-4">
				<h2 class="contacts__title">
					Мы здесь
				</h2>
				<div class="map">
					<p class="map__text"><?php echo get_option('my_map_text'); ?>
					</p>
					<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aeb3ccb7413df603ec762af54c6f4de847edb2fe9beef9fa35d7a09cd632d754a&amp;height=418&amp;lang=ru_RU&amp;scroll=true"></script>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	get_template_part( 'formapodpisi' );
?>
<?php
	get_footer();
?>
