<section class="reg" id="reg">
	<div class="container form-complete"  style="display: none;">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="reg__title" style="color: #ffffff">
							<?php 
				$callback_post_obj = get_post( 172 );
				echo	$callback_post_obj->post_content;
		?>
				</h2>
			</div>
		</div>
	</div>
	<div class="container form-podpis">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="reg__title">
					Подпишись на рассылку
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form action="<?php echo admin_url('admin-ajax.php?action=send_mail'); ?>" method="post" id="formapodpisi" class="form d-flex form_podpis">
					<div class="form__item">
						<p class="form__text-header">E-mail</p>
						<input type="email"  name="email" class="placeholder placeholder_first" required placeholder="">
					</div>
					<div class="form__item">
						<p class="form__text-header">Имя</p>
						<input type="text" name="name" class="placeholder placeholder_first" minlength="2" required placeholder="">
					</div>
					<div class="radio-block">
						<label class="radio radio-1">
							<input type="radio" name="type" value="mfo">
							<div class="radio__text radio__text-1">МФО</div>
						</label>
						<label class="radio">
							<input type="radio" name="type" value="uslugi">
							<div class="radio__text">ЮР.УСЛУГИ</div>
						</label>
						
					</div>
					<button type="submit" class="form__btn" >ПОДПИСАТЬСЯ</button>
				</form>
			</div>
		</div>
	</div>
</section>