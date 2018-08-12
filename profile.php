<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Личный кабинет
 */

if(!is_user_logged_in()) {
  header('Location: /');
}

get_header(); // подключаем header.php ?> 

<?php 
  $id = get_current_user_id();
  if(isset($_POST)) {
    if(isset($_POST['oldPassword'])) {
      if (wp_check_password( $_POST['oldPassword'], wp_get_current_user()->user_pass, $id )) {
        if ($_POST['newPassword'] == $_POST['repeatPassword']) {
          wp_set_password( $_POST['newPassword'], $id );
        }
        else {
          echo '<script>alert("Ошибка. Пароли не совпадают");</script>';
        }
      }
      echo '<script>alert("Ошибка. Старый пароль не верен");</script>';
    }
    else {
    foreach($_POST as $meta_key => $meta) {
      update_user_meta( $id, $meta_key, $meta);
    }
    wp_update_user(['ID' => $id, 'user_email' => get_user_meta( $id, $key = 'user_email', true)]);
    }
  }

?>

	<div class="password-reset modal-win">
    <div class="closeCross"></div>
    <form class="password-reset-form" method="post">
      <div class="password-reset-input">
        <label for="">
          <span>Старый пароль</span>
          <input type="password" name="oldPassword" placeholder="">
        </label>
      </div>
      <div class="password-reset-input">
        <label for="">
          <span>Новый пароль</span>
          <input type="password" name="newPassword" placeholder="">
        </label>
      </div>
      <div class="password-reset-input">
        <label for="">
          <span>Повторите пароль</span>
          <input type="password" name="repeatPassword" placeholder="">
        </label>
      </div>
      <div class="password-reset-button">
        <input type="submit" value="Сохранить">
      </div>
    </form>
  </div>

  <div class="ok-button modal-win">
    <div class="button">
      <button>OK</button>
    </div>
    <div class="text">
    	<span>Ваш пароль успешно изменен</span>
    </div>
  </div>

  <div class="del-avatar-window-sure modal-win">
    <div class="closeCross"></div>
    <h6 class="del-avatar-text">Вы точно хотите удалить свою аватарку?</h6>
    <div class="del-avatar-buttons">
      <div class="del-avatar-button">Удалить</div>
      <div class="del-avatar-cancel">Отмена</div>
    </div>
  </div>

  <div class="wrapper">

    <section class="main-profile-personal">

      <div class="user-profile">
        <div class="main-profile-person-avatar">
          <div class="profile-avatar"></div>
          <a href="#" class="profile-cross closeCross"></a>
          <div class="del-avatar-tip">
           	Удалить аватарку
          </div>
          <a href="#" class="profile-add-avatar"></a>
        </div>

        <div class="profile-menu">
          <div class="profile-menu-change-cat">
            <div class="profile-menu-trigger">
              <span>Профиль</span>
            </div>
            <div class="profile-category-menu">
              <ul class="profile-category-list">
                <li><a href="#" class="profile-category-userData">Личные данные</a></li>
                <li><a href="#" class="profile-category-favoriteCourses" data-none-background="1">Избранные курсы</a></li>
                <li><a href="#" class="profile-category-favoriteArticles" data-none-background="1">Избранные статьи</a></li>
              </ul>
            </div>
          </div>
          <br>
          <a href="#" class="profile-menu-password">
              Изменить пароль
          </a> 
        </div>
			</div>
		</section>

  	<div class="profile-tabs-cont">  

    <section class="user-form-section">

      <?php 
        $username = get_user_meta($id, 'user_login', true);
        $email = get_user_meta($id, 'user_email', true);
        $first_name = get_user_meta($id, 'first_name', true);
        $last_name = get_user_meta($id, 'last_name', true);
        $city = get_user_meta($id, 'city', true);
        $phone = get_user_meta($id, 'phone', true);
        $child = get_user_meta($id, 'child', true);
        $child_name = get_user_meta($id, 'child_name', true);
        $child_age = get_user_meta($id, 'child_age', true);
      ?>

      <form method="post" class="user-form">
				<div class="user-form-input">
           <label for="#"><span>Ваш логин</span><input value="<?= $username ?>" type="text" placeholder="Введите логин" name="user_login" class="user-form-black-placeholder" required></label>
          <div class="wrong-input unactive"></div>
        </div>

        <div class="user-form-input user-form-div-margin">
          <label for="#"><span>Ваше имя</span><input value="<?= $first_name ?>" type="text" placeholder="Введите имя" name="first_name" required></label>
        </div>

        <div class="user-form-input user-form-div-margin">
          <label for="#"><span>Ваш город</span><input value="<?= $city  ?>" type="text" placeholder="Введите город" name="city"></label>
        </div>

        <div class="user-form-input">
          <label for="#"><span>Электронная почта</span><input value="<?= $email ?>" type="email" placeholder="Введите почту" name="user_email" required></label>
          <div class="wrong-input unactive"></div>
        </div>

        <div class="user-form-input user-form-div-margin">
          <label for="#"><span>Ваша фамилия</span><input value="<?= $last_name  ?>" type="text" placeholder="Введите фамилию" name="last_name" required></label>
        </div>

        <div class="user-form-input user-form-div-margin">
          <label for="#"><span>Ваш телефон</span><input value="<?= $phone  ?>" type="tel" placeholder="(066) 123 45 67" name="phone"></label>
          <div class="wrong-input unactive"></div>
        </div>

        <div class="user-form-radio">
          <div class="user-question">
            У вас есть ребeнок
          </div>
          <div class="user-radio">
              <div>
                <input <?= $child == 'yes' ? 'checked' : '' ?> type="radio" id="child-availability-yes" class="customCheckbox" name="child" value="yes">
                <label for="child-availability-yes">Да</label>
              </div>
              <div>
                <input <?= $child != 'yes' ? 'checked' : '' ?> type="radio" id="child-availability-no" class="customCheckbox" name="child" value="no">
                <label for="child-availability-no">Нет</label>
              </div>
          </div>
        </div>

        <div class="user-form-input user-form-div-margin">
          <label for="#"><span>Сколько лет Вашему ребенку</span><input value="<?= $child_age  ?>" type="number" placeholder="" name="child_age"></label>
        </div>

        <div class="user-form-input user-form-div-margin">
          <label for="#"><span>Имя Вашего ребенка</span><input value="<?= $child_name  ?>" type="text" placeholder="" name="child_name"></label>
        </div>

        <div class="user-form-button">
          <button>Сохранить</button>
        </div>
			</form>
  	</section>

   <section class="main-profile-modules">

      <div class="profile-modules">
        <?php $posts = get_favorite_posts('module'); 
        $query = new WP_Query( 
          array('post__in' => $posts ) 
        );
        if($query->have_posts()){
          while($query->have_posts()){ $query->the_post();
        ?>
        <div class="profile-module">

          <div class="profile-module-group">      
            <div class="profile-group-flag"><div class="profile-group-flag-delete">Удалить из избранного</div></div>
            <div class="profile-group-age"><?php the_field('module_age') ?> лет </div>
          </div>
          <div class="profile-modules-date">
            <?php $module_date = get_field('module_date'); ?>
             <span class="profile-modules-date-day"><?= get_array($module_date, 'date')[0]; ?></span>
              <span class="profile-modules-date-month"><?= get_array($module_date, 'date')[1]; ?></span>
              <span class="profile-modules-date-year"><?= get_array($module_date, 'date')[2]; ?></span>
          </div>
          <div class="profile-module-caption">
            Модуль <span class="module-number"><?php the_field('module_number') ?></span>.
              <span class="profile-module-name"><?php the_title(); ?></span>
          </div>
          <div class="profile-module-desc"><?php the_field('module_description') ?>
          </div>
          <a href="<?php the_permalink() ?>" class="profile-module-more">Подробнее</a>
        </div>
      <?php } wp_reset_postdata(); } ?>
      
      </div>

    </section>
    <section class="profile-news-and-blog">

      <div class="profile-news-and-blog-articles">
        <?php $posts = get_favorite_posts('blog'); 
        $query = new WP_Query( 
           [
            'post__in' => $posts,
            'posts_per_page' => 4
          ]
        );
        if($query->have_posts()){
          while($query->have_posts()){ $query->the_post();
        ?>
        <div class="profile-news-and-blog-article">
          <a class="article-link" href="<?php get_permalink() ?>"><!--<div class="module-img-shadow"></div>-->
            <img src="<?php the_post_thumbnail_url('full') ?>" alt=""></a>
          <div>
            <div class="article-date-bar">
              <span class="article-date"><?php the_date('d F Y'); ?></span> 
              <span class="article-reading-time">Читать <?= read_speed(get_the_content(), [' минута', ' минуты', ' минут']); ?></span>
            </div>
            <h4><?php the_title(); ?></h4>
            <div class="news-and-blog-article-desc">
              <?= mb_strimwidth(get_the_content(), 0, 259, $trimmarker = "...", $encoding = mb_internal_encoding()); ?>      
            </div>
            <a class="category-article"><?= get_the_tags()[0]->name ?></a>
          </div>
            <div class="article-favorite-status article-in-favorite"><div>Удалить из избранного</div></div>
        </div>
      <?php } wp_reset_postdata(); } ?>
      </div>

      <div class="results-pagination">
        <span class="results-pagination-prev">
          <svg version="1.1" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                          c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
            </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
          </svg>
        </span>
        <ul class="results-pagination-pages-list">
          <li><a href="#">1 </a></li>
          <li><a href="#"> 2 </a></li>
          <li><a href="#"> 3 </a></li>
          <li><a class="results-pagination-change-page" href="#"> ... </a></li>
          <li><a href="#"> 22</a></li>
        </ul>
        <span class="results-pagination-next">
          <svg version="1.1" id="next-svg" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                      c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                      "></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
          </svg>
        </span>
        <form style="display: none;" action="#" class="change-page-form">
          <input type="text">
          <input type="submit" value="OK">
          <div class="change-page-form-close closeCross"></div>
        </form>
      </div>

    </section>

  </div>


  </div>

<?php get_footer(); // подключаем footer.php ?>