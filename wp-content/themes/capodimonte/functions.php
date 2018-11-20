<?php
session_start();
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

add_action('wp_ajax_get_menu_items', 'get_menu_items');
add_action('wp_ajax_nopriv_get_menu_items', 'get_menu_items');

add_action('wp_ajax_add_to_cart', 'add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');

add_action('wp_ajax_del_from_cart', 'del_from_cart');
add_action('wp_ajax_nopriv_del_from_cart', 'del_from_cart');

add_action('wp_ajax_change_quantity', 'change_quantity');
add_action('wp_ajax_nopriv_change_quantity', 'change_quantity');

add_action('wp_ajax_get_subcat', 'get_subcat');
add_action('wp_ajax_nopriv_get_subcat', 'get_subcat');

add_action('wp_ajax_send_order', 'send_order');
add_action('wp_ajax_nopriv_send_order', 'send_order');

add_action('wp_ajax_reserved', 'reserved');
add_action('wp_ajax_nopriv_reserved', 'reserved');

add_action('wp_ajax_get_states', 'get_states');
add_action('wp_ajax_nopriv_get_states', 'get_states');



function typical_title() { // функция вывода тайтла
	global $page, $paged; // переменные пагинации должны быть глобыльными
	wp_title('|', true, 'right'); // вывод стандартного заголовка с разделителем "|"
	bloginfo('name'); // вывод названия сайта
	$site_description = get_bloginfo('description', 'display'); // получаем описание сайта
	if ($site_description && (is_home() || is_front_page())) //если описание сайта есть и мы на главной
		echo " | $site_description"; // выводим описание сайта с "|" разделителем
	if ($paged >= 2 || $page >= 2) // если пагинация была использована
		echo ' | '.sprintf(__( 'Страница %s'), max($paged, $page)); // покажем номер страницы с "|" разделителем
}

register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Внизу' // Внизу
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Колонка слева', // Название в админке
	'id' => "left-sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
	public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
		$output .= '<ul class="children">' . "\n";
	}
	public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
		$output .= "</ul><!-- .children -->\n";
	}
    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
        echo '<li id="li-comment-'.get_comment_ID().'" class="'.$classes.'">'."\n"; // родительский тэг комментария с классами выше и уникальным id
    	echo '<div id="comment-'.get_comment_ID().'">'."\n"; // элемент с таким id нужен для якорных ссылок на коммент
    	echo get_avatar($comment, 64)."\n"; // покажем аватар с размером 64х64
    	echo '<p class="meta">Автор: '.get_comment_author()."\n"; // имя автора коммента
    	echo ' '.get_comment_author_email(); // email автора коммента
    	echo ' '.get_comment_author_url(); // url автора коммента
    	echo ' Добавлено '.get_comment_date('F j, Y').' в '.get_comment_time()."\n"; // дата и время комментирования
    	if ( '0' == $comment->comment_approved ) echo '<em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
        comment_text()."\n"; // текст коммента
        $reply_link_args = array( // опции ссылки "ответить"
        	'depth' => $depth, // текущая вложенность
        	'reply_text' => 'Ответить', // текст
			'login_text' => 'Вы должны быть залогинены' // текст если юзер должен залогинеться
        );
        echo get_comment_reply_link(array_merge($args, $reply_link_args)); // выводим ссылку ответить
        echo '</div>'."\n"; // закрываем див
    }
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
		$output .= "</li><!-- #comment-## -->\n";
	}
}

function pagination() { // функция вывода пагинации
	global $wp_query; // текущая выборка должна быть глобальной
	$big = 999999999; // число для замены
	echo paginate_links(array( // вывод пагинации с опциями ниже
		'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
		'format' => '?paged=%#%', // формат, %#% будет заменено
		'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
		'type' => 'list', // ссылки в ul
		'prev_text'    => 'Prev', // текст назад
    	'next_text'    => 'Next', // текст вперед
		'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
		'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
		'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
		'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
		'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
		'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
		'before_page_number' => '', // строка перед цифрой
		'after_page_number' => '' // строка после цифры
	));
}

