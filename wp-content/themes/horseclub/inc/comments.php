<?php
class Horseclub_Walker_Comment extends Walker_Comment {
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1; ?>
    <ul <?php comment_class('media unstyled comment-' . get_comment_ID()); ?>>
    <?php
  }

  function end_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1;
    echo '</ul>';
  }
  
  function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;

    if (!empty($args['callback'])) {
      call_user_func($args['callback'], $comment, $args, $depth);
      return;
    }

    extract($args, EXTR_SKIP); ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media comment-' . get_comment_ID()); ?>>
    <?php echo get_avatar($comment, $size = '56'); ?>
    <div class="media-body">
      <div class="comment-header clearfix">
        <h5 class="media-heading"><?php echo get_comment_author_link(); ?></h5>
        
      </div>
<div class="comment-meta">
        <div class="datetime"<?php echo comment_date('c'); ?>">
          <?php printf(esc_html__('%1$s', 'horseclub'), get_comment_date(),  get_comment_time()); ?>
        </div>
        
        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
        
        <?php edit_comment_link(esc_html__('| (Edit)', 'horseclub'), '', ''); ?>
        </div>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert">
          <?php esc_html_e('Your comment is awaiting moderation.', 'horseclub'); ?>
        </div>
      <?php endif; ?>

      <?php comment_text(); ?>
      
  <?php
  }

  function end_el(&$output, $comment, $depth = 0, $args = array()) {
    if (!empty($args['end-callback'])) {
      call_user_func($args['end-callback'], $comment, $args, $depth);
      return;
    }
    echo "</div></li>\n";
  }
}

function horseclub_get_avatar($avatar) {
  $avatar = str_replace("class='avatar", "class='avatar pull-left media-object", $avatar);
  return $avatar;
}
add_filter('get_avatar', 'horseclub_get_avatar');
