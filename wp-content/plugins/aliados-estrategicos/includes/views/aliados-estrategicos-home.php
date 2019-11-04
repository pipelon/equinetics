<link rel='stylesheet' id='rs-plugin-settings-css'  href='<?= plugins_url("revslider/public/assets/css/settings.css?ver=5.4.1"); ?>' 
      type='text/css' 
      media='all' />

<?php $aliados = aliado_get_all_aliado(); ?>

<div class="vc_container">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="flexslider testimonial tcenter ">
                    <ul class="slides">
                        <?php foreach ($aliados as $aliado) : ?>
                            <li style="/*width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;*/" class="">
                                <div class="testimonials-carousel-thumbnail">
                                    <?php if (empty($aliado->logo_imagen)) : ?>
                                        <img src="<?= plugins_url("aliados-estrategicos/includes/views/resources/sin-imagen.png"); ?>" 
                                             draggable="false" 
                                             alt="<?= $aliado->nombre; ?>" 
                                             style="height: 150px; border: 1px solid #ccc; padding: 5px;" />
                                         <?php else : ?>
                                        <img src="<?= $aliado->logo_imagen; ?>" 
                                             alt="<?= $aliado->nombre; ?>" 
                                             draggable="false" 
                                             style="height: 150px; border: 1px solid #ccc; padding: 5px;" />
                                         <?php endif; ?>
                                </div>
                                <div class="testimonials-carousel-context">
                                    <div class="testimonials-carousel-content">
                                        <?= $aliado->descripcion_corta; ?>
                                    </div>
                                    <div class="testimonials-name">
                                        <h3><?= $aliado->nombre; ?></h3>
                                        <span><?= $aliado->email; ?></span>
                                        <span><?= $aliado->url; ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>                        
                    </ul>
                    <ul class="flex-direction-nav">
                        <li>
                            <a class="flex-prev" href="#">
                                <div><i class="left_nav_slider testi"></i></div>
                            </a>
                        </li>
                        <li>
                            <a class="flex-next" href="#">
                                <div><i class="right_nav_slider testi"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/bower/flexslider/jquery.flexslider-min.js?ver=5.1"); ?>'></script>