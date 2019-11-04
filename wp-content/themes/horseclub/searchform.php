<form role="search" method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label class="hide" for="s"><?php esc_html_e('Search for:', 'horseclub'); ?></label>
  <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="<?php esc_html_e('Search Here', 'horseclub'); ?>">
   <button type="submit" id="searchsubmit" class="search-icon"><i class="fa fa-search"></i></button>
</form>

