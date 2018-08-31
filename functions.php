<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

add_theme_support('title-tag'); // теперь тайтл управляется самим вп

register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Внизу' // Внизу
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Сайдбар', // Название в админке
	'id' => "sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));
register_sidebar( array(
    'name'          => __( 'Registration', 'twentysixteen' ),
    'id'            => 'sidebar-4',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Login', 'twentysixteen' ),
    'id'            => 'sidebar-5',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
if (!class_exists('clean_comments_constructor')) { // если класс уже есть в дочерней теме - нам не надо его определять
	class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
		public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
			$output .= '<ul class="children">' . "\n";
		}
		public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
			$output .= "</ul><!-- .children -->\n";
		}
	    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
	    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
	        echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n"; // родительский тэг комментария с классами выше и уникальным якорным id
	    	echo '<div class="media-left">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'media-object'))."</div>\n"; // покажем аватар с размером 64х64
	    	echo '<div class="media-body">';
	    	echo '<span class="meta media-heading">Автор: '.get_comment_author()."\n"; // имя автора коммента
	    	//echo ' '.get_comment_author_email(); // email автора коммента, плохой тон выводить почту
	    	echo ' '.get_comment_author_url(); // url автора коммента
	    	echo ' Добавлено '.get_comment_date('F j, Y в H:i')."\n"; // дата и время комментирования
	    	if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
	    	echo "</span>";
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
}

if (!function_exists('pagination')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function pagination() { // функция вывода пагинации
		global $wp_query; // текущая выборка должна быть глобальной
		$big = 999999999; // число для замены
		$links = paginate_links(array( // вывод пагинации с опциями ниже
			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
			'format' => '?paged=%#%', // формат, %#% будет заменено
			'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
			'type' => 'array', // нам надо получить массив
			'prev_text'    => 'Назад', // текст назад
	    	'next_text'    => 'Вперед', // текст вперед
			'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
			'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
			'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
			'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
			'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
			'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
			'before_page_number' => '', // строка перед цифрой
			'after_page_number' => '' // строка после цифры
		));
	 	if( is_array( $links ) ) { // если пагинация есть
		    echo '<ul class="pagination">';
		    foreach ( $links as $link ) {
		    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>"; // если это активная страница
		        else echo "<li>$link</li>"; 
		    }
		   	echo '</ul>';
		 }
	}
}

add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_scripts() { // добавление скриптов
	    if(is_admin()) return false; // если мы в админке - ничего не делаем
	    wp_deregister_script('jquery'); // выключаем стандартный jquery
	    wp_enqueue_script('jq', get_template_directory_uri().'/libs/jquery/jquery-3.2.1.min.js','','',true);
	    wp_enqueue_script('parallax', get_template_directory_uri().'/libs/parallax.js-1.5.0/parallax.min.js','','',true); // и скрипты шаблона
	    wp_enqueue_script('slick', get_template_directory_uri().'/libs/slick-1.8.0/slick/slick.min.js','','',true); // и скрипты шаблона
	    wp_enqueue_script('jqmi', get_template_directory_uri().'/libs/maskedinput-1.4.1/jquery.maskedinput.js','','',true); // и скрипты шаблона
	    wp_enqueue_script('main', get_template_directory_uri().'/js/init.js','','',true); // и скрипты шаблона
	    wp_enqueue_script('wow', get_template_directory_uri().'/libs/forAnimation/wow.min.js','','',true); // и скрипты шаблона

	}
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_styles() { // добавление стилей
	    if(is_admin()) return false; // если мы в админке - ничего не делае
	    wp_enqueue_style( 'norm', get_template_directory_uri().'/css/normalize.css-7.0.0/normalize.css' );
		wp_enqueue_style( 'slick', get_template_directory_uri().'/libs/slick-1.8.0/slick/slick.css' );
		wp_enqueue_style( 'slick-theme', get_template_directory_uri().'/libs/slick-1.8.0/slick/slick-theme.css' );
		wp_enqueue_style( 'anim', get_template_directory_uri().'/libs/forAnimation/animate.min.css' );
		wp_enqueue_style( 'sir', get_template_directory_uri().'/css/sirota.css' );
		wp_enqueue_style( 'bor', get_template_directory_uri().'/css/borisov.css' );
		wp_enqueue_style( 'vis', get_template_directory_uri().'/css/visibilis.css' );
		wp_enqueue_style( 'main', get_template_directory_uri().'/css/main.css' ); // основные стили шаблона
		wp_enqueue_style( 'new', get_template_directory_uri().'/css/new.css' );
	}
}

