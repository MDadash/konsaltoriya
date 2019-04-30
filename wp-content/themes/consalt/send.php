<?php
	//https://misha.blog/wordpress/forma-obratnoy-svyazi-bez-plaginov.html
// проверка на спам - просто прерываем выполнение кода, при желании можно и сообщение спамерам вывести
	if( isset( $_POST['email'] ) || isset( $_POST['name'] ) )
		exit;

// подключаем WP, можно конечно обойтись без этого, но зачем?
	require( dirname(__FILE__) . '/wp-load.php');

// следующий шаг - проверка на обязательные поля, у нас это емайл, имя и сообщение
	if( isset( $_POST['name'] )
	    && isset( $_POST['email'] ) && is_email( $_POST['email'] ) // is_email() - встроенная функция WP для проверки корректности емайлов
	    && isset( $_POST['radio'] ) ) {
		
		$headers = array(
			"Content-type: text/html; charset=utf-8",
			"From: " . $_POST['name'] . " <" . $_POST['email'] . ">"
		);
		
		if( wp_mail( get_option('admin_email'), 'Сообщение с сайта', wpautop( $_POST['soobschenie'] ), $headers ) ) {
			header('Location:' . site_url('/contact?msg=success') );
			exit;
		}
		
	}
	
	header('Location:' . site_url('/contact?msg=error') );
	exit;