<?php
/**
 * Шаблон формы поиска (searchform.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>

<form role="search" method="GET" class="search-form" action="<?= home_url( '/' ); ?>">
	<input type="text" name="s" placeholder="Искать на сайте" value="<?= get_search_query(); ?>">
    <input type="submit" value="">
    <div class="search-close closeCross"></div>
</form>