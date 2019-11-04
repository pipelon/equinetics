<?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['footer_main_style'])) {$fskin = $horseclub_usefulpi['footer_main_style'];} else { $fskin = 'dark';}?>
<div class="footer_up_wrap <?php echo $fskin;?> <?php global $horseclub_usefulpi; if($horseclub_usefulpi['display_footer_rug'] == '1') echo 'cover';?>">
<footer id="up_footerwrap" class="footerclass" role="contentinfo">
  <div class="container">
  		<div class="row">
  		<?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['footer_layout'])) { $footer_layout = $horseclub_usefulpi['footer_layout']; } else { $footer_layout = 'columns_4'; }
  			if ($footer_layout == "columns_4") {
  							if (is_active_sidebar('footer_1') ) { ?> 
					<div class="col-md-3 footercol1">
					<?php dynamic_sidebar(esc_html__("Footer Column 1", "horseclub")); ?>
					</div> 
            	<?php }; ?>
				<?php if (is_active_sidebar('footer_2') ) { ?> 
					<div class="col-md-3 footercol2">
					<?php dynamic_sidebar(esc_html__("Footer Column 2", "horseclub")); ?>
					</div> 
		        <?php }; ?>
		        <?php if (is_active_sidebar('footer_3') ) { ?> 
					<div class="col-md-3 footercol3">
					<?php dynamic_sidebar(esc_html__("Footer Column 3", "horseclub")); ?>
					</div> 
	            <?php }; ?>
				<?php if (is_active_sidebar('footer_4') ) { ?> 
					<div class="col-md-3 footercol4">
					<?php dynamic_sidebar(esc_html__("Footer Column 4", "horseclub")); ?>
					</div> 
		        <?php }; ?>
	
		       <?php }
			   if ($footer_layout == "columns_3") {
  							if (is_active_sidebar('footer_1') ) { ?> 
					<div class="col-md-4 footercol1">
					<?php dynamic_sidebar(esc_html__("Footer Column 1", "horseclub")); ?>
					</div> 
            	<?php }; ?>
				<?php if (is_active_sidebar('footer_2') ) { ?> 
					<div class="col-md-4 footercol2">
					<?php dynamic_sidebar(esc_html__("Footer Column 2", "horseclub")); ?>
					</div> 
		        <?php }; ?>
		        <?php if (is_active_sidebar('footer_3') ) { ?> 
					<div class="col-md-4 footercol3">
					<?php dynamic_sidebar(esc_html__("Footer Column 3", "horseclub")); ?>
					</div> 
	            <?php }; ?>				
		       <?php }			   		   
		   ?>
        </div>
		</div>
</footer>	 
	   <div class="footercopy clearfix">        
		<?php if(isset($horseclub_usefulpi['footer_text'])) { $footertext = $horseclub_usefulpi['footer_text'];} else {$footertext = 'Horse Club Wordpress Theme';} echo do_shortcode($footertext); ?>		
    	</div>
</div><!-- .footer_up_wrap-->
<!-- Custom JS-code-->
<?php global $horseclub_usefulpi;if(!empty($horseclub_usefulpi['js-code'])){echo '<script>' . $horseclub_usefulpi['js-code'] . '</script>';}?>
<?php wp_footer(); ?>