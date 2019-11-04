<?php
  if (post_password_required()) {return;}
 if (have_comments()) : ?>
  <section id="comments">
    <h4><?php printf(_n('One Response ', '%1$s Responses ', get_comments_number(), 'horseclub'), number_format_i18n(get_comments_number()), get_the_title()); ?></h4>
    <ol class="media-list">
      <?php wp_list_comments(array('walker' => new Horseclub_Walker_Comment)); ?>
    </ol>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
   <nav>
      <ul class="pager">
        <?php if (get_previous_comments_link()) : ?>
          <li class="previous"><?php previous_comments_link(esc_html__('&larr; Older comments', 'horseclub')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="next"><?php next_comments_link(esc_html__('Newer comments &rarr;', 'horseclub')); ?></li>
        <?php endif; ?>
      </ul>
   </nav>
    <?php endif; ?>
   <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
   <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['close_comments'])) {$show_closed_comment = $horseclub_usefulpi['close_comments']; } else {$show_closed_comment = 1;}
    if($show_closed_comment == 1){ ?>
    <div class="alert">
      <?php esc_html_e('Comments are closed.', 'horseclub'); ?>
    </div>
    <?php } else { } ?>
<?php endif; ?>
  </section>
  <?php endif; ?>
<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['close_comments'])) {$show_closed_comment = $horseclub_usefulpi['close_comments']; } else {$show_closed_comment = 1;}
    if($show_closed_comment == 1){ ?>
  <section id="comments">
    <div class="alert">
      <?php esc_html_e('Comments are closed.', 'horseclub'); ?>
    </div>
  </section>
  <?php } else { } ?>
<?php endif; ?>
<?php if (comments_open()) : ?>
  <section id="respond">
     <?php if ( did_action( 'jetpack_comments_loaded' ) ) : ?>
    <?php comment_form(); ?>
    <?php else: ?>
    <h4><?php comment_form_title(esc_html__('Leave a Reply', 'horseclub'), esc_html__('Leave a Reply to %s', 'horseclub')); ?></h4>
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(esc_html__('You must be logged in to post a comment.', 'horseclub')); ?></p>
    <?php else : ?>
   <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(esc_html__('Logged in as ', 'horseclub') . '<a href="%s/wp-admin/profile.php">%s</a>.', get_option('siteurl'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_html__('Log out of this account', 'horseclub'); ?>"><?php esc_html_e('Log out &raquo;', 'horseclub'); ?></a>
          </p>
        <?php else : ?>
        <div class="row-fluid">
          <div class="col-md-4 nl">
            <label for="author"><?php esc_html_e('Name', 'horseclub'); if ($req) ' <span>*</span>'; ?></label>
            <input type="text" class="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
         </div>
         <div class="col-md-4 nl">
            <label for="email"><?php esc_html_e('Mail (will not be published)', 'horseclub'); if ($req) ' <span>*</span> '; ?></label>
            <input type="email" class="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
         </div>
         <div class="col-md-4 nl np">
            <label for="url"><?php esc_html_e('Website', 'horseclub'); ?></label>
            <input type="url" class="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>">
         </div>
        </div>
        <?php endif; ?>
        <label for="comment"><?php esc_html_e('Comment', 'horseclub'); ?></label>
        <textarea name="comment" id="comment" class="input-xlarge" rows="5" aria-required="true"></textarea>
        <p><input name="submit" class="up-button" type="submit" id="submit" value="<?php esc_html_e('Submit Comment', 'horseclub'); ?>"></p>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
      </form>
    <?php endif; ?>
    <?php endif; ?>
  </section>
<?php endif; ?>
