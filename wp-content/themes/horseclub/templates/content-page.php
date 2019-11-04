<div id="content" class="container">
  <div class="row no-vc">
    <div class="main <?php echo horseclub_main_class(); ?>" role="main">
		<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
 <?php comments_template('/templates/comments.php'); ?>
  <?php endwhile; ?>

</div>