function get_menu_items ()
{
	$html = '';
	$args = array(
		'numberposts' => -1,
		'category'    => $_POST['cat_id'],
		'orderby'     => 'date',
		'order'       => 'DESC',
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_type'   => 'post',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	);

	$posts = get_posts( $args );

	if($posts)
		foreach ($posts as $post)
		{
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post');
			$html .= '<div class="dish">
  							<img class="dish_img" src="'.$img[0].'" alt="dish">
  							<div class="info-wrap clearfix">
	  							<div class="dish_name">'.$post->post_title.'</div>
	  							<div class="dish_text">'.$post->post_content.'</div>
	  							<div class="dish_price">'.round(get_field('menu_price', $post->ID));
            if(qtranxf_getLanguage() == 'ru')
                $html .= ' ГРН';
            else if(qtranxf_getLanguage() == 'en') {
                $html .= ' UAH';
            }
            $html .= '</div>
  							</div>
						</div>';
		}

	echo $html;

	wp_die();
}

function add_to_cart ()
{
	$product_info = array(
		'post_id' => $_POST['post_id'],
		'count' => $_POST['quantity'],
		'size' => $_POST['size']
	);

	$new_array[] = $product_info;

	if ($_SESSION['cart']) {
		$new_array = $_SESSION['cart'];
		$find = false;
		foreach ($new_array as $i => $item) {
			if ($_POST['size']) {
				if ($item['post_id'] == $_POST['post_id'] && $_POST['size'] == $item['size']) {
					$key = $i;
					$find = true;
					break;
				}
			}
			else
			{
				if ($item['post_id'] == $_POST['post_id']) {
					$item['count'] = $_POST['new_value'];
					$find = true;
					$key = $i;
					break;
				}
			}

		}
		if (!$find) {
			$new_array[] = $product_info;
		} else {
			$new_array[$key]['count'] += $_POST['quantity'];
		}
	}

	$html = '';
	$_SESSION['cart'] = $new_array;
	$total = 0;

	if ($_SESSION['cart'])
	{
		foreach ($_SESSION['cart'] as $item)
		{
			$post = get_post($item['post_id']);
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post');
			if ($item['size'] == '40 см')
				$price = round(get_field('menu_price_40', $post->ID));
			else
				$price = round(get_field('menu_price', $post->ID));

			$html .= '<div class="cart_pop_up_dish">
            <img class="cart_dish_img" src="'.$img[0].'" alt="блюдо">
            <span class="cart_dish_name">'.$post->post_title.' '.($item['size'] ? '('.$item['size'].')' : '' ).'</span>
            <span class="cart_dish_price">'.$price.'</span>
            <span id="dish_size_number" style="display: none;">'.$item['size'].'</span>
            <span class="cart_dish_currency">грн.</span>
            <span class="cart_dish_count"><input id="cnt_items" type="number" onchange="plus_minus_add_to_cart(this ,'.$post->ID.')" min="1" max="99" value="'.$item['count'].'" style="width: 100%"></span>
            <span class="cart_dish_unit">шт.</span>
            <span class="cart_dish_total_price">'.$price*$item['count'].'</span>
            <span class="cart_dish_currency">грн.</span>
            <span class="cart_dish_cancel" onclick="del_from_cart('.$post->ID.', this)"></span>
          </div>';
			$total += $price*$item['count'];
		}
	}
	$request_array = array('code' => $html, 'total' => $total);
	echo json_encode($request_array);
	wp_die();
}

function del_from_cart() {
	if ($_SESSION['cart']) {
		$new_array = $_SESSION['cart'];
		$find = false;
		foreach($new_array as $i => $item)
    {
		if (isset($_POST['size'])) {
			if ($item['post_id'] == $_POST['post_id'] && $_POST['size'] == $item['size']) {
				$key = $i;
				$find = true;
				break;
			}
		}
		else
		{
			if ($item['post_id'] == $_POST['post_id']) {
				$item['count'] = $_POST['new_value'];
				$find = true;
				$key = $i;
				break;
			}
		}


	}
    if ($find) {
		unset($new_array[$key]);
		sort($new_array);
	}
		$total = 0;
		foreach ($new_array as $item)
		{
			if ($item['size'] == '40 см')
				$total += round(get_field('menu_price_40', $item['post_id']))*$item['count'];
			else
				$total += round(get_field('menu_price', $item['post_id']))*$item['count'];
		}
    $_SESSION['cart'] = $new_array;
		echo $total;
  }
	wp_die();
}

function change_quantity ()
{
	if ($_SESSION['cart'])
	{
		$total = 0;
		$curr_total = 0;
		$new_array = $_SESSION['cart'];
		$find = false;
		$key = 0;
		foreach($new_array as $i => $item)
		{
			if ($_POST['size']) {
				if ($item['post_id'] == $_POST['post_id'] && $_POST['size'] == $item['size']) {
					$item['count'] = $_POST['new_value'];
					$find = true;
					$key = $i;
					break;
				}
			}
			else
			{
				if ($item['post_id'] == $_POST['post_id']) {
					$item['count'] = $_POST['new_value'];
					$find = true;
					$key = $i;
					break;
				}
			}
		}
		if ($find)
			$new_array[$key]['count'] = $_POST['new_value'];

		if ($new_array[$key]['size'] == '40 см')
			$curr_total = ($new_array[$key]['count'] * get_field('menu_price_40',$_POST['post_id']));
		else
			$curr_total = ($new_array[$key]['count'] * get_field('menu_price',$_POST['post_id']));


		$_SESSION['cart'] = $new_array;
		$cnt = 0;
		foreach ($new_array as $item)
		{
			$cnt += $item['count'];
			if ($item['size'] == '40 см')
				$total += round(get_field('menu_price_40', $item['post_id']))*$item['count'];
			else
				$total += round(get_field('menu_price', $item['post_id']))*$item['count'];
		}
		$response = array('curr' => $curr_total, 'total' => $total, 'quantity' => $cnt);
		echo json_encode($response);
	}
	wp_die();
}

function get_subcat()
{
	if ($_POST['sub_cat'] == 'pizza') {
		$args = array(
			'numberposts' => 8,
			'category' => $_POST['post_id'],
			'orderby' => 'date',
			'order' => 'DESC',
			'include' => array(),
			'exclude' => array(),
			'meta_key' => '',
			'meta_value' => '',
			'post_type' => 'post',
			'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		);

		$posts = get_posts($args);

		if ($posts)
			foreach ($posts as $post) {
				$sizes = get_field('size', $post->ID);
				if (count ($sizes) == 2)
				{
					$price = round(get_field('menu_price', $post->ID));
					$price40 = round(get_field('menu_price_40', $post->ID));
					$weight = get_field('weight', $post->ID);
					$weight40 = get_field('weight_40', $post->ID);
				}
				else if (count($sizes) == 1 && $sizes[0]== 40) {
					$price = round(get_field('menu_price_40', $post->ID));
					$weight = get_field('weight_40', $post->ID);
				}
				else {
					$price = round(get_field('menu_price', $post->ID));
					$weight = get_field('weight', $post->ID);
				}

				$img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post');
				echo '<div class="dish">
              <div class="dish_img_wrap">
                <img src="' . $img[0] . '" alt="блюдо">
              </div>
              <div class="dish_content_wrap">
                <div class="dish_name">' . $post->post_title . '</div>
                <div class="dish_composition">' . $post->post_content . '</div>
                <div class="dish_weight">
                  <span class="dish_weight_number">' . $weight . '</span>
                  <span class="dish_weight_measure">г.</span>
                </div>
                <div class="dish_price">
                  <span class="dish_price_number">' . $price . '</span>
                  <span class="dish_price_currency">грн.</span>
                </div>
                <div class="dish_size">
                ';
				foreach (get_field('size', $post->ID) as $i => $size) {
					$active = '';
					if ($i == 0)
						$active = 'active';
					if ($i == 1) {
						$price = $price40;
						$weight = $weight40;
					}
					echo '<div class="dish_size_choose ' . $active . '" onclick="$(this).parent().parent().find(\'.dish_price_number\').html('.$price.');$(this).parent().parent().find(\'.dish_weight_number\').html('.$weight.');">
                    <span class="dish_size_number">' . $size . '</span>
                    <span class="dish_measure_measure">см</span>
                  </div>';
				}

				echo '</div>
                <div class="add_to_cart" onclick="add_to_cart(' . $post->ID . ', this)">В коробку</div>
              </div>
              </div>';
			}
	}
	else if ($_POST['sub_cat'] == 'lunch') {
		$args = array(
			'numberposts' => -1,
			'category' => $_POST['post_id'],
			'orderby' => 'date',
			'order' => 'DESC',
			'include' => array(),
			'exclude' => array(),
			'meta_key' => '',
			'meta_value' => '',
			'post_type' => 'post',
			'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		);

		$posts = get_posts($args);

		var_dump($posts);
		foreach ($posts as $post) {
			$img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post');

			echo '<form class="form dish" action="form.php" >
              <div class="european_lunch">
                <div class="lunch_title">' . $post->post_title . '</div>
                <img class="lunch_img" src="' . $img[0] . '" alt="Ланч">
                <div class="lunch_content">';

			foreach (get_field('lunch', $post->ID) as $j => $item) {
				echo ' <div class="selection_dish">
                    <div class="dish_title">' . $item['name_dish'] . '</div>';
				foreach ($item['type'] as $i => $type) {
					echo '<label for="type_'.$i.$j.'">
                      <input type="radio" name="type_'.$j.'" id="type_'.$i.$j.'" value="'.$type['varible_type'].'" onclick="$(this).parent().parent().parent().find(\'.add_to_cart\').addClass(\'active\');">
                      <span></span>
                      ' . $type['varible_type'] . '
                    </label>';
				}
				echo '</div>';
			}

			echo '<div class="clear"></div>
                  <div class="submit_block">
                    <span class="sum_number">' . round(get_field('menu_price', $post->ID)) . '</span>
                    <span class="sum_currency">грн.</span>
                    <div class="add_to_cart" onclick="add_to_cart('.$post->ID.', this)" >Заказать</div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </form>';
		}
	}
	wp_die();
}

function send_order ()
{

	$email = $_POST['email'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];

	$total = 0;
	$message = '';
		$cart = $_SESSION['cart'];
		foreach ($cart as $product)
		{
			if($product['size'])
				$size = $product['size']. ' см';
			else
				$size = '';

			$post = get_post($product['post_id']);
			$price = get_field('menu_price', $product['post_id']);
			$total += $price*$product['count'];

			$message .= 'ВАШ ЗАКАЗ:<br><br>'.$post->post_title.' '.$size.' - '.$product['count']. ' X '.$price.' грн.<br>' ;

		}
	$message .= '<hr>Всего: '.$total.' грн.<br><br>Покупатель: <br><br>'.$name.'<br>'.$email.'<br>'.$address.'<br>'.$phone;

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: You order on Capo di Monte <info@bitnami.com>' . "\r\n";

	//wp_mail($email, get_option('blogname'), $message, $headers);
	wp_mail('montedicapo@gmail.com', get_option('blogname'), $message, $headers);

	$_SESSION['cart'] = array();
	header('Location: '.$_SERVER['HTTP_REFERER']);

	echo $message;
	wp_die();
}


function reserved ()
{
	$guests = $_POST['guests'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$date = $_POST['date'];

	$message = '';

	if ($_POST['address'] == 'Obolon')
		$message = '<h1>Бронирование стола на Оболони:</h1><br><br>';
	if($_POST['address'] == 'Sagadskogo')
		$message = '<h1>Бронирование стола на Сагадского:</h1><br><br>';

	$message .= 'Имя: '.$name.'<br>'.'Количество человек: '.$guests.'<br>'.'Телефон: '.$phone.'<br>'.'Дата и время: '.$date.'<br>';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: You order on Capo di Monte <info@bitnami.com>' . "\r\n";

	//wp_mail($email, get_option('blogname'), $message, $headers);
	wp_mail('montedicapo@gmail.com', get_option('blogname'), $message, $headers);

	header('Location: '.$_SERVER['HTTP_REFERER']);

	echo $message;
	wp_die();
}






show_admin_bar( false );


// Спрятать ненужные пункты меню
function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'edit.php' );                   //Posts
  // remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings

  
}
add_action( 'admin_menu', 'remove_menus' );



// Меняем ярлык записей
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Меню';
    $submenu['edit.php'][5][0] = 'Позиции';
    $submenu['edit.php'][10][0] = 'Добавить позицию';
    $submenu['edit.php'][16][0] = 'Тег позиции';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'позиции';
    $labels->singular_name = 'позиции';
    $labels->add_new = 'Добавить позицию';
    $labels->add_new_item = 'Добавить позицию';
    $labels->edit_item = 'Настройки позиций';
    $labels->new_item = 'позиция';
    $labels->view_item = 'Смотреть позицию';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );


function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


function get_states ()
{

    $posts = get_field('news_posts', 7);
	$state_id = $_POST['state_id'];

	$post = $posts[$state_id];
	$html = '';

	$html .= '<div class="article_view_close"></div>
					<img class="article_view_img" src="'.$post['pfoto'].'" alt="article">
					<div class="article_view_name">'.$post['ptitle'].'</div>
					<div class="article_view_text">'.$post['pcontent'].'
					</div>';
	echo $html;

	wp_die();
}
?>
