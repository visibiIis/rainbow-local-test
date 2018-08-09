<?php
  /**
   * Главная страница (index.php)
   * @package WordPress
   * @subpackage your-clean-template-3
   */
get_header(); // подключаем header.php ?> 

  <section class="main-photoslider">
    <div class="main-photoslider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/1.jpg);"></div>
    <div class="main-photoslider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/atmo-photo.jpg);"></div>
    <div class="main-photoslider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/count-bg-parallax3.jpg);"></div> 
    <div class="main-photoslider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/slideBg.jpg);"></div>    
  </section>

  <section class="school-programm">
    <div class="school-programm-inner">
      <?php 
        query_posts('p=21');
        if(have_posts()){ while(have_posts()){ the_post();
          ?>
      <h3 class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"><?php the_field('title'); ?></h3>
      <?php the_content(); ?>
      <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"><?php the_field('slogan'); ?></p>
      <?php
        }}
      ?>
  
      <ul class="program-category">
        <li class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
          <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-page/school-program/psyho-img.svg" alt="psyho-img" class="goImgAnimate1">
           <div class="program-category-desc">Психология</div>
        </li>
        <li class=" wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
          <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-page/school-program/marketing-img.svg" alt="marketing-img" class="goImgAnimate1">
          <div class="program-category-desc">Интернет-маркетинг</div>
        </li>     
        <li class=" wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
          <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-page/school-program/busines-img.svg" alt="busines-img" class="goImgAnimate1">
          <div class="program-category-desc">Бизнес</div>
        </li>
      </ul>
    </div>
  </section>

  <section class="teachers wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h3 class="">Тренеры нашей школы</h3>
    <div class="teacher-slider">

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
  </section>

  <section class="news-and-blog">
    <h3 class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">Новости и блог</h3>
    <div class="news-and-blog-articles ">
      <?php  
        $news_and_blog_posts = new WP_Query(['category_name' => 'blog']);
        if($news_and_blog_posts->have_posts()){
          while($news_and_blog_posts->have_posts()){ 
            $news_and_blog_posts->the_post();
            $news_and_blog_content = get_the_content();
      ?>
      <div class="news-and-blog-article wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
        <a class="article-link" href="<?php the_permalink() ?>">
          <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        </a>
        <div>
          <div class="article-date-bar">
            <span class="article-date"><?= get_the_date('j F Y'); ?></span> 
            <span class="article-reading-time">
              Читать <?= read_speed(get_the_content(), [' минута', ' минуты', ' минут']); ?>
            </span>
          </div>
          <h4><?php the_title(); ?></h4>
          <div class="news-and-blog-article-desc">
                <?= mb_strimwidth($news_and_blog_content, 0, 259, $trimmarker = "...", $encoding = mb_internal_encoding()); ?>
          </div>
          <a class="category-article"><?= get_the_tags()[0]->name ?></a>
        </div>
        <div class="article-favorite-status add-article-in-favorite forGuest"><div>Добавить в избранное</div></div>
      </div>
      <?php
          }
          wp_reset_postdata(); 
        }
      ?>
    </div>
    <a href="#" class="news-and-blog-show-more mobile">Другие новости</a>   
  </section>
  
  <section class="school-relevance">
    <h3>Актуальность нашей школы</h3>
    <div class="school-relevance-grid">
      <div class="school-relevance-desc">
        <p>
          Школа инновационного образования «Rainbow» - это международный тренинговый центр, специализирующийся на обучении детей и взрослых интернет маркетингу, а также бизнес технологиям. Задача Школы — научить извлекать опыт успешных предпринимателей, создавать своё дело и воплощать его в жизнь. 
        </p>
        <p>
          Система школьного образования сегодня, к сожалению, далека от совершенства. Дети много лет отдают общеобразовательной школе, не получая взамен практических знаний. Уникальность Программы Школы инновационного образования «Rainbow» состоит в том, что она дает конкретный результат уже после прохождения первого курса тренингов!       
        </p>
        <p>
          Родители отмечают, что ребенок становится более мотивированным в учебе, он старается получить практический опыт во всем, что ему интересно. Плюс ко всему дети приобретают лидерские качества к достижению цели и на практике учатся выражать свои мысли, четко и понятно для окружающих. 
        </p>
        <div class="school-relevance-slogan">
          Мы стремимся к тому, чтобы наши ученики действовали по схеме «1-2-3»      
        </div>
      </div>
      <div class="school-relevance-scheme">
        <div class="cloud-1">
          <span>Реализация</span>
        </div>
        <div class="cloud-2">
          <span>Обдумывание</span>
        </div>
        <div class="cloud-3">
          <span>Идея</span>
        </div>
        <div class="flyboy"></div>
        <div class="bottomArr"></div>
        <div class="topArr"></div>
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