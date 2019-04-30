<?php
	//Fix: WP.Media Is Undefined
	function load_wp_media_files() {
		wp_enqueue_media();
	}
	add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
	/*
 * Функция создает дубликат поста в виде черновика и редиректит на его страницу редактирования
 */
	function true_duplicate_post_as_draft(){
		global $wpdb;
		if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'true_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
			wp_die('Нечего дублировать!');
		}
		
		/*
		 * получаем ID оригинального поста
		 */
		$post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
		/*
		 * а затем и все его данные
		 */
		$post = get_post( $post_id );
		
		/*
		 * если вы не хотите, чтобы текущий автор был автором нового поста
		 * тогда замените следующие две строчки на: $new_post_author = $post->post_author;
		 * при замене этих строк автор будет копироваться из оригинального поста
		 */
		$current_user = wp_get_current_user();
		$new_post_author = $current_user->ID;
		
		/*
		 * если пост существует, создаем его дубликат
		 */
		if (isset( $post ) && $post != null) {
			
			/*
			 * массив данных нового поста
			 */
			$args = array(
				'comment_status' => $post->comment_status,
				'ping_status'    => $post->ping_status,
				'post_author'    => $new_post_author,
				'post_content'   => $post->post_content,
				'post_excerpt'   => $post->post_excerpt,
				'post_name'      => $post->post_name,
				'post_parent'    => $post->post_parent,
				'post_password'  => $post->post_password,
				'post_status'    => 'draft', // черновик, если хотите сразу публиковать - замените на publish
				'post_title'     => $post->post_title,
				'post_type'      => $post->post_type,
				'to_ping'        => $post->to_ping,
				'menu_order'     => $post->menu_order
			);
			
			/*
			 * создаем пост при помощи функции wp_insert_post()
			 */
			$new_post_id = wp_insert_post( $args );
			
			/*
			 * присваиваем новому посту все элементы таксономий (рубрики, метки и т.д.) старого
			 */
			$taxonomies = get_object_taxonomies($post->post_type); // возвращает массив названий таксономий, используемых для указанного типа поста, например array("category", "post_tag");
			foreach ($taxonomies as $taxonomy) {
				$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
				wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
			}
			
			/*
			 * дублируем все произвольные поля
			 */
			$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
			if (count($post_meta_infos)!=0) {
				$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
				foreach ($post_meta_infos as $meta_info) {
					$meta_key = $meta_info->meta_key;
					$meta_value = addslashes($meta_info->meta_value);
					$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
				}
				$sql_query.= implode(" UNION ALL ", $sql_query_sel);
				$wpdb->query($sql_query);
			}
			
			
			/*
			 * и наконец, перенаправляем пользователя на страницу редактирования нового поста
			 */
			wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
			exit;
		} else {
			wp_die('Ошибка создания поста, не могу найти оригинальный пост с ID=: ' . $post_id);
		}
	}
	add_action( 'admin_action_true_duplicate_post_as_draft', 'true_duplicate_post_as_draft' );
	
	/*
	 * Добавляем ссылку дублирования поста для post_row_actions
	 */
	function true_duplicate_post_link( $actions, $post ) {
		if (current_user_can('edit_posts')) {
			$actions['duplicate'] = '<a href="admin.php?action=true_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Дублировать этот пост" rel="permalink">Дублировать</a>';
		}
		return $actions;
	}
	
	add_filter( 'post_row_actions', 'true_duplicate_post_link', 10, 2 );
	
	
	//телефон
	function my_more_options(){
		add_settings_field('phone','Телефон','display_phone','general');
		register_setting('general','my_phone');
	}
	add_action('admin_init','my_more_options');
	function display_phone(){
		echo "<input type='text' name='my_phone' value='".esc_attr(get_option('my_phone'))."'>";
	}
	//фейсбук
	function my_fb_link_options(){
		add_settings_field('fb_link','Ссылка на фаейсбук','display_fb_link','general');
		register_setting('general','fb_link');
	}
	add_action('admin_init','my_fb_link_options');
	function display_fb_link(){
		echo "<input type='text' name='fb_link' value='".esc_attr(get_option('fb_link'))."'>";
	}
	//Вк
	function my_vk_link_options(){
		add_settings_field('vk_link','Ссылка на вк','display_vk_link','general');
		register_setting('general','vk_link');
	}
	add_action('admin_init','my_vk_link_options');
	function display_vk_link(){
		echo "<input type='text' name='vk_link' value='".esc_attr(get_option('vk_link'))."'>";
	}
	//инстаграмм
	function my_in_link_options(){
		add_settings_field('in_link','Ссылка на инстаграмм','display_in_link','general');
		register_setting('general','in_link');
	}
	add_action('admin_init','my_in_link_options');
	function display_in_link(){
		echo "<input type='text' name='in_link' value='".esc_attr(get_option('in_link'))."'>";
	}
	//Реквизиты
	function add_option_Requisites_to_general_admin_page(){
		add_settings_field('requisites','Реквизиты','display_requisites','general');
		register_setting('general','my_requisites');
	}
	add_action('admin_init','add_option_Requisites_to_general_admin_page');
	function display_requisites(){
		echo "<textarea name='my_requisites' rows='5' cols='60' type='textarea'>".esc_attr(get_option('my_requisites'))."</textarea>";
	}
	//ФИО
	function add_option_fio_to_general_admin_page(){
		add_settings_field('fio','ФИО должность Директора','display_fio','general');
		register_setting('general','my_fio');
	}
	add_action('admin_init','add_option_fio_to_general_admin_page');
	function display_fio(){
		echo "<textarea name='my_fio' rows='5' cols='60' type='textarea'>".esc_attr(get_option('my_fio'))."</textarea>";
	}
	// footer__info
	function add_option_footer__info_text_to_general_admin_page(){
		add_settings_field('my_footer__info_text','Текст в футере','display_footer__info_text','general');
		register_setting('general','my_footer__info_text');
	}
	add_action('admin_init','add_option_footer__info_text_to_general_admin_page');
	function display_footer__info_text(){
		echo "<textarea name='my_footer__info_text' rows='5' cols='60' type='textarea'>".esc_attr(get_option('my_footer__info_text'))."</textarea>";
	}
	// map_text
	function add_option_map_text_to_general_admin_page(){
		add_settings_field('my_map_text','Текст над картой','display_map_text','general');
		register_setting('general','my_map_text');
	}
	add_action('admin_init','add_option_map_text_to_general_admin_page');
	function display_map_text(){
		echo "<textarea name='my_map_text' rows='5' cols='60' type='textarea'>".esc_attr(get_option('my_map_text'))."</textarea>";
	}
	
	//миниатюры в постах
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	
	
	//фото директора
	add_action( 'admin_menu', 'register_media_selector_settings_page' );
	function register_media_selector_settings_page() {
		add_submenu_page( 'options-general.php', 'Фото Директора', 'Фото Директора', 'manage_options', 'media-selector', 'media_selector_settings_page_callback' );
	}
	function media_selector_settings_page_callback() {
		// Save attachment ID
		if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ) ) :
			update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
		endif;
		wp_enqueue_media();
		?><form method='post'>
		
		<div class='image-preview-wrapper'>
			<img id='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>' height='320'>
		</div>
		<div>Размер фото 261 x 327</div>
		<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
		<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo get_option( 'media_selector_attachment_id' ); ?>'>
		<input type="submit" name="submit_image_selector" value="Save" class="button-primary">
		</form><?php
	}
	add_action( 'admin_footer', 'media_selector_print_scripts' );
	function media_selector_print_scripts() {
		$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
		?><script type='text/javascript'>
            jQuery( document ).ready( function( $ ) {
                // Uploading files
                var file_frame;
                var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
                var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
                jQuery('#upload_image_button').on('click', function( event ){
                    event.preventDefault();
                    // If the media frame already exists, reopen it.
                    if ( file_frame ) {
                        // Set the post ID to what we want
                        file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                        // Open frame
                        file_frame.open();
                        return;
                    } else {
                        // Set the wp.media post id so the uploader grabs the ID we want when initialised
                        wp.media.model.settings.post.id = set_to_post_id;
                    }
                    // Create the media frame.
                    file_frame = wp.media.frames.file_frame = wp.media({
                        title: 'Select a image to upload',
                        button: {
                            text: 'Use this image',
                        },
                        multiple: false	// Set to true to allow multiple files to be selected
                    });
                    // When an image is selected, run a callback.
                    file_frame.on( 'select', function() {
                        // We set multiple to false so only get one image from the uploader
                        attachment = file_frame.state().get('selection').first().toJSON();
                        // Do something with attachment.id and/or attachment.url here
                        $( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                        $( '#image_attachment_id' ).val( attachment.id );
                        // Restore the main post ID
                        wp.media.model.settings.post.id = wp_media_post_id;
                    });
                    // Finally, open the modal
                    file_frame.open();
                });
                // Restore the main ID when the add media button is pressed
                jQuery( 'a.add_media' ).on( 'click', function() {
                    wp.media.model.settings.post.id = wp_media_post_id;
                });
            });
		</script><?php
	}
	
	//добавление ajax почта
	function my_send_mail(){
		$response['success']=false;
		
		if( isset(  $_REQUEST['email'] ) && isset(  $_REQUEST['name'] ) ){
// следующий шаг - проверка на обязательные поля, у нас это емайл, имя и сообщение
			if( isset( $_REQUEST['name'] )
			    && isset( $_REQUEST['email'] ) && is_email( $_REQUEST['email'] ) // is_email() - встроенная функция WP для проверки корректности емайлов
			    && isset( $_REQUEST['type'] ) ) {
				switch ( $_REQUEST['type']){
					case 'mfo':
						$usluga = 'МФО';
						break;
					case 'uslugi':
						$usluga = 'Юр. Услуга';
						break;
					default:
						$usluga = 'Все';
				}
				
				$headers = array(
					'Content-type: text/html; charset=utf-8',
					'From: ' . $_REQUEST['name'] . ' <' . $_REQUEST['email'] . '>'
				);
				$msg=' Подпишите меня на рассылку "'.$usluga.'"
	имя : '  . $_REQUEST['name'].'
	почта : ' . $_REQUEST['email'] . '

	data : ' . date('d.m.Y  H:i:s'). ' .';
				
				if( wp_mail( get_option('admin_email'), 'Сообщение с сайта :: Подпишите меня на рассылку !', wpautop( $msg ), $headers ) ) {
					$response['success']=true;
				}
			}
		}

		header('Content-Type: application/json');
		echo json_encode($response);
		wp_die();
	}
	add_action('wp_ajax_nopriv_send_mail','my_send_mail');
	add_action('wp_ajax_send_mail','my_send_mail');