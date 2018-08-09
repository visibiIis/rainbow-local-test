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
          Сейчас выбрано: <span>Все разделы</span>
        </div>
        <div class="news-and-blog-category-menu">
          <ul class="news-and-blog-category-list">
            <li><a class="current-cat" href="#">Все разделы</a></li>
            <li><a href="#">Воспитание</a></li>
            <li><a href="#">Записки лидера</a></li>
            <li><a href="#">Новости школы</a></li>
            <li><a href="#">Литература</a></li>
            <li><a href="#">Общение</a></li>
            <li><a href="#">Money</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Психология</a></li>
          </ul>
        </div>
      </div>
      <div class="blog-menu-search">
        <form id="blog-search-form" method="get" >
          <input type="text" name="search" placeholder="Искать в новостях">
          <input type="submit" value="">
        </form>
      </div>
      <a href="#" class="blog-menu-subscribe">
        Подписаться на полезности
      </a>
    </div>  
    <div class="blog-search-results">
      <div>
        <h3>Результаты поиска по запросу "<span>Lorem<span>"</h3>
        <div class="blog-search-results-cont">
          <div class="blog-search-result">
            <div>
              <a href="#" class="blog-search-result-title">
                Lorem ipsum dolor sit amet, an rebum volutpat has. 
              </a>
            </div>
            <div class="blog-search-result-desc">
              <p>
              Lorem ipsum dolor sit amet, an rebum volutpat has. Eu mei populo deserunt, nisl laudem delectus at eum, ut eum corpora appareat deterruisset. Tincidunt conclusionemque duo an. Mei nostro mandamus disputationi te. Epicurei ullamcorper te sit.
              </p>
              <p>
              Ut eam veri efficiantur. Nisl ullum eam ea. Possit voluptua id ius. Euismod similique vix in, tibique expetenda ut vix, populo dicunt ocurreret usu in.
              </p>
              <p>
              Posse fuisset fabellas et pri. Pro eu omnis consequat quaerendum, est an odio elaboraret temporibus, his ex legere eripuit. Graeco sensibus appellantur pro eu. Iisque perpetua eos ad. [...]
              </p>
            </div>
          </div>
          <div class="blog-search-result">
            <div>
              <a href="#" class="blog-search-result-title">
                Lorem ipsum dolor sit amet, an rebum volutpat has. 
              </a>
            </div>
            <div class="blog-search-result-desc">
              <p>
              Lorem ipsum dolor sit amet, an rebum volutpat has. Eu mei populo deserunt, nisl laudem delectus at eum, ut eum corpora appareat deterruisset. Tincidunt conclusionemque duo an. Mei nostro mandamus disputationi te. Epicurei ullamcorper te sit.
              </p>
              <p>
              Ut eam veri efficiantur. Nisl ullum eam ea. Possit voluptua id ius. Euismod similique vix in, tibique expetenda ut vix, populo dicunt ocurreret usu in.
              </p>
              <p>
              Posse fuisset fabellas et pri. Pro eu omnis consequat quaerendum, est an odio elaboraret temporibus, his ex legere eripuit. Graeco sensibus appellantur pro eu. Iisque perpetua eos ad. [...]
              </p>
            </div>
          </div>

          <div class="blog-search-result">
            <div>
              <a href="#" class="blog-search-result-title">
                Lorem ipsum dolor sit amet, an rebum volutpat has. 
              </a>
            </div>
            <div class="blog-search-result-desc">
              <p>
              Lorem ipsum dolor sit amet, an rebum volutpat has. Eu mei populo deserunt, nisl laudem delectus at eum, ut eum corpora appareat deterruisset. Tincidunt conclusionemque duo an. Mei nostro mandamus disputationi te. Epicurei ullamcorper te sit. [...]
              </p>
            </div>
          </div>        
        </div>
        <div class="results-pagination">
          <span class="results-pagination-prev">
            <svg version="1.1" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
              <g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                      c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
                  </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
            </svg>
          </span>
          <ul class="results-pagination-pages-list">
            <li><a href="#">1 </a></li>
            <li><a class="active" href="#"> 2 </a></li>
            <li><a href="#"> 3 </a></li>
            <li><a class="results-pagination-change-page" href="#"> ... </a></li>
            <li><a href="#"> 22</a></li>
          </ul>
          <span class="results-pagination-next">
            <svg version="1.1" id="next-svg" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                  <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                  c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                  "></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
            </svg>
          </span>

          <form style="display: none;" action="#" class="change-page-form">
            <input type="text">
            <input type="submit" value="OK">
            <div class="change-page-form-close closeCross"></div>
          </form>
        </div>
      </div>
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
      <?php $query = new WP_Query([
        'category_name' => 'blog',
        'posts_per_page' => 8
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
        <div class="article-favorite-status add-article-in-favorite forGuest"><div>Добавить в избранное</div></div>
      </div>
    <?php } wp_reset_postdata(); } ?>

    <script>
      var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
      var true_posts = '<?php echo serialize($query->query_vars); ?>';
      var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
      var max_pages = '<?php echo $query->max_num_pages; ?>';
    </script>
    
    <div id="true_loadmore" class="blog-menu-more-button">
      <span>Больше статей</span>
    </div>

    </div>

  </section>

<?php get_footer(); // подключаем footer.php ?>