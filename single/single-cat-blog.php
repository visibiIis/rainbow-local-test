<?php get_header() ?>

<?php the_post();?>

<article class="blog-article">
  <header class="blog-article-header" style="background-image: url(<?= bloginfo('template_directory');?>/resources/img/blog-article/1.jpg);">
    <div class="mobile-article-header-image" style ="background-image: url(<?= bloginfo('template_directory');?>/resources/img/blog-article/1.jpg);">
      
    </div>
    <div class="blog-article-caption wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s">
       <div class="blog-article-category"><?= get_the_tags()[0]->name ?></div>
       <h2><?php the_title() ?></h2>
       <div class="blog-article-date"><?php the_date() ?></div>
       <ul class="blog-article-socials-sharing">
         <li><a class="blog-article-socials-fb" href="#"></a></li>
         <li><a class="blog-article-socials-youtube" href="#"></a></li>
         <li><a class="blog-article-socials-insta" href="#"></a></li>
       </ul>
       <div class="article-favorite-status add-article-in-favorite"><div>Добавить в избранное</div></div>
       <!-- <div class="blog-article-prev"></div> -->
       <div class="blog-article-controls">
       <a href="#" class="blog-article-prev">
         <svg version="1.1"  viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
            </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
      </svg>
       <span>Предидущая статья</span>
       </a>
              <a href="#" class="blog-article-next">
         <span>Следующая статья</span>

          <svg version="1.1" id="next-svg" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
            c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
            "></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
      </svg>         
       </a>
       </div>

    </div>
  </header>
  <section class="blog-article-content">
    <div class="wow fadeInRight" data-wow-offset="75" data-wow-duration="1.5s"><?php the_content();?></div>
  </section>

  <script>
    var p = document.getElementsByTagName("p"),
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

<?php get_footer() ?>