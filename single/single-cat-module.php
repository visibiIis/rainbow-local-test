<?php get_header() ?>

  <section class="course-page-slider">
    <div class="course-page-slider-slide">
      <div class="course-caption">
        <div class="course-page-slider-age">Возраст <span><?php the_field('module_age') ?> лет</span></div>
        <h2><span class="course-page-slider-module">Модуль <span><?php the_field('module_number'); ?></span>. </span><span><?php the_title(); ?></span></h2>
        <div class="course-page-slider-lesson">Посмотри, как проходит урок</div>
        <a href="https://www.youtube.com/embed/8UibZVodz94" class="course-video-play"></a>
      </div>
    </div>
<!--     <div class="courses-page-slider-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/courses/01.jpg);">
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
    </div>     -->
  </section>
  
  <section class="course-about wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">

    <div class="course-about-block">

      <div class="course-about-heading">О курсе</div>
      <div class="course-about-desc">
        <?php the_content(); ?>
      </div>

      <div class="course-info">

        <div class="course-info-cost">
          <div class="course-nametag">
            <span class="course-nametag-price">Стоимость:</span>
            <span class="course-nametag-dollars"><?php the_field('module_price'); ?> грн/месяц</span>
          </div>
          <div class="course-info-desc">
            <?php the_field('module_price_tip'); ?>
          </div>
        </div>

        <div class="course-info-quantity">
          <div class="course-nametag">
            <span class="course-nametag-quantity">Количество:</span>
            <span class="course-nametag-num">
              <?= decl_of_numb(get_field('module_quantity'), [' занятие', ' занятия', ' занятий']); ?>
            </span>
          </div>
          <div class="course-info-desc">
            <?php the_field('module_quantity_tip'); ?>
          </div>
        </div>

        <div class="course-info-duration">
          <div class="course-nametag">
            <span class="course-nametag-duration">Продолжительность:</span>
            <span class="course-nametag-time">
              <?= decl_of_numb(get_field('module_duration'), [' месяц', ' месяца', ' месяцев']); ?>
            </span>
          </div>
          <div class="course-info-desc">
            <?php the_field('module_duration_tip'); ?>
          </div>
        </div>

        <div class="course-info-seats">
          <div class="course-nametag">
            <span class="course-nametag-places">Мест в группе:</span>
            <span class="course-nametag-students"><?php the_field('module_seats'); ?> человек</span>
          </div>
          <div class="course-info-desc">
            <?php the_field('module_seats_tip'); ?>
          </div>
        </div>

      </div>
    
    </div>
    
  </section>

  <section class="course-feedback wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">

    <h3>Отзывы</h3>

    <div class="course-feedback-slider">
      <div>

        <div class="course-feedback-img"></div>

        <a href="https://www.youtube.com/embed/fw3UYy02lSI"><div class="youtube-button"></div></a>

        <div class="course-feedback-info">
          <div class="course-feedback-info-text">

            <span>Имя Фамилия</span>

            <a href="#"><div class="instagram-button"></div></a>
            <a href="#"><div class="vk-button"></div></a>
            <a href="#"><div class="facebook-button"></div></a>

            <div class="text-info"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></div>

          </div>
        </div>

      </div>

      <div>

        <div class="course-feedback-img"></div>

        <div class="blackout"></div>

        <a href="#"><div class="youtube-button"></div></a>

        <div class="course-feedback-info">
          <div class="course-feedback-info-text">

            <span>Имя Фамилия</span>

            <a href="#"><div class="instagram-button"></div></a>
            <a href="#"><div class="vk-button"></div></a>
            <a href="#"><div class="facebook-button"></div></a>

            <div class="text-info"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></div>

          </div>
        </div>

      </div>

      <div>

        <div class="course-feedback-img"></div>

        <div class="blackout"></div>

        <a href="#"><div class="youtube-button"></div></a>

        <div class="course-feedback-info">
          <div class="course-feedback-info-text">

            <span>Имя Фамилия</span>

            <a href="#"><div class="instagram-button"></div></a>
            <a href="#"><div class="vk-button"></div></a>
            <a href="#"><div class="facebook-button"></div></a>

            <div class="text-info"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></div>

          </div>
        </div>

      </div>

      <div>

        <div class="course-feedback-img"></div>

        <div class="blackout"></div>

        <a href="#"><div class="youtube-button"></div></a>

        <div class="course-feedback-info">
          <div class="course-feedback-info-text">

            <span>Имя Фамилия</span>

            <a href="#"><div class="instagram-button"></div></a>
            <a href="#"><div class="vk-button"></div></a>
            <a href="#"><div class="facebook-button"></div></a>

            <div class="text-info"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></div>

          </div>
        </div>

      </div>
    </div>

  </section>
  <section class="course-constituent wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
      
    <div class="course-constituent-block">
      
      <div class="course-constituent-heading">Из чего состоит курс</div>

      <div class="course-constituent-list">
        <ul>
          <?php $consts = get_array(get_field('consist_list'), 'module_consist'); 
            foreach ($consts as $value) {
              echo "<li><span>".$value."</span></li>";
            }
          ?>
        </ul>
      </div>

    </div>

  </section>

  <section class="atmosphere-rainbow wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">

    <div class="atmosphere-rainbow-header">
      <span>Атмосфера Rainbow</span>
    </div>

    <div class="atmosphere-rainbow-slides">
      <div class="atmosphere-rainbow-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/1.jpg);"></div>
      <div class="atmosphere-rainbow-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/atmo-photo.jpg);"></div>
      <div class="atmosphere-rainbow-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/count-bg-parallax3.jpg);"></div>
      <div class="atmosphere-rainbow-slide" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/img/main-page/photo-slider/slideBg.jpg);"></div>
    </div>

  </section>

  <section class="course-teachers wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">

    <h3>Кто ведет курс</h3>


    
    <div class="course-teacher-slider">
    	<?php 
    	$num = get_field('module_number');
		global $num;
        $teachers = new WP_Query(['category_name' => 'trainer']);
        if($teachers->have_posts()) {
          while($teachers->have_posts()){ $teachers->the_post(); 
          	if(in_array($num, get_array(get_field('module_nums'), 'nums'))){
          		 
      ?>

      <div class="teacher-slider-slide">
        <div class="teacher-photo">
          <?php the_post_thumbnail('full'); ?>
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
        }
      } 
      ?>
      
      
    </div>  

  </section>

  <section class="course-callback-form wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">

      <h3 class=""><span>Приходи на первое</span> ознакомительное занятие <span>и убедись в этом лично!</span></h3>
      <div class="">Оставить заявку на обучение очень просто</div>
      <form action="#" class="">
        <label for="#"><input type="text" name="clientName" required placeholder="Введите Ваше имя"></label>
        <label for="#"><input type="email" name="clientEmail" required placeholder="Введите ваш email"></label>
        <label for="#"><input  type="tel" required name="clientTel" placeholder="Ваш номер телефона"></label>
        <textarea name="clientMsg" placeholder="Сообщение"></textarea>
        <input type="submit" value="Отправить заявку на обучение">
        <a href="#"><span>Или запишитесь на</span> бесплатный пробный урок</a>
      </form>

  </section>

<?php get_footer() ?>