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
get_courses(['posts_per_page' => 2])
?>
<div id="posts"></div>
      <div id="true_loadmore" class="blog-menu-more-button">
        <span>Больше статей</span>
      </div>
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