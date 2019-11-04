<?php
		
	function horseclub_template_path() {return usefulpixels::$main_template;}
	function horseclub_sidebar_path() {
	return usefulpixels::sidebar();}
	class usefulpixels {
	static $main_template;
	static $base;
	static function wrap($template) {
	self::$main_template = $template;
	self::$base = substr(basename(self::$main_template), 0, -4);
	if (self::$base === 'index') {
	self::$base = false;
    }
	$templates = array('base.php');
	if (self::$base) {
	array_unshift($templates, sprintf('base-%s.php', self::$base));
    }
	return locate_template($templates);
	}
	static function sidebar() {
	$templates = array('templates/sidebar.php');
	if (self::$base) {
	array_unshift($templates, sprintf('templates/sidebar-%s.php', self::$base));
    }
	return locate_template($templates);
	}}
	add_filter('template_include', array('usefulpixels', 'wrap'), 99);
	function horseclub_title() {
	if (is_home()) {
	if (get_option('page_for_posts', true)) {
	echo get_the_title(get_option('page_for_posts', true));
    } else {
	esc_html_e('Latest Posts', 'horseclub');
    }
  } elseif (is_archive()) {
	$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
	echo $term->name;
    } elseif (is_post_type_archive()) {
	echo get_queried_object()->labels->name;
    } elseif (is_day()) {
	printf(esc_html__('Daily Archives: %s', 'horseclub'), get_the_date());
    } elseif (is_month()) {
	printf(esc_html__('Monthly Archives: %s', 'horseclub'), get_the_date('F Y'));
    } elseif (is_year()) {
	printf(esc_html__('Yearly Archives: %s', 'horseclub'), get_the_date('Y'));
    } elseif (is_author()) {
	printf(esc_html__('Author Archives: %s', 'horseclub'), get_the_author());
    } else {
      single_cat_title();
    }
  } elseif (is_search()) {
	printf(esc_html__('Search Results for %s', 'horseclub'), get_search_query());
  } elseif (is_404()) {
    esc_html_e('Not Found', 'horseclub');
  } else {
    the_title();
  }
}
	function wp_base_dir() {
	preg_match('!(https?://[^/|"]+)([^"]+)?!', site_url(), $matches);
	if (count($matches) === 3) {
    return end($matches);
  } else {
			return '';
  }
}
	function leadingslashit($string) {
	return '/' . unleadingslashit($string);
}
	function unleadingslashit($string) {
	return ltrim($string, '/');
}
	function add_filters($tags, $function) {
	foreach($tags as $tag) {
			add_filter($tag, $function);
  }
}
	function is_element_empty($element) {
	$element = trim($element);
		return empty($element) ? false : true;
}