if (!class_exists('bootstrap_menu')) {
	class bootstrap_menu extends Walker_Nav_Menu { // внутри вывод 
		private $open_submenu_on_hover; // параметр который будет определять раскрывать субменю при наведении или оставить по клику как в стандартном бутстрапе

		function __construct($open_submenu_on_hover = true) { // в конструкторе
	        $this->open_submenu_on_hover = $open_submenu_on_hover; // запишем параметр раскрывания субменю
	    }

		function start_lvl(&$output, $depth = 0, $args = array()) { // старт вывода подменюшек
			$output .= "\n<ul class=\"dropdown-menu\">\n"; // ул с классом
		}
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // старт вывода элементов
			$item_html = ''; // то что будет добавлять
			parent::start_el($item_html, $item, $depth, $args); // вызываем стандартный метод родителя
			if ( $item->is_dropdown && $depth === 0 ) { // если элемент содержит подменю и это элемент первого уровня
			   if (!$this->open_submenu_on_hover) $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"', $item_html); // если подменю не будет раскрывать при наведении надо добавить стандартные атрибуты бутстрапа для раскрытия по клику
			   $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html); // ну это стрелочка вниз
			}
			$output .= $item_html; // приклеиваем теперь
		}
		function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) { // вывод элемента
			if ( $element->current ) $element->classes[] = 'active'; // если элемент активный надо добавить бутстрап класс для подсветки
			$element->is_dropdown = !empty( $children_elements[$element->ID] ); // если у элемента подменю
			if ( $element->is_dropdown ) { // если да
			    if ( $depth === 0 ) { // если li содержит субменю 1 уровня
			        $element->classes[] = 'dropdown'; // то добавим этот класс
			        if ($this->open_submenu_on_hover) $element->classes[] = 'show-on-hover'; // если нужно показывать субменю по хуверу
			    } elseif ( $depth === 1 ) { // если li содержит субменю 2 уровня
			        $element->classes[] = 'dropdown-submenu'; // то добавим этот класс, стандартный бутстрап не поддерживает подменю больше 2 уровня по этому эту ситуацию надо будет разрешать отдельно
			    }
			}
			parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); // вызываем стандартный метод родителя
		}
	}
}

if (!function_exists('content_class_by_sidebar')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function content_class_by_sidebar() { // функция для вывода класса в зависимости от существования виджетов в сайдбаре
		if (is_active_sidebar( 'sidebar' )) { // если есть
			echo 'col-sm-9'; // пишем класс на 80% ширины
		} else { // если нет
			echo 'col-sm-12'; // контент на всю ширину
		}
	}
}

/**
 * Определим константу, которая будет хранить путь к папке single
 */
define( SINGLE_PATH, TEMPLATEPATH . '/single' );
 
/**
 * Добавим фильтр, который будет запускать функцию подбора шаблонов
 */
add_filter( 'single_template', 'my_single_template' );
 
/**
 * Функция для подбора шаблона
 */
function my_single_template( $single ) {
    global $wp_query, $post;
 
    /**
     * Проверяем наличие шаблонов по ID поста.
     * Формат имени файла: single-ID.php
     */
    if ( file_exists( SINGLE_PATH . '/single-' . $post->ID . '.php' ) ) {
        return SINGLE_PATH . '/single-' . $post->ID . '.php';
    }
 
    /**
     * Проверяем наличие шаблонов для категорий, ищем по ID категории или слагу
     * Формат имени файла: single-cat-SLUG.php или single-cat-ID.php
     */
    foreach ( (array) get_the_category() as $cat ) :
 
        if ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
        }
 
    endforeach;
 
    /**
     * Проверяем наличие шаблонов для тэгов, ищем по ID тэга или слагу
     * Формат имени файла: single-tag-SLUG.php или single-tag-ID.php
     */
    $wp_query->in_the_loop = true;
    foreach ( (array) get_the_tags() as $tag ) :
 
        if ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php';
        }
 
    endforeach;
    $wp_query->in_the_loop = false;
 
    /**
     * Если ничего не найдено открываем стандартный single.php
     */
    if ( file_exists( SINGLE_PATH . '/single.php' ) ) {
        return SINGLE_PATH . '/single.php';
    }
 
    return $single;
}

