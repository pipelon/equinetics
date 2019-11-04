<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php global $horseclub_usefulpi; ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php if (isset($horseclub_usefulpi['usefulpi_custom_favicon']['url'])) { echo $horseclub_usefulpi['usefulpi_custom_favicon']['url']; } ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
<?php wp_head(); ?>
</head>
