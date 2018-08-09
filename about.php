<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: О школе
 */
get_header(); // подключаем header.php ?>
  <section id="video-bg" class="about-school-video">
    <video width="100%" height="auto" preload="auto" autoplay="autoplay"
    loop="loop" poster="<?php bloginfo('template_directory'); ?>/resources/img/videoBg/daisy-stock-poster.jpg">
        <source src="<?php bloginfo('template_directory'); ?>/resources/video/daisy-stock-h264-video.mp4" type="video/mp4"></source>
        <source src="<?php bloginfo('template_directory'); ?>/resources/video/daisy-stock-webm-video.webm" type="video/webm"></source>
    </video>
    <a href="#" id="playYoutube" class="about-school-video-play"></a>
  </section>

    <div class="results-video-cont">
        <iframe id="Youtube" src="https://www.youtube.com/embed/8UibZVodz94?enablejsapi=1" frameborder="0" autoplay="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <div id="pauseYoutube" class="results-video-close closeCross"></div>
    </div>

  <section class="about-school">
    <div class="about-school-inner">
            <h3 class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">О нашей школе</h3>
            <p class="  wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"><?php the_content(); ?></p>

            <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">Наша школа является автором уникальной техники обучения детей. Программа состоит из тренингов для детей в возрасте от 7 до 17 лет. Более года специалисты различных областей деятельности - от психологов, до специалистов в IT и бизнесменов, создавали и оптимизировали Программу по развитию детей и формированию у них качеств, необходимых для успешного карьерного и предпринимательского роста. </p>

            <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">Три основных направления наших треннингов:</p>

            <ul class="training-category">
                  <li class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
                       <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-page/school-program/psyho-img.svg" alt="psyho-img" class="goImgAnimate1">
                       <div class="about-school-desc">Психология</div>
                  </li>
                  <li class=" wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
                    <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-page/school-program/marketing-img.svg" alt="marketing-img" class="goImgAnimate1">
                    <div class="about-school-desc">Интернет-маркетинг</div>
                  </li>     
                  <li class=" wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
                    <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-page/school-program/busines-img.svg" alt="busines-img" class="goImgAnimate1">
                    <div class="about-school-desc">Бизнес</div>
                  </li>

            </ul>
    </div>
  </section>

  <section class="school-courses wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <div class="courses-slider">
      <div class="courses-slide">
        <div class="course-desc">
          <h5>Интернет маркетинг</h5>
          <div class="course-type">
            Курс тренингов
          </div>
          <ul class="course-list">
            <li>Теория дизайна</li>
            <li>Создание landing page</li>
            <li>Воронка продаж</li>
            <li>Трафик и лидогенерация</li>
            <li>SMM продвижение</li>
            <li>Автоматизация процессов</li>
          </ul>
        </div>
        <div class="course-img" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/about-school/courses-slider/1.jpg);"></div>
      </div>
      <div class="courses-slide">
        <div class="course-desc">
          <h5>Интернет маркетинг</h5>
          <div class="course-type">
            Курс тренингов
          </div>
          <ul class="course-list">
            <li>Теория дизайна</li>
            <li>Создание landing page</li>
            <li>Воронка продаж</li>
            <li>Трафик и лидогенерация</li>
            <li>SMM продвижение</li>
            <li>Автоматизация процессов</li>
          </ul>
        </div>
        <div class="course-img" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/about-school/courses-slider/1.jpg);"></div>
      </div>
      <div class="courses-slide">
        <div class="course-desc">
          <h5>Интернет маркетинг</h5>
          <div class="course-type">
            Курс тренингов
          </div>
          <ul class="course-list">
            <li>Теория дизайна</li>
            <li>Создание landing page</li>
            <li>Воронка продаж</li>
            <li>Трафик и лидогенерация</li>
            <li>SMM продвижение</li>
            <li>Автоматизация процессов</li>
          </ul>
        </div>
        <div class="course-img" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/about-school/courses-slider/1.jpg);"></div>
      </div>      
    </div>
  </section>

  <section class="modules wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <div class="modules-slider">

      <?php  
        $modules = new WP_Query(['category_name' => 'module']); // указываем категорию 9 и выключаем разбиение на страницы (пагинацию)
        if($modules->have_posts()){
          while($modules->have_posts()){ $modules->the_post();
      ?>

      <div class="modules-slider-slide">
        <div class="modules-date">
          <?php  
            $module_date = get_field('module_date');
          ?>
          <span class="modules-date-day"><?= get_array($module_date, 'date')[0]; ?></span>
          <span class="modules-date-month"><?= get_array($module_date, 'date')[1]; ?></span>
          <span class="modules-date-year"><?= get_array($module_date, 'date')[2]; ?></span>
        </div>
        <div class="module-caption">
          Модуль <span class="module-number"><?php the_field('module_number'); ?></span>.
          <span class="module-name"><?php the_title(); ?></span>
        </div>
        <div class="module-desc"><?php the_field('module_description'); ?></div>
        <a href="<?php the_permalink(); ?>" class="module-more">Подробнее</a>
        <div class="module-group">      
          <div class="group-age"><?php the_field('module_age'); ?> лет</div>
          <div class="group-flag"></div>
        </div>
      </div>
      <?php
          }
          wp_reset_postdata(); // сбрасываем переменную $post
        } 
      ?>
     
    </div>
    <div class="more-courses">
      <a href="<?= site_url(); ?>/courses" class="more-courses-link">Смотреть все курсы</a>
    </div>
  </section>

  <section class="teachers  wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h3 class="">Тренеры нашей школы</h3>
    <div class="teacher-slider ">
      <?php 
        $teachers = new WP_Query(['category_name' => 'trainer']);
        if($teachers->have_posts()) {
          while($teachers->have_posts()){ $teachers->the_post(); 
      ?>

      <div class="teacher-slider-slide">
        <div class="teacher-photo">
          <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        </div>
        <div class="teacher-info">
          <div class="teacher-name"><?php the_title() ?></div>
          <div class="teacher-vac"><?php the_field('duty'); ?></div>
          <div class="teacher-desc">
             <?php the_content(); ?>            
          </div>
        </div>
      </div>
          
      <?php
          }
          wp_reset_postdata();
        } 
      ?>
      
    </div>  
  </section>

  <section class="reviews">
    <div class="student-certificate">
      <div class="student-certificate-doc">
        <div>
          <span>Сертификат</span>
          международной ассоциации бизнес школ
        </div>
      </div>
      <div class="student-certificate-desc">
        <p>
          Нашими преподавателями применяются уникальные методики, позволяющие закалить характер и достичь поставленной цели. Мы помогаем избежать множества ошибок и разочарований на своем пути. Наш тренинговый центр использует в обучении опыт, накопленный школами с мировым именем. Поэтому у нас могут обучиться как дети, так и уже состоявшиеся предприниматели. Мы помогаем «открыть глаза» на современный бизнес-инструментарий и увеличить свой доход.
        </p>
        <p>
          По окончании каждого модуля обучения студенты получают сертификат Международной Ассоциации Бизнес Школ.
        </p>
      </div>
    </div>
    <h3>Отзывы о нас</h3>
    <div class="reviews-slider">
      <div class="reviews-slide">
        <iframe src="https://www.youtube.com/embed/fgLCOK9Ahkw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
      <div class="reviews-slide">
        <iframe src="https://www.youtube.com/embed/J2ojw9xuUwE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>       
      </div>
      <div class="reviews-slide">
        <iframe src="https://www.youtube.com/embed/fgLCOK9Ahkw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
      <div class="reviews-slide">
        <iframe src="https://www.youtube.com/embed/J2ojw9xuUwE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>       
      </div>
    </div>
  </section>

  <section class="callback-form wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h3 class="">Приходи на первое ознакомительное занятие и убедись в этом лично!</h3>
    <div class="">Оставить заявку на обучение очень просто</div>
    <form action="#" class="">
      <?= do_shortcode('[contact-form-7 id="83" title="Форма обратной связи (1-ый тип)"]');  ?>
    </form>
  </section>

<?php get_footer(); // подключаем footer.php ?>