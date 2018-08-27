<?php
/*
Template Name: Account Page
*/

get_header(); ?>
<div class="account_page">
<div class="wrapper">
  <?php
  $content_page = apply_filters('the_content', $post->post_content);
  echo '<div class="user-forms">';
  echo $content_page;
  echo '</div>';
  ?>
</div>
<div class="password-reset modal-win" style="display: none;">
    <div class="closeCross"></div>
    <form class="password-reset-form">
      <div class="password-reset-input">
        <label for="">
          <span><?php echo TEXT_CURRENT_PASSWORD;?></span>
          <input type="password" name="oldPassword" placeholder="">
        </label>
      </div>
      <div class="password-reset-input">
        <label for="">
          <span><?php echo TEXT_NEW_PASSWORD;?></span>
          <input type="password" name="newPassword" placeholder="">
        </label>
      </div>
      <div class="password-reset-input">
        <label for="">
          <span><?php echo TEXT_NEW_PASSWORD_CONFIRM;?></span>
          <input type="password" name="repeatPassword" placeholder="">
        </label>
      </div>
      <div class="password-reset-button">
        <button class="btn-change-pass button"><?php echo TEXT_SAVE;?></button>
      </div>
    </form>
  </div>
</div>
<?php get_footer(); ?>