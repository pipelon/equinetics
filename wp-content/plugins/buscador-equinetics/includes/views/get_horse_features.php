<!-- CSS PARA LAS TABS -->
<link rel='stylesheet' id='vc_tta_style-css'
      href='<?= plugins_url("js_composer/assets/css/js_composer_tta.min.css?ver=5.1"); ?>' 
      type='text/css' media='all' />

<!-- INICIO DE DIV PARA LA TABS DE LAS CARACTERISTICAS -->
<div style="float: left; width: 100%;">
    <div class="tab-caracteristicas">        
        <div class="vc_tta-container" data-vc-action="collapse">
            <div
                class="vc_general vc_tta vc_tta-tabs vc_tta-shape-square vc_tta-spacing-1 
                vc_tta-o-no-fill vc_tta-tabs-position-top 
                vc_tta-controls-align-left">
                <div class="vc_tta-tabs-container">
                    <!-- TITULO DE TODAS LAS VARIABLES -->
                    <ul class="vc_tta-tabs-list">
                        <li class="vc_tta-tab vc_active" data-vc-tab="">
                            <a href="#geometria" data-vc-tabs="" 
                               data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Geometría</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#balance" data-vc-tabs="" 
                               data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Balance</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#lineaSuperior" data-vc-tabs="" 
                               data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Línea superior</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#dorso" data-vc-tabs="" 
                               data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Dorso</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#alzada" data-vc-tabs="" 
                               data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Alzada</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#morfometria" data-vc-tabs="" 
                               data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Morfometría</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#movimiento" data-vc-tabs="" 
                               data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Movimiento</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="vc_tta-panels-container">
                    <div class="vc_tta-panels">

                        <!-- PANELS DE CADA VARIABLE -->
                        <?php foreach ($arrVarDefinitiva as $key => $value): ?>
                            <div class="vc_tta-panel 
                            <?= $key == 'geometria' ? 'vc_active' : '' ?>" 
                                 id="<?= $key; ?>" 
                                 data-vc-content=".vc_tta-panel-body">
                                <div class="vc_tta-panel-heading">
                                    <h4 class="vc_tta-panel-title">
                                        <a href="#<?= $key; ?>" 
                                           data-vc-accordion="" 
                                           data-vc-container=".vc_tta-container">
                                            <span class="vc_tta-title-text">
                                                <?=
                                                isset($arrayTextos[trim($key)]) ?
                                                        $arrayTextos[trim($key)] :
                                                        $key;
                                                ?>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="vc_tta-panel-body">
                                    <div class="wpb_text_column wpb_content_element">
                                        <div class="wpb_wrapper">
                                            <?php foreach ($value as $k => $v): ?>
                                                <?php $vChart = floor(((int) $v * 100) / 3); ?>


                                                <div class="div-circular-chart">
                                                    <svg viewBox="0 0 36 36" class="circular-chart">
                                                    <path class="circle"
                                                          stroke-dasharray="<?= $vChart; ?>, 100"
                                                          d="M18 2.0845
                                                          a 15.9155 15.9155 0 0 1 0 31.831
                                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                          />
                                                    </svg>
                                                    <div class="value-circular-chart">
                                                        <?= $v; ?>
                                                    </div>
                                                    <div class="label-circular-chart">
                                                        <?=
                                                        isset($arrayTextos[trim($k)]) ?
                                                                $arrayTextos[trim($k)] :
                                                                $k;
                                                        ?>
                                                    </div>
                                                </div>


                                                
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS NECESARIOS PARA LAS TABS Y GRAFICAS DE LAS CARACTERISTICAS -->
<script type='text/javascript'
src='<?= plugins_url("js_composer/assets/lib/vc_accordion/vc-accordion.min.js?ver=5.1"); ?>'></script>
<script type='text/javascript' 
        src='<?= plugins_url("js_composer/assets/lib/vc_tabs/vc-tabs.min.js?ver=5.1"); ?>'>
</script>
<script type='text/javascript' 
        src='<?= plugins_url("js_composer/assets/lib/bower/progress-circle/ProgressCircle.min.js?ver=5.6"); ?>'>
</script>
<script type='text/javascript' 
        src='<?= plugins_url("js_composer/assets/lib/vc_chart/jquery.vc_chart.min.js?ver=5.6"); ?>'>
</script>