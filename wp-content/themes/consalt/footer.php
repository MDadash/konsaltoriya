<footer class="footer" id="footer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 col-lg-5 footer-first">
				<div class="footer__about">
					<div class="footer__text">
						<p class="footer__info">
							<?php echo get_option('my_footer__info_text'); ?>
						</p>
						<a href="<?php echo get_site_url(null,'privacy-policy')?>" class="copyright">
							Политика конфиденциальности
						</a>
						<a href="<?php echo get_site_url(null,'personal-data')?>" class="pers-info">
							Персональные данные
						</a>
					</div>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-3 offset-md-2 col-lg-2 offset-lg-3">
				<div class="footer__item-1">
					<a href="<?php echo get_site_url(null,'about')?>" class="footer__link">
						О компании
					</a>
					<a href="<?php echo get_site_url(null,'contact')?>" class="footer__link">
						Контакты
					</a>
					<a href="<?php echo get_site_url(null,'blog-news')?>" class="footer__link">
						Новости
					</a>
					<a href="<?php echo get_site_url(null,'blog')?>" class="footer__link">
						Блог
					</a>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-3 col-lg-2">
				<div class="footer__item-2">
					<a href="<?php echo get_site_url(null,'guaranty')?>" class="footer__link">
						Гарантии
					</a>
					<a href="<?php echo get_site_url(null,'terms-payment')?>" class="footer__link">
						Условия оплаты
					</a>
					<div class="footer__icon">
						<a href="<?php echo get_option('vk_link'); ?>" target="_blank" class="link-icon">
							<i class="fab fa-vk"></i>
						</a>
						<a href="<?php echo get_option('fb_link'); ?>" target="_blank" class="link-icon">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="<?php echo get_option('in_link'); ?>" target="_blank" class="link-icon">
							<i class="fab fa-instagram"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<script src="<?php bloginfo('template_directory') ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.arcticmodal-0.3.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.validate.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/messages_ru.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/main.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(52302280, "init", {
        id:52302280,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/52302280" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134212963-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-134212963-1');
</script>
</body>
</html>