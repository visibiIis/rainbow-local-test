<?php
/**
 * Страница 404 ошибки (404.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Упс</title>
	<?php wp_head()?>
</head>
<body>
    <section class="not-found-page"> 
    <div class="not-found-wrapper">
        <h2>404</h2>
        <div class="not-found-text">Ой, кажется, вы не туда зашли. Но мы можем вернуть вас назад:)</div>
        <!--<span class="not-found-text">Ой, кажется, вы не туда зашли </span>
        <span class="not-found-text">Но мы можем вернуть вас назад:)</span>-->
        <a href="#" class="not-found-home-link">Вернуться на главную</a>
        <!-- <div class="not-found-img"></div> -->
    </div>
    </section>

	<script src="<?php bloginfo('template_directory'); ?>/libs/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/libs/slick-1.8.0/slick/slick.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/libs/parallax.js-1.5.0/parallax.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/libs/maskedinput-1.4.1/jquery.maskedinput.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/js/init.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/libs/forAnimation/wow.min.js"></script>
</body>
</html>