// remove_filter( 'the_content', 'wpautop' ); // Отключаем автоформатирование в полном посте
// remove_filter( 'the_excerpt', 'wpautop' ); // Отключаем автоформатирование в кратком(анонсе) посте
// remove_filter('comment_text', 'wpautop'); // Отключаем автоформатирование в комментариях

function read_speed($content, $titles) {
	$words_per_minute = "150"; // Время чтения слов в минуту
	$img_per_minute = "0"; // Время чтения изображения в секундах
	$img_numb = preg_match_all('~<img~i', $content, $result_numb); // Плучаем общее количество изображений в тексте
	$text_read = round(count(preg_split('/\s/', $content)) /  $words_per_minute, 1); // Получаем общее время чтения текста
	$img_read = floor((count($result_numb[0]) * $img_per_minute) / 60); // Получаем общее время чтения изображений
	$all_read = $img_read + $text_read;
	$all_numb = round($all_read);

	$cases = [2, 0, 1, 1, 1, 2];

	if($all_numb == 0) {
		return "меньше минуты";
	} else {	
		return $all_numb . " " . $titles[($all_numb % 100 > 4 && $all_numb % 100 < 20) ? 2 : $cases[min($all_numb % 10, 5)]];
	}
}

function decl_of_numb($all_numb, $titles) {
 	$cases = [2, 0, 1, 1, 1, 2];
 	return $all_numb . " " . $titles[ ($all_numb % 100 > 4 && $all_numb % 100 < 20) ? 2 : $cases[min($all_numb % 10, 5)] ];
}

function get_array($str, $ref) {
	switch ($ref) {
		case 'date':
			return explode('.', $str);
			break;
		
		case 'nums':
			return explode(',', $str);
			break;

		case 'module_consist':
			return explode('/', $str);
			break;
	}
}

function true_loadmore_scripts() {
	wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
 	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/loadmore.js', array('jquery') );
}
 
add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );

