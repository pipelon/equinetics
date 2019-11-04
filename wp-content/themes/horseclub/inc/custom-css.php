<?php
function horseclub_custom_css() {

global $horseclub_usefulpi; 
//Logo
if(isset($horseclub_usefulpi['logo_padding_top'])) {
$logo_padding_top = '#logo {margin-top:'.$horseclub_usefulpi['logo_padding_top'].'px;}';
} else {
  $logo_padding_top = '#logo {margin-top:10px;}';
}
if(isset($horseclub_usefulpi['logo_padding_top_st'])) {
$logo_padding_top_st = '.topclass.topclass-shrink #logo #uplogo img {margin-top:'.$horseclub_usefulpi['logo_padding_top_st'].'px;}';
} else {
  $logo_padding_top_st = '.topclass.topclass-shrink #logo #uplogo img {margin-top:5px;}';
}
if(isset($horseclub_usefulpi['logo_padding_bottom'])) {
 $logo_padding_bottom = '#logo {padding-bottom:'.$horseclub_usefulpi['logo_padding_bottom'].'px;}';
 } else {
  $logo_padding_bottom = '#logo {margin-bottom:10px;}';
 } 
 if(isset($horseclub_usefulpi['logo_padding_left'])) {
 $logo_padding_left = '#logo {margin-left:'.$horseclub_usefulpi['logo_padding_left'].'px;}';
 } else {
$logo_padding_left = '#logo {margin-left:0px;}';
 }
 if(isset($horseclub_usefulpi['logo_padding_right'])) {
  $logo_padding_right = '#logo {margin-right:'.$horseclub_usefulpi['logo_padding_right'].'px;}';
} else {
  $logo_padding_right = '';
}
if(isset($horseclub_usefulpi['menu_margin_top'])) {
 $menu_margin_top = '#nav-main, .search_menu, .shop_icon, .popup_menuo {margin-top:'.$horseclub_usefulpi['menu_margin_top'].'px;}';
 } else {
  $menu_margin_top = '#nav-main {margin-top:0px;}';
 } 
 if(isset($horseclub_usefulpi['menu_margin_list'])) {
 $menu_margin_list = '.topbarmenu ul li {margin-right:'.$horseclub_usefulpi['menu_margin_list'].'px;}';
 } else {
  $menu_margin_list = '.topbarmenu ul li {margin-right:15px;}';
 }
 if(isset($horseclub_usefulpi['menu_margin_top'])) {
 $menu_margin_top_st = '.topclass.topclass-shrink #nav-main, .topclass.topclass-shrink .shop_icon, .topclass.topclass-shrink .search_menu, .topclass.topclass-shrink .popup_menuo {margin-top:'.$horseclub_usefulpi['menu_margin_top_st'].'px;}';
 } else {
  $menu_margin_top_st = '.topclass.topclass-shrink #nav-main, .topclass.topclass-shrink .shop_icon, .topclass.topclass-shrink .search_menu {margin-top:0px;}';
 } 
  if(isset($horseclub_usefulpi['drop_margin_down'])) {
 $menu_drop = 'ul.sf-dropdown-menu{margin-top:'.$horseclub_usefulpi['drop_margin_down'].'px !important;}';
 } else {
  $menu_drop = '';
 } 
 
  if($horseclub_usefulpi['blog_txt']  == 'bt_2') {
 $blog = '.blogo_bottom_content {text-align: center;}';
 } else {
  $blog = '';
 } 
 
 
//Menu & Top Bar BG
 if(isset($horseclub_usefulpi['topbar_bg_color'])) {
 $bar_top_bf = '.top-bar-section {background:'.$horseclub_usefulpi['topbar_bg_color'].';}';
 } else {
  $bar_top_bf = '.top-bar-section{background:#ccc;}';
 } 
 
  if(isset($horseclub_usefulpi['sticky_font_color'])) {
 $sticky = '.topclass-shrink #nav-main ul.sf-menu a {color:'.$horseclub_usefulpi['sticky_font_color'].' !important;}';
 } else {
  $sticky = '';
 } 
 
  if(isset($horseclub_usefulpi['topbar_ss_color'])) {
 $bar_top_ss = '.search_menu i,.shop_icon a, .search_menu i {color:'.$horseclub_usefulpi['topbar_ss_color'].' !important;}';
 } else {
  $bar_top_ss = '';
 } 
   if(isset($horseclub_usefulpi['topbar_mm_color'])) {
 $bar_top_mm = '.nav-trigger-case .up-menu-icon i {color:'.$horseclub_usefulpi['topbar_mm_color'].' !important;}';
 } else {
  $bar_top_mm = '';
 }

  if(isset($horseclub_usefulpi['topbar_mmp_color'])) {
 $bar_top_mmp = '#toggle-menu span {background:'.$horseclub_usefulpi['topbar_mmp_color'].' !important;}';
 } else {
  $bar_top_mmp = '';
 } 
 
   if(isset($horseclub_usefulpi['active_menu_color'])) {
 $ac_top = '#nav-main ul.sf-menu li.current_page_item>a {color:'.$horseclub_usefulpi['active_menu_color'].' !important;}';
 } else {
  $ac_top = '';
 } 
 
  if(!empty($horseclub_usefulpi['main_menu_bg_color'])) {
 $menu_cc = '.topclass{background-color:'.$horseclub_usefulpi['main_menu_bg_color'].'!important;}';
 } else {
  $menu_cc = '';
 } 
   if(!empty($horseclub_usefulpi['st_menu_bg_color']))  {
 $menu_stc = '.normal .topclass.topclass-shrink{background:'.$horseclub_usefulpi['st_menu_bg_color'].'!important;}';
 } else {
  $menu_stc = '';
 }
 
 if(isset($horseclub_usefulpi['st_menu_bg_color_o'])) {
 $st_menu_o = '.normal .topclass.topclass-shrink {background:'.$horseclub_usefulpi['st_menu_bg_color_o'].' !important;}';
 } else {
  $st_menu_o = '';
 } 
  if(isset($horseclub_usefulpi['t_menu_bg_color_r'])) {
 $t_menu_r = '.normal.light .topclass{background:'.$horseclub_usefulpi['t_menu_bg_color_r'].' !important;}';
 } else {
  $t_menu_r = '';
 } 
 
   if(!empty($horseclub_usefulpi['loader_bg_color'])) {
 $loader_cc = '.spinner,.spinner.sp_2>div,.cube1,.cube2,.spinner.sp_4>div{background-color:'.$horseclub_usefulpi['loader_bg_color'].';}';
 } else {
  $loader_cc = '';
 } 
//Typography
  if(!empty($horseclub_usefulpi['font_h1'])) {
  $font_family = '.topbarmenu ul li {font-family:'.$horseclub_usefulpi['font_primary_menu']['font-family'].';}';
} else {
  $font_family = '';
}
if(isset($horseclub_usefulpi['menu_icon'])) {
 $micon = '.topbarmenu ul li.menu_icon a i {font-size:'.$horseclub_usefulpi['menu_icon'].'px;}';
 } else {
  $micon = '';
 }

//Disable circle effect on mouseover


$fof ='';
if($horseclub_usefulpi['display_footer_all'] == '1') {
$fof = '.footer_up_wrap{display: none;}';
}

//Advanced Styling

if(!empty($horseclub_usefulpi['content_bg_color'])) {
$content_bg_color = $horseclub_usefulpi['content_bg_color'];
} else {
  $content_bg_color = '';
}
if(!empty($horseclub_usefulpi['bg_content_bg_img']['url'])) { 
  $content_bg_img = 'url('.$horseclub_usefulpi['bg_content_bg_img']['url'].')'; 
} else {
  $content_bg_img = '';
}
if(!empty($horseclub_usefulpi['blog_content_bg_img']['url'])) { 
  $blog_bg_img = 'url('.$horseclub_usefulpi['blog_content_bg_img']['url'].')'; 
} else {
  $blog_bg_img = '';
}
 
  if (!empty($horseclub_usefulpi['blog_content_bg_img']['url'])){
    $blog_bg = 'body.archive .wrap.maincontent, body.home.blog .wrap.maincontent, .page-template-page-blog-php .wrap.maincontent, .page-template-page-blog-medium-php .wrap.maincontent ,body.single.single-post .wrap.maincontent,.page-template-page-masonry-php .wrap.maincontent, .page-template-page-masonryw-php .wrap.maincontent {background:'.$blog_bg_img.'}';
  } else {
    $blog_bg = '';
  }
  
 if(!empty($horseclub_usefulpi['main_menu_img']['url'])) { 
  $mm_bg_img = 'url('.$horseclub_usefulpi['main_menu_img']['url'].')'; 
} else {
  $mm_bg_img = ''; 
  
} 
  
  if (!empty($horseclub_usefulpi['main_menu_img']['url'])){
    $head_bg = '@media (min-width: 1025px) {.topclass{background-image:'.$mm_bg_img.' !important}}';
  } else {
    $head_bg = '';
  } 
  
if(!empty($horseclub_usefulpi['content_bg_repeat'])) {
$content_bg_repeat = $horseclub_usefulpi['content_bg_repeat'];
} else {
  $content_bg_repeat = '';
}
if(!empty($horseclub_usefulpi['content_bg_placementx'])) {
  $content_bg_x = $horseclub_usefulpi['content_bg_placementx'];
} else {
  $content_bg_x = '';
}
if (!empty($horseclub_usefulpi['content_bg_placementy'])) {
$content_bg_y = $horseclub_usefulpi['content_bg_placementy']; 
} else {
  $content_bg_y = '';
}
if (!empty($horseclub_usefulpi['content_bg_color'])) {
    $contentclass = '.wrap.maincontent {background:'.$content_bg_color.' !important;}';
	  
  } else {
    $contentclass = '';
  }
if(!empty($horseclub_usefulpi['main_bg_fixed'])) {
$mainbg_fixed = 'background-attachment:'.$horseclub_usefulpi['main_bg_fixed'].' !important'; 

} else {
  $mainbg_fixed = '';
}
  
  if (!empty($horseclub_usefulpi['bg_content_bg_img']['url'])){
    $contentclass_img = '.wrap.maincontent {background:'.$content_bg_img.' '.$content_bg_repeat.' '.$content_bg_x.' '.$content_bg_y.' !important; '.$mainbg_fixed.'}';
  } else {
    $contentclass_img = '';
  }
  
 //popup menu
if(!empty($horseclub_usefulpi['leftpopup_bg_color'])) {
$leftpopup_bg_color = $horseclub_usefulpi['leftpopup_bg_color'];
} else {
  $leftpopup_bg_color = '';
}
if (!empty($horseclub_usefulpi['leftpopup_bg_color'])) {
    $leftpopup_bg = '.popup-bg{background:'.$leftpopup_bg_color.' !important;}';
	  
  } else {
    $leftpopup_bg = '';
  }  
  
if(!empty($horseclub_usefulpi['popup_bg_color'])) {
$popup_bg_color = $horseclub_usefulpi['popup_bg_color'];
} else {
  $popup_bg_color = '';
}
if (!empty($horseclub_usefulpi['popup_bg_color'])) {
    $pop_bg_w = '.popup-left-bg {background-color:'.$popup_bg_color.' !important;}';
	  
  } else {
    $pop_bg_w = '';
  }   
  
  if(!empty($horseclub_usefulpi['bg_pop_bg_img']['url'])) { 
  $bg_pop_img = 'url('.$horseclub_usefulpi['bg_pop_bg_img']['url'].')'; 
} else {
  $bg_pop_img = '';
} 

  if (!empty($horseclub_usefulpi['bg_pop_bg_img']['url'])){
    $pop_img = '.popup-left-bg {background-image:'.$bg_pop_img.' !important; }';
 
  } else {
    $pop_img = '';
  }
  
  //left popup menu
  
    if(!empty($horseclub_usefulpi['bg_bar_bg_img']['url'])) { 
  $bg_bar_img = 'url('.$horseclub_usefulpi['bg_bar_bg_img']['url'].')'; 
} else {
  $bg_bar_img = '';
} 

  if (!empty($horseclub_usefulpi['bg_bar_bg_img']['url'])){
    $bar_img = '.popup-left-bg-bar {background-image:'.$bg_bar_img.' !important; }';
 
  } else {
    $bar_img = '';
  }
  
  if(!empty($horseclub_usefulpi['leftbar_bg_color'])) {
$leftbar_bg_color = $horseclub_usefulpi['leftbar_bg_color'];
} else {
  $leftbar_bg_color = '';
}
if (!empty($horseclub_usefulpi['leftbar_bg_color'])) {
    $leftbr_bg = '#pop_left{background:'.$leftbar_bg_color.'}';
	  
  } else {
    $leftbr_bg = '';
  }
  
 //Meg menu

  if(!empty($horseclub_usefulpi['bg_mega1']['url'])) { 
  $bg_mm = 'url('.$horseclub_usefulpi['bg_mega1']['url'].')'; 
} else {
  $bg_mm = '';
} 

  if (!empty($horseclub_usefulpi['bg_mega1']['url'])){
    $mm_1 = '.megabg_1 ul {background-image:'.$bg_mm.' !important; }';
 
  } else {
    $mm_1 = '';
  } 
  
  
    if(!empty($horseclub_usefulpi['bg_mega2']['url'])) { 
  $bg_mm_2 = 'url('.$horseclub_usefulpi['bg_mega2']['url'].')'; 
} else {
  $bg_mm_2 = '';
} 

  if (!empty($horseclub_usefulpi['bg_mega2']['url'])){
    $mm_2 = '.megabg_2 ul {background-image:'.$bg_mm_2.' !important; }';
 
  } else {
    $mm_2 = '';
  } 
  
  
  
 //left menu
if(!empty($horseclub_usefulpi['leftmenu_bg_color'])) {
$leftmenu_bg_color = $horseclub_usefulpi['leftmenu_bg_color'];
} else {
  $leftmenu_bg_color = '';
}
if (!empty($horseclub_usefulpi['leftmenu_bg_color'])) {
    $leftmenu_bg = '.topclass,#up_topbar_left {background-color:'.$leftmenu_bg_color.' !important;}';
	  
  } else {
    $leftmenu_bg = '';
  }
 
 if(!empty($horseclub_usefulpi['bg_leftmenu_bg_img']['url'])) { 
  $bg_lm_bg_img = 'url('.$horseclub_usefulpi['bg_leftmenu_bg_img']['url'].')'; 
} else {
  $bg_lm_bg_img = '';
}
if(!empty($horseclub_usefulpi['leftmenu_bg_repeat'])) {
$leftmenu_bg_repeat = $horseclub_usefulpi['leftmenu_bg_repeat'];
} else {
  $leftmenu_bg_repeat = '';
}
if(!empty($horseclub_usefulpi['leftmenu_bg_placementx'])) {
  $lm_bg_x = $horseclub_usefulpi['leftmenu_bg_placementx'];
} else {
  $lm_bg_x = '';
}
if (!empty($horseclub_usefulpi['leftmenu_bg_placementy'])) {
$lm_bg_y = $horseclub_usefulpi['leftmenu_bg_placementy']; 
} else {
  $lm_bg_y = '';
}
   if (!empty($horseclub_usefulpi['bg_leftmenu_bg_img']['url'])){
    $lmcontentclass_img = '@media (min-width: 1025px) {#up_topbar_left {background:'.$bg_lm_bg_img.' '.$leftmenu_bg_repeat.' '.$lm_bg_x.' '.$lm_bg_y.' !important; }}';
 
  } else {
    $lmcontentclass_img = '';
  }
 
if(!empty($horseclub_usefulpi['mobile_bg_color'])) {
$mobile_bg_color = $horseclub_usefulpi['mobile_bg_color'];
} else {
  $mobile_bg_color = '';
}
if(!empty($horseclub_usefulpi['bg_mobile_bg_img']['url'])) { 
  $mobile_bg_img = 'url('.$horseclub_usefulpi['bg_mobile_bg_img']['url'].')'; 
} else {
  $mobile_bg_img = '';
}
if(!empty($horseclub_usefulpi['mobile_bg_repeat'])) {
$mobile_bg_repeat = $horseclub_usefulpi['mobile_bg_repeat'];
} else {
  $mobile_bg_repeat = '';
}
if(!empty($horseclub_usefulpi['mobile_bg_placementx'])) {
$mobile_bg_x = $horseclub_usefulpi['mobile_bg_placementx'];
} else {
  $mobile_bg_x = '';
}
if(!empty($horseclub_usefulpi['mobile_bg_placementy'])) {
$mobile_bg_y = $horseclub_usefulpi['mobile_bg_placementy'];
} else {
  $mobile_bg_y = '';
}
if(!empty($horseclub_usefulpi['mobile_bg_color']) || !empty($horseclub_usefulpi['bg_mobile_bg_img']['url'])) {
    $mobileclass = '.mobileclass {background:'.$mobile_bg_color.' '.$mobile_bg_img.' '.$mobile_bg_repeat.' '.$mobile_bg_x.' '.$mobile_bg_y.';}';
  } else {
    $mobileclass = '';
  }

 if (!empty($horseclub_usefulpi['footerc_bg_color'])) {
    $foocopy = '.footercopy{background:'.$horseclub_usefulpi['footerc_bg_color'].'!important;}';
	  
  } else {
    $foocopy = '';
  } 
  
if(!empty($horseclub_usefulpi['footer_bg_color'])) {
$footer_bg_color = $horseclub_usefulpi['footer_bg_color'];
} else {
  $footer_bg_color = '';
}
if(!empty($horseclub_usefulpi['bg_footer_bg_img']['url'])) {
 $footer_bg_img = 'url('.$horseclub_usefulpi['bg_footer_bg_img']['url'].')'; 
} else {
  $footer_bg_img = '';
}
if(!empty($horseclub_usefulpi['footer_bg_repeat'])) {
$footer_bg_repeat = $horseclub_usefulpi['footer_bg_repeat'];
} else {
  $footer_bg_repeat = '';
}
if(!empty($horseclub_usefulpi['footer_bg_placementx'])) {
$footer_bg_x = $horseclub_usefulpi['footer_bg_placementx'];
} else {
  $footer_bg_x = '';
}
if(!empty($horseclub_usefulpi['footer_bg_placementy'])) {
$footer_bg_y = $horseclub_usefulpi['footer_bg_placementy'];
} else {
  $footer_bg_y = '';
}
if(!empty($horseclub_usefulpi['footer_bg_color']) || !empty($horseclub_usefulpi['bg_footer_bg_img']['url'])) {
    $footerclass = '.footer_up_wrap {background:'.$footer_bg_color.' '.$footer_bg_img.' '.$footer_bg_repeat.' '.$footer_bg_x.' '.$footer_bg_y.' !important ;}';
  } else {
    $footerclass = '';
  }
if(!empty($horseclub_usefulpi['boxed_bg_color'])) {
$boxedbg_color = $horseclub_usefulpi['boxed_bg_color'];
} else {
  $boxedbg_color = '';
}
if(!empty($horseclub_usefulpi['bg_boxed_bg_img']['url'])) { 
  $boxedbg_img = 'url('.$horseclub_usefulpi['bg_boxed_bg_img']['url'].')'; 
} else {
  $boxedbg_img = '';
}
if(!empty($horseclub_usefulpi['boxed_bg_repeat'])) {
$boxedbg_repeat = $horseclub_usefulpi['boxed_bg_repeat'];
} else {
  $boxedbg_repeat = '';
}
if(!empty($horseclub_usefulpi['boxed_bg_placementx'])) {
$boxedbg_x = $horseclub_usefulpi['boxed_bg_placementx'];
} else {
  $boxedbg_x = '';
}
if(!empty($horseclub_usefulpi['boxed_bg_placementy'])) {
$boxedbg_y = $horseclub_usefulpi['boxed_bg_placementy'];
} else {
  $boxedbg_y = '';
}
if(!empty($horseclub_usefulpi['boxed_bg_fixed'])) {
$boxedbg_fixed = $horseclub_usefulpi['boxed_bg_fixed']; 
} else {
  $boxedbg_fixed = '';
}
if(!empty($horseclub_usefulpi['boxed_bg_color']) || !empty($horseclub_usefulpi['bg_boxed_bg_img']['url'])) {
    $boxedclass = 'body {background:'.$boxedbg_color.' '.$boxedbg_img.' '.$boxedbg_repeat.' '.$boxedbg_x.' '.$boxedbg_y.'; background-attachment:'.$boxedbg_fixed.';}';
  } else {
    $boxedclass = '';
  }


  if(!empty($horseclub_usefulpi['x2_usefulpi_logo_upload']['url'])) {
  $x2logo = ' @media (max-width: 1025px) {#logo .up-logo {display: none;} #logo .retina-logo {display: block;}}';
} else {
  $x2logo = '';
}

if (!empty($horseclub_usefulpi['custom_css'])) {
  $custom_css = $horseclub_usefulpi['custom_css'];
} else {
  $custom_css = '';
}

$horseclub_custom_css = '<style type="text/css">'.$logo_padding_top.$logo_padding_top_st.$logo_padding_bottom.$logo_padding_left.$t_menu_r.$head_bg.$logo_padding_right.$menu_cc.$menu_stc.$st_menu_o.$blog.$micon.$menu_margin_top.$ac_top.$blog_bg.$fof.$sticky.$leftbr_bg.$menu_margin_top_st.$blog_bg.$lmcontentclass_img.$leftmenu_bg.$pop_img.$leftpopup_bg.$pop_bg_w.$bar_top_bf.$menu_margin_list.$menu_drop.$mm_1.$mm_2.$loader_cc.$font_family.$contentclass.$foocopy.$contentclass_img.$mobileclass.$bar_top_ss.$bar_img.$bar_top_mm.$bar_top_mmp.$footerclass.$boxedclass.$x2logo.$custom_css.'</style>';
  echo $horseclub_custom_css;
}

add_action('wp_head', 'horseclub_custom_css');
?>
