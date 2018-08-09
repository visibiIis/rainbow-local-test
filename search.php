<?php
/**
 * Шаблон поиска (search.php)
 * @package WordPress
 *
 **/
get_header(); // подключаем header.php ?> 


<div class="module-search">

  <div class="module-search-title">
    <span>Результат поиска</span>
    <span>Найдено <?php wp_count_posts(get_search_query()) ?> результатов по запросу <span><?= $_GET['s'];?></span></span>
  </div>
  
  <form class="module-search-form" action="<?= home_url( '/' ); ?>">
    <input type="text" name="s" placeholder="" value="<?= get_search_query(); ?>">
    <input type="submit" value="">
  </form>

    

  <div class="module-search-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  	
    <div class="module-search-result">
      <div class="module-search-result-text">
        <a href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></a>
        <span><?php the_content(''); ?></span>
      </div>
      <span><?= get_the_date('d m Y') ?></span>
    </div>
    <?php endwhile; else: ?>
    <p>Поиск не дал результатов.</p>
    <?php endif;?>
    
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
      <li><a href="#"> 2 </a></li>
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
  
  <div class="module-search-fail unactive">
    
    <div class="module-search-fail-title">
      <span>Результат поиска</span>
      <span>Извините, по вашему запросу ничего не найдено. Попробуйте другие ключевые слова.</span>
    </div>

    <form class="module-search-fail-form" action="#">
      <input type="text" placeholder="Введите запрос для поиска на сайте">
      <input type="submit" value="">
    </form>

  </div>

<?php get_footer(); // подключаем footer.php ?>