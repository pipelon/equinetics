<link rel='stylesheet' id='vc_tta_style-css'
    href='<?= plugins_url("js_composer/assets/css/js_composer_tta.min.css?ver=5.1"); ?>' type='text/css' media='all' />

<div style="width: 100%; float: left">
    <?php $variables = get_post_meta($atts['horseid']);?>

    <?php foreach($variables as $key => $value) :?>
    <?php if(substr($key, 0, 8) === "varsara_") : ;?>
    <?php $temp = explode("_", substr($key, 8)); ?>
    <?php $vChart = floor(((int)$value[0]*100)/3); ?>
    <div class="chart" style="--value: <?= $vChart; ?>%">
        <p>
            <span class="tituVar"><?= $temp[0]; ?></span>
            <span class="subtituVaR"><?= $temp[1]; ?></span>
        </p>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>

<div style="float: left; width: 100%;">
    <div class="tab-caracteristicas">
        <h2>Características</h2>
        <br />
        <div class="vc_tta-container" data-vc-action="collapse">
            <div
                class="vc_general vc_tta vc_tta-tabs vc_tta-shape-square vc_tta-spacing-1 vc_tta-o-no-fill vc_tta-tabs-position-top vc_tta-controls-align-left">
                <div class="vc_tta-tabs-container">
                    <ul class="vc_tta-tabs-list">
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#geometria" data-vc-tabs="" data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Geometría</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#balance" data-vc-tabs="" data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Balance</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#linea_superior" data-vc-tabs="" data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Línea superior</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="vc_tta-panels-container">
                    <div class="vc_tta-panels">
                        <div class="vc_tta-panel" id="geometria" data-vc-content=".vc_tta-panel-body">
                            <div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title">
                                    <a href="#geometria" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                        <span class="vc_tta-title-text">Geometría</span></a>
                                </h4>
                            </div>
                            <div class="vc_tta-panel-body">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        Geometría
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_tta-panel" id="balance" data-vc-content=".vc_tta-panel-body">
                            <div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title">
                                    <a href="#balance" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                        <span class="vc_tta-title-text">Balance</span>
                                    </a>
                                </h4>
                            </div>
                            <div class="vc_tta-panel-body">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        Balance
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_tta-panel" id="linea_superior" data-vc-content=".vc_tta-panel-body">
                            <div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title">
                                    <a href="#linea_superior" data-vc-accordion=""
                                        data-vc-container=".vc_tta-container">
                                        <span class="vc_tta-title-text">Línea superior</span>
                                    </a>
                                </h4>
                            </div>
                            <div class="vc_tta-panel-body">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        Línea superior
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'
    src='<?= plugins_url("js_composer/assets/lib/vc_accordion/vc-accordion.min.js?ver=5.1"); ?>'></script>
<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/vc_tabs/vc-tabs.min.js?ver=5.1"); ?>'>
</script>