<?php echo get_avatar($comment, $size = '56'); ?>
<div class="media-body">
  <h5 class="media-heading"><?php echo get_comment_author_link(); ?></h5>
  <time datetime="<?php echo comment_date('c'); ?>">
    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(esc_html__('%1$s', 'horseclub'), get_comment_date(),  get_comment_time()); ?></a>
  </time>
  <?php edit_comment_link(esc_html__('(Edit)', 'horseclub'), '', ''); ?>

  <?php if ($comment->comment_approved == '0') : ?>
    <div class="alert">
      <?php esc_html_e('Your comment is awaiting moderation.', 'horseclub'); ?>
    </div>
  <?php endif; ?>

  <?php comment_text(); ?>
  
  <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
