<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

if (isset($_POST['reg-email'])) {
  check_register();
}

if (isset($_POST['login-email'])) {
  check_login();
}

remove_filter( 'the_content', 'wpautop' ); // Отключаем автоформатирование в полном посте
remove_filter( 'the_excerpt', 'wpautop' ); // Отключаем автоформатирование в кратком(анонсе) посте
remove_filter('comment_text', 'wpautop'); // Отключаем автоформатирование в комментариях


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
      <p class="  wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"><?php the_content(); ?></p>
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
        get_teachers();
      ?>

    </div>  
  </section>

  <section class="modules wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <div class="modules-slider">
    <?php  
      get_courses_slides(['posts_per_page' => 6])
    ?>
    </div>
    <script>
        jQuery(function($){
          $('.module-add').click(function(){
            $(this).addClass('module-added');
            $(this).removeClass('module-add');

            $(this).addClass('curr');
            $.ajax({
              url: '<?php echo admin_url("admin-ajax.php") ?>',
              type: 'POST',
              data: {
                action: 'add_to_fav',
                post_id: $('.curr').attr('id')
              },
              success: function( data ) {
                console.log(data);
              }
            });
            $(this).removeClass('curr');
          });
        });

        jQuery(function($){
          $('.module-added').click(function(){
            $(this).addClass('module-add');
            $(this).removeClass('module-added');

            $(this).addClass('curr');
            $.ajax({
              url: '<?php echo admin_url("admin-ajax.php") ?>',
              type: 'POST',
              data: {
                action: 'del_from_fav',
                post_id: $('.curr').attr('id')
              },
              success: function( data ) {
                console.log(data);
              }
            });
            $(this).removeClass('curr');
          });
        });
      </script>
  </section>

  <section class="news-and-blog">
    <h3 class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">Новости и блог</h3>
    <div class="news-and-blog-articles ">
      <?php  
      get_news(['posts_per_page' => 4])
      ?>

      
    </div>
    <a href="/modules" class="news-and-blog-show-more mobile">Другие новости</a>   
  </section>

  <section  class="school-relevance">
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
      <?= do_shortcode('[contact-form-7 id="244" title="Форма обратной связи 1-ый тип"]'); ?>
    </form>
  </section>
  <script>
    jQuery(function($){
          $('.add-article-in-favorite').click(function(){
            $(this).addClass('curr');
            $.ajax({
              url: '<?php echo admin_url("admin-ajax.php") ?>',
              type: 'POST',
              data: {
                action: 'add_to_fav',
                post_id: $('.curr').attr('id')
              },
              success: function( data ) {
                console.log(data);
              }
            });
            $(this).removeClass('curr');
          });
        });

        jQuery(function($){
          $('.article-in-favorite').click(function(){
            $(this).addClass('curr');
            $.ajax({
              url: '<?php echo admin_url("admin-ajax.php") ?>',
              type: 'POST',
              data: {
                action: 'del_from_fav',
                post_id: $('.curr').attr('id')
              },
              success: function( data ) {
                console.log(data);
              }
            });
            $(this).removeClass('curr');
          });
        });
  </script>
  
<?php get_footer(); // подключаем footer.php ?>