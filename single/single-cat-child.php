<?php get_header(); ?> 

<?php the_post(); ?>

  <header class="chlid-result-header">
    <div class="chlid-result-header-photo">
      <img src="<?php the_post_thumbnail_url('full') ?>" alt="фото ребенка">
    </div>
    <div class="chlid-result-header-desc">
      <div id="video-bg" class="chlid-result-header-video">
        <video width="100%" height="auto" preload="auto" autoplay="autoplay"
        loop="loop" poster="<?php bloginfo('template_directory'); ?>resources/img/videoBg/daisy-stock-poster.jpg">
          <source src="<?php bloginfo('template_directory'); ?>resources/video/daisy-stock-h264-video.mp4" type="video/mp4"></source>
          <source src="<?php bloginfo('template_directory'); ?>resources/video/daisy-stock-webm-video.webm" type="video/webm"></source>
        </video>
        <a href="#" id="playYoutube" class="childern-results-video-play"></a>
      </div>
      <div class="chlid-result-header-title">
        <div class="chlid-result-header-autor"><?php the_title() ?></div>
        <div class="chlid-result-header-info"><span><?php the_field('age') ?></span> <span><?php the_field('city') ?></span></div>
        <h4><?php the_field('description') ?></h4>
      </div>
    </div>
  </header>
    
  <div class="results-video-cont">
    <iframe id="Youtube" src="https://www.youtube.com/embed/8UibZVodz94?enablejsapi=1" frameborder="0" autoplay="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <div id="pauseYoutube" class="results-video-close closeCross"></div>
  </div>

  <section class="chlid-result-article">
    <?php the_content() ?>
  </section>

  <script>
    var content = document.querySelector('.chlid-result-article');
    var p = content.getElementsByTagName("p"),
        len = p !== null ? p.length : 0,
        i = 0;
    for(i; i < len; i++) {
        p[i].className += " wow"; 
      p[i].className += " fadeInRight"; 
      p[i].setAttribute('data-wow-offset', '75');
      p[i].setAttribute('data-wow-duration', '1.5s');
    }

    jQuery('.fadeInRight').fadeIn();
  </script>

  <section class="chlid-result-select-result wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <?php  $post_prev = get_post(get_adjacent_post( true, '', true));?>
    <div class="select-result-prev">
      <div class="select-result-title">
        <div class="select-result-autor"><?= $post_prev->post_title;  ?></div>
        <div class="select-result-info">
          <span><?php the_field('age', $post_prev->ID); ?> лет</span> 
          <span>г. <?php the_field('city', $post_prev->ID) ?> </span>
        </div>
        <h4><?php the_field('description', $post_prev->ID) ?></h4>
        <a href="<?php the_permalink($post_prev->ID) ?>" class="select-result-link">
          <span>Смотрите предыдущий результат</span>
        </a>
      </div>
    </div>
    <?php $post_next = get_post(get_adjacent_post( true, '', false));  ?>
    <div class="select-result-next">
      <div class="select-result-title">
        <div class="select-result-autor"><?= $post_next->post_title  ?></div>
        <div class="select-result-info">
          <span><?php the_field('age', $post_next->ID) ?> лет</span> 
          <span>г. <?php the_field('city', $post_next->ID) ?></span>
        </div>
        <h4><?php the_field('description', $post_next->ID) ?></h4>
        <a href="<?php the_permalink($post_next->ID) ?>" class="select-result-link">
          <span>Смотрите следующий результат</span>
        </a>
      </div>
    </div>
  </section>

  <section class="chlid-result-select-result mobileSlider wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <?php $post_prev = get_adjacent_post( true, '', true) ?>
  <div class="select-result-prev">
      <div class="select-result-title">
        <div class="select-result-autor"><?= $post_prev->post_title  ?></div>
        <div class="select-result-info">
          <span><?php the_field('age', $post_prev->ID) ?> лет</span> 
          <span>г. <?php the_field('city', $post_prev->ID) ?></span>
        </div>
        <h4><?php the_field('description', $post_prev->ID) ?></h4>
        <a href="<?php the_permalink($post_next->ID) ?>" class="select-result-link">
          <span>Смотрите предыдущий результат</span>
        </a>
      </div>
    </div>
  <?php $post_next = get_adjacent_post( true, '', false); ?>
    <div class="select-result-next">
      <div class="select-result-title">
        <div class="select-result-autor"><?= $post_next->post_title  ?></div>
        <div class="select-result-info">
          <span><?php the_field('age', $post_next->ID) ?> лет</span> 
          <span>г. <?php the_field('city', $post_next->ID) ?></span>
        </div>
        <h4><?php the_field('description', $post_next->ID) ?></h4>
        <a href="<?php the_permalink($post_next->ID) ?>" class="select-result-link">
          <span>Смотрите следующий результат</span>
        </a>
      </div>
    </div>
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
      <h3 class="revealator-slideright revealator-once revealator-within">Приходи на первое ознакомительное занятие и убедись в этом лично!</h3>
      <div class="revealator-slideleft revealator-delay2 revealator-once revealator-within">Оставить заявку на обучение очень просто</div>
      <form action="#" class="revealator-slidedown revealator-delay3 revealator-once revealator-partially-above revealator-within">
        <label for="#"><input type="text" name="clientName" required="" placeholder="Введите Ваше имя"></label>
        <label for="#"><input type="email" name="clientEmail" required="" placeholder="Введите ваш email"></label>
        <label for="#"><input type="tel" required="" name="clientTel" placeholder="Ваш номер телефона +38(0**) *** ** **"></label>
        <textarea name="clientMsg" placeholder="Сообщение"></textarea>
        <input type="submit" value="Отправить заявку на обучение">
        <a href="#">Или запишитесь на бесплатный пробный урок</a>
      </form>
    </section>
  </div>

<?php get_footer() ?>