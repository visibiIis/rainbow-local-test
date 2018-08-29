<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Результаты учеников
 */
get_header(); // подключаем header.php ?>

  <section id="video-bg" class="childern-results-video">
    <video width="100%" height="auto" preload="auto" autoplay="autoplay"
    loop="loop" poster="<?php bloginfo('template_directory'); ?>/resources/img/videoBg/daisy-stock-poster.jpg">
      <source src="<?php bloginfo('template_directory'); ?>/resources/video/daisy-stock-h264-video.mp4" type="video/mp4"></source>
      <source src="<?php bloginfo('template_directory'); ?>/resources/video/daisy-stock-webm-video.webm" type="video/webm"></source>
    </video>
    <a href="#" id="playYoutube" class="childern-results-video-play"></a>
  </section>

  <div class="results-video-cont">
    <iframe id="Youtube" src="https://www.youtube.com/embed/8UibZVodz94?enablejsapi=1" frameborder="0" autoplay="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <div id="pauseYoutube" class="results-video-close closeCross"></div>
  </div>

  <section class="results-acrticles">
    <h3 class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">Результаты Учеников</h3>
    <div class="results-acrticles-cont">
    	<?php 
			$args = [
        'posts_per_page' => 2
      ];
			get_childs($args);
      ?>
      <div id="posts"></div>
    </div>

    <?php

      $posts = get_posts( array(
        'numberposts' => -1,
        'category'    => 7,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ) );

      $posts_number = count($posts);
      
    ?>

    <?php if ($posts_number > 2 ) : ?>
    <div id="true_loadmore" class="showMoreResArticles">
        <span>Больше статей</span>
        <div class="unactive"></div>
    </div>
    <?php endif ?>

  </section>

  <section class="win-callback-init wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h3>Цени свое время!</h3>
    <div>Приходи на первое ознакомительное занятие</div>
    <a class="win-callback-init-link" href="#">Присоединяйся</a>
  </section>
  <div class="win-callback modal-win">
    <div class="win-callback-close closeCross"></div>
    <div class="win-callback-desc">Мы помогаем сделать мечты реальностью!</div>
    <section class="callback-form">
      <h3>Приходи на первое ознакомительное занятие и убедись в этом лично!</h3>
      <div>Оставить заявку на обучение очень просто</div>
      <form action="#">
        <label for="#"><input type="text" name="clientName" required="" placeholder="Введите Ваше имя"></label>
        <label for="#"><input type="email" name="clientEmail" required="" placeholder="Введите ваш email"></label>
        <label for="#"><input type="tel" required="" name="clientTel" placeholder="Ваш номер телефона +38(0**) *** ** **"></label>
        <textarea name="clientMsg" placeholder="Сообщение"></textarea>
        <input type="submit" value="Отправить заявку на обучение">
        <a href="#">Или запишитесь на бесплатный пробный урок</a>
      </form>
    </section>
  </div>

<?php get_footer(); // подключаем footer.php ?>