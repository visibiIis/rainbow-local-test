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

       $query = new WP_Query([
        'category_name' => 'blog',
        'posts_per_page' => 4,
        'tag_id' => $_GET ? $_GET['cat'] : 0
      ]);
        if($query->have_posts()){
          while($query->have_posts()){ 
            $query->the_post();
            $news_and_blog_content = get_the_content(); ?>

      <div class="news-and-blog-article wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
        <a class="article-link" href="<?php the_permalink() ?>">
          <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        </a>
        <div>
          <div class="article-date-bar">
            <span class="article-date"><?= get_the_date(); ?></span> 
            <span class="article-reading-time">Читать <?= read_speed(get_the_content(), [' минуту', ' минуты', ' минут']); ?></span>
          </div>
          <h4><?php the_title(); ?></h4>
          <div class="news-and-blog-article-desc">
            <?= mb_strimwidth($news_and_blog_content, 0, 259, $trimmarker = "...", $encoding = mb_internal_encoding()); ?>      
          </div>
          <a class="category-article"><?= get_the_tags()[0]->name ?></a>
        </div>
        <div class="article-favorite-status <?php echo is_favorite(get_the_ID()) ? 'article-in-favorite' : 'add-article-in-favorite' ?> forGuest" id="<?php echo get_the_ID() ?>"><div><?php echo is_favorite(get_the_ID()) ? 'Удалить из избранного' : 'Добавить в избранное' ?></div></div>
      </div>
    <?php } wp_reset_postdata(); } ?>

    <script>
      var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
      var true_posts = '<?php echo serialize($query->query_vars); ?>';
      //var tag_id = document.getElementsByClassName('current-cat')[0].getAttribute('id');
      var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
      var max_pages = '<?php echo $query->max_num_pages; ?>';


      var params = window
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
      document.getElementById(params['cat']).classlist.add('current-cat')
    </script>

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
      </script>
    
    <div id="posts"></div>

    </div>

    <div id="true_loadmore" class="blog-menu-more-button">
      <span>Больше статей</span>
    </div>

  </section>

<?php get_footer(); // подключаем footer.php ?>