function true_load_posts(){
 
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница

	//$args['posts_per_page'] = 4;
	$query = new WP_Query($args);

	switch($args['category_name']) {
		case 'blog':
			if($query->have_posts())
			{
	          while($query->have_posts())
	          { 
	          	$query->the_post();
	          	?>
					
					<div class="news-and-blog-article wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
				      <a class="article-link" href="<?php the_permalink() ?>">
				        <?php the_post_thumbnail('full'); ?>
				      </a>
				      <div>
				        <div class="article-date-bar">
				          <span class="article-date"><?= get_the_date('d F Y'); ?></span> 
				          <span class="article-reading-time">
				            Читать <?= read_speed(get_the_content(), [' минута', ' минуты', ' минут']); ?>
				          </span>
				        </div>
				        <h4><?php the_title(); ?></h4>
				        <div class="news-and-blog-article-desc">
				          <?= mb_strimwidth(get_the_content(), 0, 259, $trimmarker = "...", $encoding = mb_internal_encoding()); ?>
				        </div>
				        <a class="category-article"><?= get_the_tags()[0]->name ?></a>
				      </div>
				      <div class="article-favorite-status <?php echo is_favorite(get_the_ID()) ? 'article-in-favorite' : 'add-article-in-favorite' ?> forGuest" id="<?php echo get_the_ID() ?>">
				        <div>
				          <?php echo is_favorite(get_the_ID()) ? 'Удалить из избранного' : 'Добавить в избранное' ?>
				        </div>
				      </div>
				    </div>

	          	<?php
	            
	    	  } wp_reset_postdata();
	    	}
	    die();
		break;
		case 'child':
			if( $query->have_posts() ){
				while( $query->have_posts() ){ $query->the_post();
			?>
		      <div class="results-article wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
		        <div class="results-article-title">
		          <div class="results-article-autor"><?php the_title() ?></div>
		          <div class="results-article-autor-info">
		            <span><?php the_field('age') ?> лет</span> 
		            <span>г. <?php the_field('city') ?></span>
		          </div>
		          <h4><?php the_field('description') ?></h4>
		          <div class="results-article-read">
		            <a class="results-article-read-link" href="<?php the_permalink() ?>">Читать подробнее</a>
		          </div>
		        </div>
		        <div class="results-article-photo">
		          <img src="<?php the_post_thumbnail_url('full') ?>" alt="Фото статьи">
		        </div>
		      </div>
		      <?php } wp_reset_postdata(); } ?>
		    </div> <?
		    die();
		break;
		case 'module' :
			if( $query->have_posts() ){
			while( $query->have_posts() ){ $query->the_post();
		?>

      <div class="course">
        <div class="modules-date">
          <span class="modules-date-day"><?= get_array(get_field('module_date'), 'date')[0] ?></span>
          <span class="modules-date-month"><?= get_array(get_field('module_date'), 'date')[1] ?></span>
          <span class="modules-date-year"><?= get_array(get_field('module_date'), 'date')[2] ?></span>
        </div>
        <div class="module-caption">
          Модуль <span class="module-number"><?php the_field('module_number') ?></span>.
          <span class="module-name"><?php the_title() ?></span>
        </div>
        <div class="module-desc"><?php the_field('module_description') ?></div>
        <a href="<?php the_permalink() ?>" class="module-more">Подробнее</a>
        <div class="module-group">      
          <div class="group-age"><?php the_field('module_age') ?> лет </div>
          <div class="group-flag" id="<?php echo get_the_ID() ?>"></div>
        </div>
      </div>
		<?php }
		wp_reset_postdata();
		}
		die();
		break;
	}

	
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

function registrate() {
	$username = explode('@', $_POST['email'])[0];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$user = wp_create_user( $username, $password, $email);
	if ( is_wp_error( $user_id ) ) {
		echo $user->get_error_message();
	}
	else {
		echo 'Юзер создан.';
	}
}

function check_register() {
  if($_POST['password'] !== $_POST['password_repeat']) {
    echo '<script> alert("Пароли не совпадают")</script>';
  }
  else {

    $username = explode('@', $_POST['reg-email'])[0];
    $password = $_POST['password'];
    $email = $_POST['reg-email'];

    $user = wp_create_user($username, $password, $email);

    if(is_wp_error($user)) {
     echo '<script> alert("'. $user->get_error_message() .'") </script>';
    }
    else {
      echo '<script> alert("Успешная регистрация")</script>';
      update_user_meta( $user, 'user_login', $username);
      update_user_meta( $user, 'user_email', $email);
      wp_authenticate( $username, $password );
      //header('Location: /account');
    }
  }
}

function check_login() {
  $username = $_POST['login-email'];
  $password = $_POST['login-password'];

  $credentials = [
    'user_login'    => $username,
    'user_password' => $password,
    'remember'      => $_POST['rememberMe'],
  ];

  $user = wp_signon($credentials);

  if(is_wp_error($user)) {
     echo '<script> alert("'. $user->get_error_message() .'") </script>';
    }
  else {
    echo '<script> alert("Успешная авторизация")</script>';
    wp_authenticate( $username, $password );
    //header('Location: /account');
  }
}

function get_favorite_posts($category) { //Возвращает массив с избранными постами по наз. категории
	return explode(',', get_user_meta(get_current_user_id(), 'favorite_'.$category, true));
}

function is_favorite($id) {
	return in_array($id, get_favorite_posts(get_the_category($id)[0]->cat_name));
}

function add_post_to_favorite() {
	$post_id = $_POST['post_id'];
	$cat = get_the_category($post_id)[0]->cat_name;
	$favorites = get_favorite_posts($cat);
	$favorites[] = $post_id;
	$favorites = array_unique($favorites); // Чтобы не добавлялись дубли
	$favorites = implode(',', $favorites);
	echo update_user_meta( get_current_user_id(), 'favorite_'.$cat, $favorites, '') ? 'Добавил' : delete_post_from_favorites();
	//var_dump(get_user_meta( get_current_user_id(), 'favorite_'.$cat));
	die();
}

function delete_post_from_favorites() {
	$post_id = $_POST['post_id'];
	$cat = get_the_category($post_id)[0]->cat_name;
	$favorites = get_favorite_posts($cat);

	$key = array_search($post_id, $favorites);
	if(array_key_exists($key, $favorites)) unset($favorites[$key]);

	$favorites = implode(',', $favorites);
	echo update_user_meta( get_current_user_id(), 'favorite_'.$cat, $favorites) ? 'Удалил' : add_post_to_favorite();
	//var_dump(get_user_meta( get_current_user_id(), 'favorite_'.$cat));
	die();
}

add_action( 'wp_ajax_add_to_fav', 'add_post_to_favorite' );
add_action( 'wp_ajax_nopriv_add_to_fav', 'add_post_to_favorite' );

add_action( 'wp_ajax_del_from_fav', 'delete_post_from_favorites' );
add_action( 'wp_ajax_nopriv_del_from_fav', 'delete_post_from_favorites' );



include('cycles.php'); //Получить шаблоны циклов
add_filter( 'login_form_middle', 'add_password_forgotten', 10, 2 );
function add_password_forgotten(){
	$content = '<a href="'.home_url('/password-reset/').'" id="remindPass"><span>Напомнить парль?</span></a>';
	return $content;
}

add_action('wp_footer', 'my_action_javascript', 99);
function my_action_javascript() {
	
  ?>
  <script type="text/javascript" >
  jQuery(document).ready(function($) {
    jQuery('.wpum-login-form form').submit(function(e){
		var myajax = "<?php echo admin_url( 'admin-ajax.php' );?>";
      var flag=true;
     // data = { action: 'login_action', log: jQuery('#user_login').val(), pwd: jQuery('#user_pass').val() };
      jQuery.ajax({
        method: "POST",
        url: myajax,
        data: { action: 'login_action', log: jQuery('#user_login').val(), pwd: jQuery('#user_pass').val() },
        async:false
      }).done(function(response){
        if(response == 'error'){
          jQuery('.wpum-login-form').addClass('error-form');
          flag = false;
        }else{
          flag = true;
        }
      })
      return flag;
    })
  });
  </script>
  <?php
}
add_action( 'wp_ajax_login_action', 'login_action_callback' );
add_action( 'wp_ajax_nopriv_login_action', 'login_action_callback' );
function login_action_callback(){
  $user = get_user_by( 'email', $_POST['log'] );
  if ( $user && wp_check_password( $_POST['pwd'], $user->data->user_pass, $user->ID) && $user->roles[0] != 'administrator'){
  }else{
    echo 'error';
  }
  wp_die();
}
add_action('wp_footer', 'register_action_javascript', 99);
function register_action_javascript() {
  ?>
  <script type="text/javascript" >
  jQuery(document).ready(function($) {
    jQuery('.wpum-registration-form').submit(function(e){
			console.log(jQuery('input[name="password_confirm"]').val(), jQuery('#password').val());
			if(jQuery('input[name="password_confirm"]').val() != jQuery('#password').val()){
				jQuery('input[name="password_confirm"]').addClass('invalidInput');
				return false;
			}
			var myajax = "<?php echo admin_url( 'admin-ajax.php' );?>";
      var flag=true;
      jQuery.ajax({
        method: "POST",
        url: myajax,
        data: { action: 'register_action', r_email: jQuery('#user_email').val(), username: jQuery('#user_email').val()},
        async:false
      }).done(function(response){
				jQuery('.wpum-registration-form input[type="email"]').removeClass('invalidInput');
				if(response == 'error'){
					jQuery('.wpum-registration-form input[type="email"]').addClass('invalidInput');
          jQuery('.wpum-registration-form').addClass('error-form');
          flag = false;
        }else{
          flag = true;
        }
      })
      return flag;
    })
  });
  </script>
  <?php
}
add_action( 'wp_ajax_register_action', 'register_action_callback' );
add_action( 'wp_ajax_nopriv_register_action', 'register_action_callback' );
function register_action_callback(){	
	if ( $user = get_user_by( 'login', $_POST['r_email']) ) {
		echo 'error';
	}
  wp_die();
}
?>
