<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Курсы
 */
get_header(); // подключаем header.php ?>

  <section class="courses-page-slider">
    <div class="courses-page-slider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/courses/01.jpg);">
      <div class="courses-caption">
        <h2>+Присоединяйся к команде супергероев Rainbow School</h2>
        <div>Посмотри, как проходит урок</div>
        <a href="https://www.youtube.com/embed/8UibZVodz94" class="courses-video-play"></a>
      </div>
    </div>
    <div class="courses-page-slider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/courses/01.jpg);">
      <div class="courses-caption">
        <h2>+Присоединяйся к команде супергероев Rainbow School</h2>
        <div>Посмотри, как проходит урок</div>
        <a href="https://www.youtube.com/embed/hobcK9iGlPA" class="courses-video-play"></a>
      </div>
    </div>
    <div class="courses-page-slider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/courses/01.jpg);">
      <div class="courses-caption">
        <h2>+Присоединяйся к команде супергероев Rainbow School</h2>
        <div>Посмотри, как проходит урок</div>
        <a href="https://www.youtube.com/embed/6CcguSRET2M" class="courses-video-play"></a>
      </div>
    </div>
    <div class="courses-page-slider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/courses/01.jpg);">
      <div class="courses-caption">
        <h2>+Присоединяйся к команде супергероев Rainbow School</h2>
        <div>Посмотри, как проходит урок</div>
        <a href="https://www.youtube.com/embed/tRs_ahAN8PI" class="courses-video-play"></a>
      </div>
    </div>
    </div>  
  </section>

  <section class="courses-content">
    <h2>Наши курсы</h2>
    <nav class="courses-nav">
      <span>Выберите параметр для быстрого поиска:</span>
      <ul>
        <li><a href="#">скоро старт</a></li>
        <li><a href="#">7-9 лет</a></li>
        <li><a href="#">10-12 лет</a></li>
        <li><a href="#">13-15 лет</a></li>
        <li><a href="#">16-17 лет</a></li>
      </ul>
    </nav>
    <div class="courses-page-courses-cont">

      <?php 
        $query = new WP_Query([
          'category_name' => 'module',
          'posts_per_page' => 2
        ]);

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
          <div class="group-flag"></div>
        </div>
      </div>

      <?php 
          }
          wp_reset_postdata();
        }
      ?>

      <script>
        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
        var true_posts = '<?php echo serialize($query->query_vars); ?>';
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $query->max_num_pages; ?>';
      </script>
      <div id="true_loadmore" class="blog-menu-more-button">
        <span>Больше статей</span>
      </div>
    </div>
  </section>

  <section class="callback-form wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h3 class="">Приходи на первое ознакомительное занятие и убедись в этом лично!</h3>
    <div class="">Оставить заявку на обучение очень просто</div>
    <form action="#" class="">
      <?= do_shortcode('[contact-form-7 id="83" title="Форма обратной связи (1-ый тип)"]'); ?>
    </form>
  </section>

<?php get_footer(); // подключаем footer.php ?>