<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Блог новостей
 */
get_header(); // подключаем header.php ?>

  <section class="news-and-blog-title wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
    <h2>Новости и блог</h2>
  </section>  

  <section class="blog-menu wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"">
    <div class="blog-menu-cont">
      <div class="blog-menu-change-cat">
        <div class="blog-menu-trigger">
          Сейчас выбрано: <span><?= $_GET['cat'] ? get_tag( $_GET['cat'])->name : "Все категории"?></span>
        </div>
        <div class="news-and-blog-category-menu">
          <ul class="news-and-blog-category-list">
            <li><a href="?cat=0" id="0">Все разделы</a></li>
            <?php

            $tags = get_tags();

            foreach($tags as $tag) {
              echo "<li><a href='?cat={$tag->term_id}' id='{$tag->term_id}'> $tag->name </a></li>";
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="blog-menu-search">
        <form role="search" method="GET" class="search-form" action="<?= home_url( '/' ); ?>">
          <input type="text" name="search" placeholder="Искать в новостях" value="<?= get_search_query(); ?>">
          <input type="submit" value="">
        </form>
      </div>
      <a href="#" class="blog-menu-subscribe">
        Подписаться на полезности
      </a>
    </div>  

    <div class="blog-menu-subscribe-win modal-win">
      <div class="blog-menu-subscribe-win-close closeCross"></div>
      <div>
        <h4>Мы приносим только хорошие новости</h4>
        <form action="#">
          <input type="email" name="blog-sub-email" placeholder="Введите Ваш email">
          <input type="submit" value="Подписаться">
        </form>
      </div>
    </div>

  </section>

  <section class="news-and-blog">
    <h3 class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">Все разделы</h3>
    <div class="news-and-blog-articles">
      <?php

        $args = [
          'posts_per_page' => 4,
          'tag_id' => $_GET ? $_GET['cat'] : 0
        ];
        
        get_news($args)

      ?>

    <script>
      /*var params = window
      .location
      .search
      .replace('?','')
      .split('&')
      .reduce(
          function(p,e){
              var a = e.split('=');
              p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
              return p;
          },
          {}
      );

      console.log( params['cat']);
      document.getElementById(params['cat']).classList.add('current-cat');*/

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

    <script>
        
    </script>
    
    <div id="posts"></div>

    </div>

      <?php

        $posts = get_posts( array(
          'numberposts' => -1,
          'category'    => 2,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'include'     => array(),
          'exclude'     => array(),
          'meta_key'    => '',
          'meta_value'  =>'',
          'post_type'   => 'post',
          'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );

        $posts_number = count($posts);
        
      ?>

    <?php if ($posts_number > 4 ) : ?>
      <div id="true_loadmore" class="blog-menu-more-button">
        <span>Больше статей</span>
        <div class="unactive"></div>
      </div>
    <?php endif ?>

  </section>



<?php get_footer(); // подключаем footer.php ?>