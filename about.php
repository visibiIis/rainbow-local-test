<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: О школе
 */

remove_filter( 'the_content', 'wpautop' ); // Отключаем автоформатирование в полном посте
remove_filter( 'the_excerpt', 'wpautop' ); // Отключаем автоформатирование в кратком(анонсе) посте
remove_filter('comment_text', 'wpautop'); // Отключаем автоформатирование в комментариях

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
            <p class="  wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"><?php the_content(); ?> </p>
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
      	get_courses_slides(['posts_per_page' => 6]); 
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
    <div class="more-courses">
      <a href="/modules/" class="more-courses-link">Смотреть все курсы</a>
    </div>
  </section>

  <section class="teachers  wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h3 class="">Тренеры нашей школы</h3>
    <div class="teacher-slider ">
      <?php 
        get_teachers();
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
      <label for="#"><input type="text" name="clientName" required placeholder="Введите Ваше имя"></label>
      <label for="#"><input type="email" name="clientEmail" required placeholder="Введите ваш email"></label>
      <label for="#"><input  type="tel" required name="clientTel" placeholder="Ваш номер телефона +38(0**) *** ** **"></label>
      <textarea name="clientMsg" placeholder="Сообщение"></textarea>
      <input type="submit" value="Отправить заявку на обучение">
      <a href="#">Или запишитесь на бесплатный пробный урок</a>
    </form>
  </section>

<?php get_footer(); // подключаем footer.php ?>