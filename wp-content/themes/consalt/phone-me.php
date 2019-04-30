<div class="col-12 col-md-7 col-lg-7 order-last order-md-2">
	<div class="tel">
		<p class="tel__numb">
			<?php echo get_option('my_phone'); ?>
		</p>
		<!-- <p class="tel__text"> -->
			<?php 
				$callback_post_obj = get_post( 262 );
				echo	$callback_post_obj->post_content;
			?>
		<!-- </p> -->
	</div>
</div>
<div class="col-9 col-md-3 col-lg-3 order-md-3">
	<div class="header__tel d-flex">
<!-- 		<p class="header__tel-text"> -->
	<a href="https://konsaltoriyaru.bitrix24.ru/pub/form/8_perezvonit_mne/9zxo0x/" target="_blank">
		<?php 
				$callback_post_obj = get_post( 169 );
				echo	$callback_post_obj->post_content;
		?>
	</a>
<!-- 		</p> -->
		<a href="https://konsaltoriyaru.bitrix24.ru/pub/form/8_perezvonit_mne/9zxo0x/" class="header__call" target="_blank">
			<i class="fas fa-phone"></i>
		</a>
	</div>
</div>