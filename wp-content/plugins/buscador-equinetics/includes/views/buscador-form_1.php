<!-- INICIO CSS TABS -->
<link rel='stylesheet' 
      id='vc_tta_style-css'  
      href='<?= plugins_url("js_composer/assets/css/js_composer_tta.min.css?ver=5.1"); ?>' 
      type='text/css' media='all' />

<!-- INICIO FORM SOFTWARE -->
<form name="buscadr" action="" method="POST" class="buscadr">

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12 well infollegua">
            <h1 style="font-size: 20px;"
                class="vc_custom_heading text-center space">DATOS DE LA YEGUA</h1>
            <div class="vc_separator wpb_content_element vc_separator_align_center 
                 vc_sep_width_20 vc_sep_double vc_sep_pos_align_center 
                 underlined_title_red vc_separator-has-text">
                <span class="vc_sep_holder vc_sep_holder_l">
                    <span style="border-color:#be1e2d;" class="vc_sep_line"></span>

                </span>
                <h4>Subrayado</h4>
                <span class="vc_sep_holder vc_sep_holder_r">
                    <span style="border-color:#be1e2d;" class="vc_sep_line">                
                    </span>                
                </span>
            </div>
            <div class="form-row margin-space">
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="form-group col-md-4">
                    <label for="andar">Andar</label>
                    <input type="text" class="form-control" name="andar" id="andar">
                </div>
                <div class="form-group col-md-4">
                    <label for="registro">Registro</label>
                    <input type="text" class="form-control" name="registro" id="registro">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="padre">Padre</label>
                    <input type="text" class="form-control" name="padre" id="padre">
                </div>
                <div class="form-group col-md-4">
                    <label for="madre">Madre</label>
                    <input type="text" class="form-control" name="madre" id="madre">
                </div>
                <div class="form-group col-md-4">
                    <label for="abuelo_materno">Abuelo materno</label>
                    <input type="text" class="form-control" name="abuelo_materno" id="abuelo_materno">
                </div>
            </div>
            <?php if (is_user_logged_in()) : ?>
                <div class="form-row">
                    <div class="form-group col-md-12 text-center">
                        <label></label>
                        <button name="guardar" id="guardar" class="woocommerce-Button button">
                            Guardar información de la Yegua
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="vc_tta-container tta-cruza" data-vc-action="collapse">
        <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-black 
             vc_tta-style-outline vc_tta-shape-square vc_tta-spacing-1 
             vc_tta-o-no-fill vc_tta-tabs-position-left 
             vc_tta-controls-align-left">
            <div class="vc_tta-tabs-container">
                <ul class="vc_tta-tabs-list">
                    <li class="vc_tta-tab vc_active" data-vc-tab="">
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
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#espalda" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Espalda</span>
                        </a>
                    </li>
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#dorso" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Dorso</span>
                        </a>
                    </li>
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#grupa" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Grupa</span>
                        </a>
                    </li>
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#aplomos" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Aplomos</span>
                        </a>
                    </li>
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#alzada" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Alzada</span>
                        </a>
                    </li>
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#morfometria" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Morfometría</span>
                        </a>
                    </li>
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#movimiento" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Movimiento</span>
                        </a>
                    </li>
                    <li class="vc_tta-tab" data-vc-tab="">
                        <a href="#mejoramiento" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">Mejoramiento del reproductor</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="vc_tta-panels-container">
                <div class="vc_tta-panels">

                    <!-- INICIO PANEL GEOMETRIA -->
                    <div class="vc_tta-panel vc_active" id="geometria" data-vc-content=".vc_tta-panel-body">   
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#geometria" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">GEOMETRIA</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor"><?= isset($_POST['geometria_figura']) ? $_POST['geometria_figura'] : 1; ?></span>
                                                    <label for="geometria_figura">Figura</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="geometria_figura" 
                                                           name="geometria_figura" 
                                                           value="<?= isset($_POST['geometria_figura']) ? $_POST['geometria_figura'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['geometria_orientacion']) ? $_POST['geometria_orientacion'] : 1; ?>
                                                    </span>
                                                    <label for="geometria_orientacion">Orientación</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="geometria_orientacion" 
                                                           name="geometria_orientacion" 
                                                           value="<?= isset($_POST['geometria_orientacion']) ? $_POST['geometria_orientacion'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>    

                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL GEOMETRIA -->

                    <!-- INICIO PANEL BALANCE -->
                    <div class="vc_tta-panel" id="balance" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#balance" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">BALANCE</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['balance_horizontal']) ? $_POST['balance_horizontal'] : 1; ?>
                                                    </span>
                                                    <label for="balance_horizontal">Horizontal</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="balance_horizontal" 
                                                           name="balance_horizontal" 
                                                           value="<?= isset($_POST['balance_horizontal']) ? $_POST['balance_horizontal'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['balance_vertical']) ? $_POST['balance_vertical'] : 1; ?>
                                                    </span>
                                                    <label for="balance_vertical">Vertical</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="balance_vertical" 
                                                           name="balance_vertical" 
                                                           value="<?= isset($_POST['balance_vertical']) ? $_POST['balance_vertical'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL BALANCE -->

                    <!-- INICIO PANEL LINEA SUPERIOR -->
                    <div class="vc_tta-panel" id="linea_superior" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#linea_superior" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">LINEA SUPERIOR</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['lnsup_cabeza']) ? $_POST['lnsup_cabeza'] : 1; ?>
                                                    </span>
                                                    <label for="lnsup_cabeza">Cabeza</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="lnsup_cabeza" 
                                                           name="lnsup_cabeza" 
                                                           value="<?= isset($_POST['lnsup_cabeza']) ? $_POST['lnsup_cabeza'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['lnsup_longcuello']) ? $_POST['lnsup_longcuello'] : 1; ?>
                                                    </span>
                                                    <label for="lnsup_longcuello">Longitud cuello</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="lnsup_longcuello" 
                                                           name="lnsup_longcuello" 
                                                           value="<?= isset($_POST['lnsup_longcuello']) ? $_POST['lnsup_longcuello'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['lnsup_oriencuello']) ? $_POST['lnsup_oriencuello'] : 1; ?>
                                                    </span>
                                                    <label for="lnsup_oriencuello">Orientación Cuello</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="lnsup_oriencuello" 
                                                           name="lnsup_oriencuello" 
                                                           value="<?= isset($_POST['lnsup_oriencuello']) ? $_POST['lnsup_oriencuello'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['lnsup_cruz']) ? $_POST['lnsup_cruz'] : 1; ?>
                                                    </span>
                                                    <label for="lnsup_cruz">Cruz</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="lnsup_cruz" 
                                                           name="lnsup_cruz" 
                                                           value="<?= isset($_POST['lnsup_cruz']) ? $_POST['lnsup_cruz'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['lnsup_pecho']) ? $_POST['lnsup_pecho'] : 1; ?>
                                                    </span>
                                                    <label for="lnsup_pecho">Pecho</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="lnsup_pecho" 
                                                           name="lnsup_pecho" 
                                                           value="<?= isset($_POST['lnsup_pecho']) ? $_POST['lnsup_pecho'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL LINEA SUPERIOR -->

                    <!-- INICIO PANEL ESPALDA -->
                    <div class="vc_tta-panel" id="espalda" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#espalda" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">ESPALDA</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['espalda_tamano']) ? $_POST['espalda_tamano'] : 1; ?>
                                                    </span>
                                                    <label for="espalda_tamano">Tamaño</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="espalda_tamano" 
                                                           name="espalda_tamano" 
                                                           value="<?= isset($_POST['espalda_tamano']) ? $_POST['espalda_tamano'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['espalda_orientacion']) ? $_POST['espalda_orientacion'] : 1; ?>
                                                    </span>
                                                    <label for="espalda_orientacion">Orientación</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="espalda_orientacion" 
                                                           name="espalda_orientacion" 
                                                           value="<?= isset($_POST['espalda_orientacion']) ? $_POST['espalda_orientacion'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL ESPALDA -->

                    <!-- INICIO PANEL DORSO -->
                    <div class="vc_tta-panel" id="dorso" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#dorso" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">DORSO</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['dorso_tamano']) ? $_POST['dorso_tamano'] : 1; ?>
                                                    </span>
                                                    <label for="dorso_tamano">Tamaño</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="dorso_tamano" 
                                                           name="dorso_tamano" 
                                                           value="<?= isset($_POST['dorso_tamano']) ? $_POST['dorso_tamano'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['dorso_linea']) ? $_POST['dorso_linea'] : 1; ?>
                                                    </span>
                                                    <label for="dorso_linea">Línea</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="dorso_linea" 
                                                           name="dorso_linea" 
                                                           value="<?= isset($_POST['dorso_linea']) ? $_POST['dorso_linea'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL DORSO -->

                    <!-- INICIO PANEL GRUPA -->
                    <div class="vc_tta-panel" id="grupa" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#grupa" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">GRUPA</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['grupa_tamano']) ? $_POST['grupa_tamano'] : 1; ?>
                                                    </span>
                                                    <label for="grupa_tamano">Tamaño</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="grupa_tamano" 
                                                           name="grupa_tamano" 
                                                           value="<?= isset($_POST['grupa_tamano']) ? $_POST['grupa_tamano'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['grupa_orientacion']) ? $_POST['grupa_orientacion'] : 1; ?>
                                                    </span>
                                                    <label for="grupa_orientacion">Orientación</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="grupa_orientacion" 
                                                           name="grupa_orientacion" 
                                                           value="<?= isset($_POST['grupa_orientacion']) ? $_POST['grupa_orientacion'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['grupa_amplitud']) ? $_POST['grupa_amplitud'] : 1; ?>
                                                    </span>
                                                    <label for="grupa_amplitud">Amplitud</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="grupa_amplitud" 
                                                           name="grupa_amplitud" 
                                                           value="<?= isset($_POST['grupa_amplitud']) ? $_POST['grupa_amplitud'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL GRUPA -->

                    <!-- INICIO PANEL APLOMOS -->
                    <div class="vc_tta-panel" id="aplomos" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#aplomos" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">APLOMOS</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['aplomos_anteriores']) ? $_POST['aplomos_anteriores'] : 1; ?>
                                                    </span>
                                                    <label for="aplomos_anteriores">Anteriores</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="aplomos_anteriores" 
                                                           name="aplomos_anteriores" 
                                                           value="<?= isset($_POST['aplomos_anteriores']) ? $_POST['aplomos_anteriores'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['aplomos_posteriores']) ? $_POST['aplomos_posteriores'] : 1; ?>
                                                    </span>
                                                    <label for="aplomos_posteriores">Posteriores</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="aplomos_posteriores" 
                                                           name="aplomos_posteriores" 
                                                           value="<?= isset($_POST['aplomos_posteriores']) ? $_POST['aplomos_posteriores'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>                                            
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL APLOMOS -->

                    <!-- INICIO PANEL ALZADA -->
                    <div class="vc_tta-panel" id="alzada" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#alzada" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">ALZADA</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="alzada">Alzada</label>
                                                    <input type="text"
                                                           class="form-control" 
                                                           id="alzada" 
                                                           name="alzada" 
                                                           placeholder="1.70"
                                                           value="<?= isset($_POST['alzada']) ? $_POST['alzada'] : ''; ?>">
                                                </div>                                    
                                            </div>                                                                                       
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL ALZADA -->

                    <!-- INICIO PANEL MORFOMETRIA -->
                    <div class="vc_tta-panel" id="morfometria" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#morfometria" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">MORFOMETRIA</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['morfometria_velocidad']) ? $_POST['morfometria_velocidad'] : 1; ?>
                                                    </span>
                                                    <label for="morfometria_velocidad">Velocidad</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_velocidad" 
                                                           name="morfometria_velocidad" 
                                                           value="<?= isset($_POST['morfometria_velocidad']) ? $_POST['morfometria_velocidad'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['morfometria_cana_anterior']) ? $_POST['morfometria_cana_anterior'] : 1; ?>
                                                    </span>
                                                    <label for="morfometria_cana_anterior">Caña anterior</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cana_anterior" 
                                                           name="morfometria_cana_anterior" 
                                                           value="<?= isset($_POST['morfometria_cana_anterior']) ? $_POST['morfometria_cana_anterior'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['morfometria_cuartilla_anterior']) ? $_POST['morfometria_cuartilla_anterior'] : 1; ?>
                                                    </span>
                                                    <label for="morfometria_cuartilla_anterior">Cuartilla anterior</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cuartilla_anterior" 
                                                           name="morfometria_cuartilla_anterior" 
                                                           value="<?= isset($_POST['morfometria_cuartilla_anterior']) ? $_POST['morfometria_cuartilla_anterior'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['morfometria_femur']) ? $_POST['morfometria_femur'] : 1; ?>
                                                    </span>
                                                    <label for="morfometria_femur">Femur</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_femur" 
                                                           name="morfometria_femur" 
                                                           value="<?= isset($_POST['morfometria_femur']) ? $_POST['morfometria_femur'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['morfometria_cana_posterior']) ? $_POST['morfometria_cana_posterior'] : 1; ?>
                                                    </span>
                                                    <label for="morfometria_cana_posterior">Caña posterior</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cana_posterior" 
                                                           name="morfometria_cana_posterior" 
                                                           value="<?= isset($_POST['morfometria_cana_posterior']) ? $_POST['morfometria_cana_posterior'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['morfometria_cuartilla_posterior']) ? $_POST['morfometria_cuartilla_posterior'] : 1; ?>
                                                    </span>
                                                    <label for="morfometria_cuartilla_posterior">Cuartilla posterior</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cuartilla_posterior" 
                                                           name="morfometria_cuartilla_posterior" 
                                                           value="<?= isset($_POST['morfometria_cuartilla_posterior']) ? $_POST['morfometria_cuartilla_posterior'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>                                            
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL MORFOMETRIA -->

                    <!-- INICIO PANEL MOVIMIENTO -->
                    <div class="vc_tta-panel" id="movimiento" data-vc-content=".vc_tta-panel-body">    
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#movimiento" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">MOVIMIENTO</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->
                                        <div class="col-md-5">                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['mvto_velocidad']) ? $_POST['mvto_velocidad'] : 1; ?>
                                                    </span>
                                                    <label for="mvto_velocidad">Velocidad</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="mvto_velocidad" 
                                                           name="mvto_velocidad" 
                                                           value="<?= isset($_POST['mvto_velocidad']) ? $_POST['mvto_velocidad'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['mvto_elevancion_anteriores']) ? $_POST['mvto_elevancion_anteriores'] : 1; ?>
                                                    </span>
                                                    <label for="mvto_elevancion_anteriores">Elevanción anteriores</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="mvto_elevancion_anteriores" 
                                                           name="mvto_elevancion_anteriores" 
                                                           value="<?= isset($_POST['mvto_elevancion_anteriores']) ? $_POST['mvto_elevancion_anteriores'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['mvto_elevancion_poteriores']) ? $_POST['mvto_elevancion_poteriores'] : 1; ?>
                                                    </span>
                                                    <label for="mvto_elevancion_poteriores">Elevanción posteriores</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="mvto_elevancion_poteriores" 
                                                           name="mvto_elevancion_poteriores" 
                                                           value="<?= isset($_POST['mvto_elevancion_poteriores']) ? $_POST['mvto_elevancion_poteriores'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['mvto_pisada']) ? $_POST['mvto_pisada'] : 1; ?>
                                                    </span>
                                                    <label for="mvto_pisada">Pisada</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="mvto_pisada" 
                                                           name="mvto_pisada" 
                                                           value="<?= isset($_POST['mvto_pisada']) ? $_POST['mvto_pisada'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['mvto_pulimento']) ? $_POST['mvto_pulimento'] : 1; ?>
                                                    </span>
                                                    <label for="mvto_pulimento">Pulimento</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="mvto_pulimento" 
                                                           name="mvto_pulimento" 
                                                           value="<?= isset($_POST['mvto_pulimento']) ? $_POST['mvto_pulimento'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['mvto_elasticidad']) ? $_POST['mvto_elasticidad'] : 1; ?>
                                                    </span>
                                                    <label for="mvto_elasticidad">Elasticidad</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="mvto_elasticidad" 
                                                           name="mvto_elasticidad" 
                                                           value="<?= isset($_POST['mvto_elasticidad']) ? $_POST['mvto_elasticidad'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">                                                
                                                    <span class="valor">
                                                        <?= isset($_POST['mvto_compensacion']) ? $_POST['mvto_compensacion'] : 1; ?>
                                                    </span>
                                                    <label for="mvto_compensacion">Compensación</label>
                                                    <input type="range" min="1" max="3"
                                                           class="custom-range" 
                                                           id="mvto_compensacion" 
                                                           name="mvto_compensacion" 
                                                           value="<?= isset($_POST['mvto_compensacion']) ? $_POST['mvto_compensacion'] : 1; ?>">
                                                    <span class="regla">0</span>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-7 well">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
                                            </div>
                                            <a class="moreinfo" href="javascript:void(0)">
                                                Más información 
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            <div class="description" style="display: none">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- FIN INFO -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL MOVIMIENTO -->

                    <!-- INICIO PANEL MEJORAMIENTO -->
                    <div class="vc_tta-panel" id="mejoramiento" data-vc-content=".vc_tta-panel-body">
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#mejoramiento" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">MEJORAMIENTO</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper chksmejoras">
                                    <p>*Seleccione 6 características.</p>
                                    <div class="row margin-space well">
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_geometria" name="chk_geometria" value="chk_geometria">
                                                <label class="form-check-label" for="chk_geometria">Geometría</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_balance" name="chk_balance" value="chk_balance">
                                                <label class="form-check-label" for="chk_balance">Balance</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_espalda" name="chk_espalda" value="chk_espalda">
                                                <label class="form-check-label" for="chk_espalda">Espalda</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_dorso" name="chk_dorso" value="chk_dorso">
                                                <label class="form-check-label" for="chk_dorso">Dorso</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_grupa" name="chk_grupa" value="chk_grupa">
                                                <label class="form-check-label" for="chk_grupa">Grupa</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_anteriores" name="chk_aplomos_anteriores" value="chk_aplomos_anteriores">
                                                <label class="form-check-label" for="chk_aplomos_anteriores">Aplomos anteriores</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_posteriores" name="chk_aplomos_posteriores" value="chk_aplomos_posteriores">
                                                <label class="form-check-label" for="chk_aplomos_posteriores">Aplomos posteriores</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_alzada" name="chk_alzada" value="chk_alzada">
                                                <label class="form-check-label" for="chk_alzada">Alzada</label>
                                            </div>
                                        </div>

                                    </div>
                                    <h3 class="h3subtitu margin-space">Línea Superior</h3>
                                    <div class="row well">
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cabeza" name="chk_cabeza" value="chk_cabeza">
                                                <label class="form-check-label" for="chk_cabeza">Cabeza</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_longitud_cuello" name="chk_longitud_cuello" value="chk_longitud_cuello">
                                                <label class="form-check-label" for="chk_longitud_cuello">Longitud cuello</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_orientacion_cuello" name="chk_orientacion_cuello" value="chk_orientacion_cuello">
                                                <label class="form-check-label" for="chk_orientacion_cuello">Orientacion cuello</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cruza" name="chk_cruza" value="chk_cruza">
                                                <label class="form-check-label" for="chk_cruza">Cruza</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_pecho" name="chk_pecho" value="chk_pecho">
                                                <label class="form-check-label" for="chk_pecho">Pecho</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <h3 class="h3subtitu margin-space">Morfometría</h3>
                                    <div class="row well">
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_radio" name="chk_radio" value="chk_radio">
                                                <label class="form-check-label" for="chk_radio">Radio</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cana_anterior" name="chk_cana_anterior" value="chk_cana_anterior">
                                                <label class="form-check-label" for="chk_cana_anterior">Caña anterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cuartilla_anterior" name="chk_cuartilla_anterior" value="chk_cuartilla_anterior">
                                                <label class="form-check-label" for="chk_cuartilla_anterior">Cuartilla anterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_femur" name="chk_femur" value="chk_femur">
                                                <label class="form-check-label" for="chk_femur">Fémur</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cana_posterior" name="chk_cana_posterior" value="chk_cana_posterior">
                                                <label class="form-check-label" for="chk_cana_posterior">Caña posterior</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cuartilla_posterior" name="chk_cuartilla_posterior" value="chk_cuartilla_posterior">
                                                <label class="form-check-label" for="chk_cuartilla_posterior">Cuartilla posterior</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <h3 class="h3subtitu margin-space">Movimiento</h3>
                                    <div class="row well">
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_velocidad" name="chk_velocidad" value="chk_velocidad">
                                                <label class="form-check-label" for="chk_velocidad">Velocidad</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_elevacion_anterior" name="chk_elevacion_anterior" value="chk_elevacion_anterior">
                                                <label class="form-check-label" for="chk_elevacion_anterior">Elevación anterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_elevacion_posterior" name="chk_elevacion_posterior" value="chk_elevacion_posterior">
                                                <label class="form-check-label" for="chk_elevacion_posterior">Elevacion posterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_pisada" name="chk_pisada" value="chk_pisada">
                                                <label class="form-check-label" for="chk_pisada">Pisada</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_pulimento" name="chk_pulimento" value="chk_pulimento">
                                                <label class="form-check-label" for="chk_pulimento">Pulimento</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_elasticidad" name="chk_elasticidad" value="chk_elasticidad">
                                                <label class="form-check-label" for="chk_elasticidad">Elasticidad</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_compensacion" name="chk_compensacion" value="chk_compensacion">
                                                <label class="form-check-label" for="chk_compensacion">Compensación</label>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN  PANEL MEJORAMIENTO -->

                </div>
            </div>
        </div>
    </div>
    <!-- FIN FORM SOFTWARE -->


    <div class="form-row"> 
        <div class="form-group col-md-12 text-center">
            <input type="submit" 
                   value="<?= $settings["search_field_text"]; ?>" 
                   class="up-button up_btn-s" 
                   style="color:#ffffff;background:#000000;border-color:#ffffff;" />
        </div>
    </div>
