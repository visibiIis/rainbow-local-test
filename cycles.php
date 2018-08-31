<?php 

//Модули

function get_courses_slides(array $args = []) {
	$args['category_name'] = 'module';
	$modules = new WP_Query($args);
      if($modules->have_posts()){
        while($modules->have_posts()){ $modules->the_post();
        ?>
          <div class="modules-slider-slide">
            <div class="modules-date">
              <?php  
                $module_date = get_field('module_date');
              ?>
              <span class="modules-date-day"><?= get_array($module_date, 'date')[0]; ?></span>
              <span class="modules-date-month"><?= get_array($module_date, 'date')[1]; ?></span>
              <span class="modules-date-year"><?= get_array($module_date, 'date')[2]; ?></span>
            </div>
            <div class="module-caption">
              Модуль <span class="module-number"><?php the_field('module_number'); ?></span>.
              <span class="module-name"><?php the_title(); ?></span>
            </div>
            <div class="module-desc"><?php the_field('module_description'); ?></div>
            <a href="<?php the_permalink(); ?>" class="module-more">Подробнее</a>
            <div class="module-group">      
              <div class="group-age"><?php the_field('module_age'); ?> лет</div>
              <div class="group-flag <?= is_favorite(get_the_ID()) ? 'module-added' : 'module-add' ?> " id="<?php echo get_the_ID() ?>" ></div>
            </div>
          </div>
        <?php
        }
        wp_reset_postdata(); // сбрасываем переменную $post
      } 
}

function get_courses(array $args = []) {
	$args['category_name'] = 'module';
	$query = new WP_Query($args);
if( $query->have_posts() ){
	while( $query->have_posts() ){ $query->the_post();
	?>

      <div class="course">
        <div class="modules-date">
          <span class="modules-date-day"><?= get_array(get_field('module_date'), 'date')[0] ?></span>
          <span class="modules-date-month"><?= get_array(get_field('module_date'), 'date')[1] ?></span>
          <span class="modules-date-year"><?= get_array(get_field('module_date'), 'date')[2] ?></span>
        </div>
        <div class="module-caption">
          Модуль <span class="module-number"><?php the_field('module_number') ?></span>.
          <span class="module-name"><?php the_title() ?></span>
        </div>
        <div class="module-desc"><?php the_field('module_description') ?></div>
        <a href="<?php the_permalink() ?>" class="module-more">Подробнее</a>
        <div class="module-group">      
          <div class="group-age"><?php the_field('module_age') ?> лет </div>
          <div class="group-flag" id="<?php echo get_the_ID() ?>"></div>
        </div>
      </div>
<?php }
wp_reset_postdata();
}
?>
		<script>
      var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
      var true_posts = '<?php echo serialize($query->query_vars); ?>';
      var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
      var max_pages = '<?php echo $query->max_num_pages; ?>';
    </script>
      <?php
}

//Блог новостей

function get_news(array $args = []) {
	$args['category_name'] = 'blog';
	  $news_and_blog_posts = new WP_Query($args);
    if($news_and_blog_posts->have_posts())
    {
      while($news_and_blog_posts->have_posts())
      { 
        $news_and_blog_posts->the_post();
      ?>
        <div class="news-and-blog-article wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
          <a class="article-link" href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('full'); ?>
          </a>
          <div>
            <div class="article-date-bar">
              <span class="article-date"><?= get_the_date('d F Y'); ?></span> 
              <span class="article-reading-time">
                Читать <?= read_speed(get_the_content(), [' минута', ' минуты', ' минут']); ?>
              </span>
            </div>
            <h4><?php the_title(); ?></h4>
            <div class="news-and-blog-article-desc">
              <?= mb_strimwidth(get_the_content(), 0, 259, $trimmarker = "...", $encoding = mb_internal_encoding()); ?>
            </div>
            <a class="category-article"><?= get_the_tags()[0]->name ?></a>
          </div>
          <div class="article-favorite-status <?php echo is_favorite(get_the_ID()) ? 'article-in-favorite' : 'add-article-in-favorite' ?> forGuest" id="<?php echo get_the_ID() ?>">
            <div>
              <?php echo is_favorite(get_the_ID()) ? 'Удалить из избранного' : 'Добавить в избранное' ?>
            </div>
          </div>
        </div>
      <?php
      }
      wp_reset_postdata(); 
    }
  ?>
		<script>
      var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
      var true_posts = '<?php echo serialize($news_and_blog_posts->query_vars); ?>';
      var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
      var max_pages = '<?php echo $news_and_blog_posts->max_num_pages; ?>';
    </script>
  <?php
}

//Тренеры

function get_teachers(array $args = []) {
	$args['category_name'] = 'trainer';
	$teachers = new WP_Query($args);
        if($teachers->have_posts()) {
          while($teachers->have_posts()){ $teachers->the_post(); 
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
        wp_reset_postdata();
      } 
}


function get_childs(array $args = []) {
	$args['category_name'] = 'child';
	$query = new WP_Query($args);
	if( $query->have_posts() ){
				while( $query->have_posts() ){ $query->the_post();
		?>
      <div class="results-article wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
        <div class="results-article-title">
          <div class="results-article-autor"><?php the_title() ?></div>
          <div class="results-article-autor-info">
            <span><?php the_field('age') ?> лет</span> 
            <span>г. <?php the_field('city') ?></span>
          </div>
          <h4><?php the_field('description') ?></h4>
          <div class="results-article-read">
            <a class="results-article-read-link" href="<?php the_permalink() ?>">Читать подробнее</a>
          </div>
        </div>
        <div class="results-article-photo">
          <img src="<?php the_post_thumbnail_url('full') ?>" alt="Фото статьи">
        </div>
      </div>
      <?php } wp_reset_postdata(); } ?>
		<script>
      var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
      var true_posts = '<?php echo serialize($query->query_vars); ?>';
      var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
      var max_pages = '<?php echo $query->max_num_pages; ?>';
    </script>
      <?php
}

?>