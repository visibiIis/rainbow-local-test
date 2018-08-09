<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Контакты
 */
get_header(); // подключаем header.php ?>

  <section class="contacts-title wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h2>Контакты</h2>
  </section>
<section class="contacts-cont wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <div class="all-our-contacts">
      <div>
         <div class="our-contacts-communications">
            <ul class="our-contacts-phones">
              <li><?php the_field('tel1') ?></li>
              <li class="hasViberAndTelegram"><?php the_field('tel2') ?></li>
            </ul>
            <ul class="our-contacts-skype">
              <li><?php the_field('skype') ?></li>
            </ul>
            <ul class="our-contacts-emails">
              <li><?php the_field('mail') ?></li>
            </ul>
         </div>
         <div class="our-contacts-socials">
            <h3>Следите за нами в социальных сетях</h3>
            <ul class="contacts-socials">

              <li><a class="contacts-fb" href="#"></a></li>
              <li><a class="contacts-youtube" href="#"></a></li>
              <li><a class="contacts-insta" href="#"></a></li>
            </ul>           
         </div>
      </div>
    </div>
    <div class="questionForm wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">

        <div class="questionForm-title">
            <div>Хотите узнать больше?</div>
            <h3>Спросите!</h3>
            <a href="#"><span>Часто задаваемые вопросы здесь</span></a>
        </div>
        <form action="#" id="userQuestion">
          <label for="#"><input type="text" name="userQName" required="" placeholder="Введите Ваше имя"></label>
          <label for="#"><input type="email" name="userQEmail" required="" placeholder="Введите ваш email"></label>
          <textarea name="userQMsg" placeholder="Сообщение"></textarea>
          <input type="submit" value="Отправить сообщение">
        </form>
    </div>
</section>

 

  <div id="map" class="contacts-map  wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"></div>

<?php get_footer(); // подключаем footer.php ?>