</form>
<!-- FIN FORM SOFTWARE -->

<?php if (isset($products) && $products->have_posts()) : ?>
    <hr />
    <h3 class="h3subtitu margin-space">Resultados encontrados</h3>
    <?php woocommerce_product_loop_start(); ?>

    <?php while ($products->have_posts()) : $products->the_post(); ?>

        <?php woocommerce_get_template_part('content', 'product'); ?>

    <?php endwhile; // end of the loop.  ?>

    <?php woocommerce_product_loop_end(); ?>

    <?php
endif;
wp_reset_postdata();
echo '<div class="woocommerce">' . ob_get_clean() . '</div>';
?>

<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/vc_accordion/vc-accordion.min.js?ver=5.1"); ?>'></script>
<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/vc_tabs/vc-tabs.min.js?ver=5.1"); ?>'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

    jQuery('input[type="range"]').on("change mousemove", function () {
        jQuery(this).prev().prev().html(jQuery(this).val());
    });

    jQuery('.divVariable').on("hover", function () {
        var img = jQuery(this).data('image');
        jQuery(this)
                .parent()
                .parent()
                .siblings()
                .children()
                .children()
                .attr("src", "<?= plugins_url("buscador-equinetics/includes/views/assets/images/"); ?>" + img);
    });

    jQuery('.moreinfo').click(function (e) {
        e.preventDefault();
        jQuery(this).siblings('.description').toggle('slow');
    });
</script>