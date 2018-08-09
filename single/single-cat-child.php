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
        <div class="chlid-result-header-info"><span><?php the_field('age') ?> лет</span> <span>г. <?php the_field('city') ?></span></div>
        <h4><?php the_field('description') ?></h4>
      </div>
    </div>
  </header>
    
  <div class="results-video-cont">
    <iframe id="Youtube" src="https://www.youtube.com/embed/8UibZVodz94?enablejsapi=1" frameborder="0" autoplay="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <div id="pauseYoutube" class="results-video-close closeCross"></div>
  </div>

  <section class="chlid-result-article">
    <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <?php the_content() ?>
    </p>
    <p class="chlid-result-quote wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Мама, сама преподаватель экономики, не ожидала никаких чудес от школы. Надеялась, что ребёнок получит базисные понятия по экономике. По опыту, Светлана Тертерьян знала, что многие её ученики-краснодипломники не добились финансовых успехов, и часто работали не по специальности. А потому хотела, чтобы мышление Богданы уже в подростковом возрасте формировалось финансово грамотно.
    </p>
    <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Богдана показала на деле, чему научилась, когда отец попросил её вместо школы помочь с уборкой магазина. К удивлению Богданы, папа сдвигал ряды и шкафы, паковал одежду в ящики, чего, на памяти девочки, никогда не случалось. На вопрос «Что произошло?», папа ответил: «Меня разорил интернет. Они всё покупают у китайцев. Мне еле хватает на аренду».
    </p>
    <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Тогда Богдана с детской непринуждённостью спросила: «А почему мы сами не торгуем в интернете?» Отец, матёрый бизнесмен, отмахнулся: «А я знаю как?»
    «Так я знаю!» - поддержала Богдана. И так начался новый этап семейного бизнеса.
    Своим уникальным преимуществом Богдана сделала то, что покупатель мог приехать в центр города и примерить выбранные товары, прежде чем платить за них. Китайские магазины, понятное дело, не могли этого предложить.
    </p>
    <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Раскручивала Богдана свой магазин, вдохновляясь опытом Софии Аморузо: фотографировала одноклассниц в своих нарядах, размещала кадры в ВКонтакте и Instagram. После правильного вложения в таргетинговую рекламу папин магазин стал одним из самых модных среди подростков.
    </p>
    <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Девочка вдохнула новую жизнь в семейный бизнес Буквально за полгода активной интернет-раскрутки магазин увеличил прибыль вдвое.
    </p>
    <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Но отец не стал вновь его расширять, а арендовал склад, чтобы увеличить ассортимент. Сейчас в магазин вещи чаще попадают лишь после заказа на сайте или через социальные сети. Интернет, который чуть не разорил отца, теперь сам поставляет Тертерьянам клиентов.
    </p>
    <p class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Сама не зная о своих талантах, тринадцатилетняя Богдана спасла семейный бизнес и стала его полноправной совладелицей. Совсем уже взрослая девушка считает, что, главное, ничего не бояться: ни своего возраста, ни своей неопытности, ни возможной неудачи. 
    </p>
    <p class="chlid-result-conclusion wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    Если есть знания и желание работать – всё обязательно получиться. Нужно лишь отринуть страх и начать действовать уже сейчас, а не ждать удачного момента
    </p>
  </section>

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