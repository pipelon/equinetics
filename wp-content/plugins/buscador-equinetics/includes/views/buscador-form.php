<!-- INICIO CSS TABS -->
<link rel='stylesheet' 
      id='vc_tta_style-css'  
      href='<?= plugins_url("js_composer/assets/css/js_composer_tta.min.css?ver=5.1"); ?>' 
      type='text/css' media='all' />

<style type="text/css">
    .wpb-js-composer .vc_tta.vc_general .vc_tta-panel.vc_active.vc_was_active .vc_tta-panel-body{
        display: none !important;
    }
</style>
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
            <?php if (is_user_logged_in()) : ?>   
                <div class="form-row margin-space">
                    <div class="form-group col-md-12"> 
                        <label for="nombre">Seleccione una de las yeguas almacenadas</label>
                        <select id="selectedYegua" name="selectedYegua" class="form-control">
                            <option value="">Seleccione...</option>
                            <?php foreach ($infoYeguas as $key => $value) : ?>
                                <option value="<?= trim($key); ?> "
                                        <?= (isset($_POST["selectedYegua"]) && trim($_POST["selectedYegua"]) == $key) ? 'selected' : ''; ?>>
                                            <?= $value["nombre"]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-row margin-space">
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="form[nombre]" id="nombre"
                           value="<?= isset($selectedYegua["nombre"]) ? $selectedYegua["nombre"] : '' ?>">
                </div>
                <!--                <div class="form-group col-md-4">
                                    <label for="andar">Andar</label>
                                    <input type="text" class="form-control" name="form[andar]" id="andar"
                                           value="<?php //= isset($selectedYegua["andar"]) ? $selectedYegua["andar"] : ''       ?>">
                                </div>-->                
                <div class="form-group col-md-4">
                    <label for="registro">Registro</label>
                    <input type="text" class="form-control" name="form[registro]" id="registro"
                           value="<?= isset($selectedYegua["registro"]) ? $selectedYegua["registro"] : '' ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="andar">Andar</label>
                    <select id="andar" name="andar" class="form-control" required>
                        <option value="">Seleccione un andar...</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?= trim($cat->cat_ID); ?> "
                                    <?= (isset($_POST["andar"]) && trim($_POST["andar"]) == $cat->cat_ID) ? 'selected' : ''; ?>>
                                        <?= $cat->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="padre">Padre</label>
                    <input type="text" class="form-control" name="form[padre]" id="padre"
                           value="<?= isset($selectedYegua["padre"]) ? $selectedYegua["padre"] : '' ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="madre">Madre</label>
                    <input type="text" class="form-control" name="form[madre]" id="madre"
                           value="<?= isset($selectedYegua["madre"]) ? $selectedYegua["madre"] : '' ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="abuelo_materno">Abuelo materno</label>
                    <input type="text" class="form-control" name="form[abuelo_materno]" id="abuelo_materno"
                           value="<?= isset($selectedYegua["abuelo_materno"]) ? $selectedYegua["abuelo_materno"] : '' ?>">
                </div>
            </div>             
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
                        <a href="#comousarsara" data-vc-tabs="" data-vc-container=".vc_tta">
                            <span class="vc_tta-title-text">¿Cómo usar S. A. R. A.?</span>
                        </a>
                    </li>
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

                    <!-- INICIO PANEL COMO USAR SARA -->
                    <div class="vc_tta-panel vc_active" id="comousarsara" data-vc-content=".vc_tta-panel-body">   
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title">
                                <a href="#comousarsara" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                    <span class="vc_tta-title-text">¿CÓMO USAR SARA?</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">                                       

                                        <!-- INICIO INFO -->
                                        <div class="col-md-12">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>"
                                                     style="width: 20%"/>
                                            </div>                                            
                                            <div class="description" >
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;">Descripción</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Pellentesque varius lectus eget nisi consectetur iaculis. 
                                                    Pellentesque at nunc sed felis congue mollis. 
                                                    Aliquam lobortis venenatis leo, at mattis sem.
                                                </p>
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
                    <!-- FIN PANEL COMO USAR SARA -->

                    <!-- INICIO PANEL GEOMETRIA -->
                    <div class="vc_tta-panel" id="geometria" data-vc-content=".vc_tta-panel-body">   
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
                                        <div class="col-md-6">  
                                            <h4 class="tituVar">Geometría</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                                                                    
                                                    <label for="geometria_figura">Figura</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="geometria_figura" 
                                                           name="var[geometria_figura]" 
                                                           value="<?=
                                                           isset($selectedYegua['var']['geometria_figura']) ?
                                                                   $selectedYegua['var']['geometria_figura'] : 0;
                                                           ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Cuadrado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['geometria_figura']) ?
                                                                    $selectedYegua['var']['geometria_figura'] : "-";
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Rectangular
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="geometria_orientacion">Orientación</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="geometria_orientacion" 
                                                           name="var[geometria_orientacion]" 
                                                           value="<?= isset($selectedYegua['var']['geometria_orientacion']) ? $selectedYegua['var']['geometria_orientacion'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Descendente
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['geometria_orientacion']) ?
                                                                    $selectedYegua['var']['geometria_orientacion'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Ascendente
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">   
                                            <h4 class="tituVar">Balance</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="balance_horizontal">Horizontal</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="balance_horizontal" 
                                                           name="var[balance_horizontal]" 
                                                           value="<?= isset($selectedYegua['var']['balance_horizontal']) ? $selectedYegua['var']['balance_horizontal'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Desbalanceado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['balance_horizontal']) ?
                                                                    $selectedYegua['var']['balance_horizontal'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Cercano al piso
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="balance_vertical">Vertical</label>
                                                    <input type="range" min="0" max="5"
                                                           class="custom-range" 
                                                           id="balance_vertical" 
                                                           name="var[balance_vertical]" 
                                                           value="<?= isset($selectedYegua['var']['balance_vertical']) ? $selectedYegua['var']['balance_vertical'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Angosto porción 1
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['balance_vertical']) ?
                                                                    $selectedYegua['var']['balance_vertical'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Angosto zona 3
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6"> 
                                            <h4 class="tituVar">Línea superior</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg"> 
                                                    <label for="lineaSuperior_cabeza">Cabeza</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="lineaSuperior_cabeza" 
                                                           name="var[lineaSuperior_cabeza]" 
                                                           value="<?= isset($selectedYegua['var']['lineaSuperior_cabeza']) ? $selectedYegua['var']['lineaSuperior_cabeza'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['lineaSuperior_cabeza']) ?
                                                                    $selectedYegua['var']['lineaSuperior_cabeza'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="lineaSuperior_longitud_cuello">Longitud cuello</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="lineaSuperior_longitud_cuello" 
                                                           name="var[lineaSuperior_longitud_cuello]" 
                                                           value="<?= isset($selectedYegua['var']['lineaSuperior_longitud_cuello']) ? $selectedYegua['var']['lineaSuperior_longitud_cuello'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['lineaSuperior_longitud_cuello']) ?
                                                                    $selectedYegua['var']['lineaSuperior_longitud_cuello'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Largo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="lineaSuperior_orientacion_cuello">Orientación Cuello</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="lineaSuperior_orientacion_cuello" 
                                                           name="var[lineaSuperior_orientacion_cuello]" 
                                                           value="<?= isset($selectedYegua['var']['lineaSuperior_orientacion_cuello']) ? $selectedYegua['var']['lineaSuperior_orientacion_cuello'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['lineaSuperior_orientacion_cuello']) ?
                                                                    $selectedYegua['var']['lineaSuperior_orientacion_cuello'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="lineaSuperior_cruz">Cruz</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="lineaSuperior_cruz" 
                                                           name="var[lineaSuperior_cruz]" 
                                                           value="<?= isset($selectedYegua['var']['lineaSuperior_cruz']) ? $selectedYegua['var']['lineaSuperior_cruz'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['lineaSuperior_cruz']) ?
                                                                    $selectedYegua['var']['lineaSuperior_cruz'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Larga
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="lineaSuperior_pecho">Pecho</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="lineaSuperior_pecho" 
                                                           name="var[lineaSuperior_pecho]" 
                                                           value="<?= isset($selectedYegua['var']['lineaSuperior_pecho']) ? $selectedYegua['var']['lineaSuperior_pecho'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Angosto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['lineaSuperior_pecho']) ?
                                                                    $selectedYegua['var']['lineaSuperior_pecho'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Amplio
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">    
                                            <h4 class="tituVar">Espalda</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="espalda_tamano">Tamaño</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="espalda_tamano" 
                                                           name="var[espalda_tamano]" 
                                                           value="<?= isset($selectedYegua['var']['espalda_tamano']) ? $selectedYegua['var']['espalda_tamano'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['espalda_tamano']) ?
                                                                    $selectedYegua['var']['espalda_tamano'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="espalda_orientacion">Orientación</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="espalda_orientacion" 
                                                           name="var[espalda_orientacion]" 
                                                           value="<?= isset($selectedYegua['var']['espalda_orientacion']) ? $selectedYegua['var']['espalda_orientacion'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['espalda_orientacion']) ?
                                                                    $selectedYegua['var']['espalda_orientacion'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">   
                                            <h4 class="tituVar">Dorso</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                               

                                                    <label for="dorso_tamano">Tamaño</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="dorso_tamano" 
                                                           name="var[dorso_tamano]" 
                                                           value="<?= isset($selectedYegua['var']['dorso_tamano']) ? $selectedYegua['var']['dorso_tamano'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['dorso_tamano']) ?
                                                                    $selectedYegua['var']['dorso_tamano'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Largos
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="dorso_linea">Línea</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="dorso_linea" 
                                                           name="var[dorso_linea]" 
                                                           value="<?= isset($selectedYegua['var']['dorso_linea']) ? $selectedYegua['var']['dorso_linea'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?= isset($selectedYegua['var']['dorso_linea']) ? $selectedYegua['var']['dorso_linea'] : "-" ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">  
                                            <h4 class="tituVar">Grupa</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="grupa_tamano">Tamaño</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="grupa_tamano" 
                                                           name="var[grupa_tamano]" 
                                                           value="<?= isset($selectedYegua['var']['grupa_tamano']) ? $selectedYegua['var']['grupa_tamano'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['grupa_tamano']) ?
                                                                    $selectedYegua['var']['grupa_tamano'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="grupa_orientacion">Orientación</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="grupa_orientacion" 
                                                           name="var[grupa_orientacion]" 
                                                           value="<?= isset($selectedYegua['var']['grupa_orientacion']) ? $selectedYegua['var']['grupa_orientacion'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['grupa_orientacion']) ?
                                                                    $selectedYegua['var']['grupa_orientacion'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="grupa_amplitud">Amplitud</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="grupa_amplitud" 
                                                           name="var[grupa_amplitud]" 
                                                           value="<?= isset($selectedYegua['var']['grupa_amplitud']) ? $selectedYegua['var']['grupa_amplitud'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['grupa_amplitud']) ?
                                                                    $selectedYegua['var']['grupa_amplitud'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6"> 
                                            <h4 class="tituVar">Aplomos</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="aplomos_anteriores_frente">Anteriores (Frente)</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="aplomos_anteriores_frente" 
                                                           name="var[aplomos_anteriores_frente]" 
                                                           value="<?= isset($selectedYegua['var']['aplomos_anteriores_frente']) ? $selectedYegua['var']['aplomos_anteriores_frente'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Izquierdo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['aplomos_anteriores_frente']) ?
                                                                    $selectedYegua['var']['aplomos_anteriores_frente'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Estevado
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="aplomos_anteriores_lateralmente">Anteriores (Lateralmente)</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="aplomos_anteriores_lateralmente" 
                                                           name="var[aplomos_anteriores_lateralmente]" 
                                                           value="<?= isset($selectedYegua['var']['aplomos_anteriores_lateralmente']) ? $selectedYegua['var']['aplomos_anteriores_lateralmente'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Plantado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['aplomos_anteriores_lateralmente']) ?
                                                                    $selectedYegua['var']['aplomos_anteriores_lateralmente'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Remetido
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="aplomos_posteriores_atras">Posteriores (Atrás)</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="aplomos_posteriores_atras" 
                                                           name="var[aplomos_posteriores_atras]" 
                                                           value="<?= isset($selectedYegua['var']['aplomos_posteriores_atras']) ? $selectedYegua['var']['aplomos_posteriores_atras'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Cerrados
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['aplomos_posteriores_atras']) ?
                                                                    $selectedYegua['var']['aplomos_posteriores_atras'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Abiertos
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="aplomos_posteriores_lateralmente">Posteriores (Lateralmente)</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="aplomos_posteriores_lateralmente" 
                                                           name="var[aplomos_posteriores_lateralmente]" 
                                                           value="<?= isset($selectedYegua['var']['aplomos_posteriores_lateralmente']) ? $selectedYegua['var']['aplomos_posteriores_lateralmente'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Plantado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['aplomos_posteriores_lateralmente']) ?
                                                                    $selectedYegua['var']['aplomos_posteriores_lateralmente'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Remetido
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">          
                                            <h4 class="tituVar">Alzada</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="alzada">Estatura</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="alzada_estatura" 
                                                           name="var[alzada_estatura]" 
                                                           value="<?= isset($selectedYegua['var']['alzada_estatura']) ? $selectedYegua['var']['alzada_estatura'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Bajo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['alzada_estatura']) ?
                                                                    $selectedYegua['var']['alzada_estatura'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Alto
                                                        </span>
                                                    </div>                                                    
                                                </div>                                    
                                            </div>                                                                                       
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">        
                                            <h4 class="tituVar">Morfometría</h4>                                            
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="morfometria_cana_anterior">Caña anterior</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cana_anterior" 
                                                           name="var[morfometria_cana_anterior]" 
                                                           value="<?= isset($selectedYegua['var']['morfometria_cana_anterior']) ? $selectedYegua['var']['morfometria_cana_anterior'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['morfometria_cana_anterior']) ?
                                                                    $selectedYegua['var']['morfometria_cana_anterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Larga
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                

                                                    <label for="morfometria_cuartilla_anterior">Cuartilla anterior</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cuartilla_anterior" 
                                                           name="var[morfometria_cuartilla_anterior]" 
                                                           value="<?= isset($selectedYegua['var']['morfometria_cuartilla_anterior']) ? $selectedYegua['var']['morfometria_cuartilla_anterior'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['morfometria_cuartilla_anterior']) ?
                                                                    $selectedYegua['var']['morfometria_cuartilla_anterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Larga
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="morfometria_femur">Femur</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_femur" 
                                                           name="var[morfometria_femur]" 
                                                           value="<?= isset($selectedYegua['var']['morfometria_femur']) ? $selectedYegua['var']['morfometria_femur'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['morfometria_femur']) ?
                                                                    $selectedYegua['var']['morfometria_femur'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Largo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="morfometria_cana_posterior">Caña posterior</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cana_posterior" 
                                                           name="var[morfometria_cana_posterior]" 
                                                           value="<?= isset($selectedYegua['var']['morfometria_cana_posterior']) ? $selectedYegua['var']['morfometria_cana_posterior'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['morfometria_cana_posterior']) ?
                                                                    $selectedYegua['var']['morfometria_cana_posterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Larga
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="morfometria_cuartilla_posterior">Cuartilla posterior</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="morfometria_cuartilla_posterior" 
                                                           name="var[morfometria_cuartilla_posterior]" 
                                                           value="<?= isset($selectedYegua['var']['morfometria_cuartilla_posterior']) ? $selectedYegua['var']['morfometria_cuartilla_posterior'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['morfometria_cuartilla_posterior']) ?
                                                                    $selectedYegua['var']['morfometria_cuartilla_posterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Larga
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>                                            
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">      
                                            <h4 class="tituVar">Movimiento</h4>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_velocidad">Velocidad</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="movimiento_velocidad" 
                                                           name="var[movimiento_velocidad]" 
                                                           value="<?= isset($selectedYegua['var']['movimiento_velocidad']) ? $selectedYegua['var']['movimiento_velocidad'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Lento
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['movimiento_velocidad']) ?
                                                                    $selectedYegua['var']['movimiento_velocidad'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Elevado
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="movimiento_elevacion_anterior">Elevación anteriores</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="movimiento_elevacion_anterior" 
                                                           name="var[movimiento_elevacion_anterior]" 
                                                           value="<?= isset($selectedYegua['var']['movimiento_elevacion_anterior']) ? $selectedYegua['var']['movimiento_elevacion_anterior'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['movimiento_elevacion_anterior']) ?
                                                                    $selectedYegua['var']['movimiento_elevacion_anterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Alta
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_elevacion_posterior">Elevación posteriores</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="movimiento_elevacion_posterior" 
                                                           name="var[movimiento_elevacion_posterior]" 
                                                           value="<?= isset($selectedYegua['var']['movimiento_elevacion_posterior']) ? $selectedYegua['var']['movimiento_elevacion_posterior'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['movimiento_elevacion_posterior']) ?
                                                                    $selectedYegua['var']['movimiento_elevacion_posterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Alta
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="movimiento_pisada">Pisada</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="movimiento_pisada" 
                                                           name="var[movimiento_pisada]" 
                                                           value="<?= isset($selectedYegua['var']['movimiento_pisada']) ? $selectedYegua['var']['movimiento_pisada'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['movimiento_pisada']) ?
                                                                    $selectedYegua['var']['movimiento_pisada'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Potente
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_pulimento">Pulimento</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="movimiento_pulimento" 
                                                           name="var[movimiento_pulimento]" 
                                                           value="<?= isset($selectedYegua['var']['movimiento_pulimento']) ? $selectedYegua['var']['movimiento_pulimento'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['movimiento_pulimento']) ?
                                                                    $selectedYegua['var']['movimiento_pulimento'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="movimiento_elasticidad">Elasticidad</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="movimiento_elasticidad" 
                                                           name="var[movimiento_elasticidad]" 
                                                           value="<?= isset($selectedYegua['var']['movimiento_elasticidad']) ? $selectedYegua['var']['movimiento_elasticidad'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Poco elástico
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['movimiento_elasticidad']) ?
                                                                    $selectedYegua['var']['movimiento_elasticidad'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy elástico
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <div class="form-row">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_compensacion">Compensación</label>
                                                    <input type="range" min="0" max="3"
                                                           class="custom-range" 
                                                           id="movimiento_compensacion" 
                                                           name="var[movimiento_compensacion]" 
                                                           value="<?= isset($selectedYegua['var']['movimiento_compensacion']) ? $selectedYegua['var']['movimiento_compensacion'] : 0; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Descompensado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($selectedYegua['var']['movimiento_compensacion']) ?
                                                                    $selectedYegua['var']['movimiento_compensacion'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Compensado
                                                        </span>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
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
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="chk_geometria" 
                                                       name="chk[chk_geometria]" 
                                                       value="chk_geometria"
                                                       <?= isset($selectedYegua['chk']['chk_balance']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_geometria">Geometría</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_balance" name="chk[chk_balance]" value="chk_balance" <?= isset($selectedYegua['chk']['chk_balance']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_balance">Balance</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_espalda" name="chk[chk_espalda]" value="chk_espalda" <?= isset($selectedYegua['chk']['chk_espalda']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_espalda">Espalda</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_dorso" name="chk[chk_dorso]" value="chk_dorso" <?= isset($selectedYegua['chk']['chk_dorso']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_dorso">Dorso</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_grupa" name="chk[chk_grupa]" value="chk_grupa" <?= isset($selectedYegua['chk']['chk_grupa']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_grupa">Grupa</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_anteriores" name="chk[chk_aplomos_anteriores]" value="chk_aplomos_anteriores" <?= isset($selectedYegua['chk']['chk_aplomos_anteriores']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_aplomos_anteriores">Aplomos anteriores</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_posteriores" name="chk[chk_aplomos_posteriores]" value="chk_aplomos_posteriores" <?= isset($selectedYegua['chk']['chk_aplomos_posteriores']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_aplomos_posteriores">Aplomos posteriores</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_alzada" name="chk[chk_alzada]" value="chk_alzada" <?= isset($selectedYegua['chk']['chk_alzada']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_alzada">Alzada</label>
                                            </div>
                                        </div>

                                    </div>
                                    <h3 class="h3subtitu margin-space">Línea Superior</h3>
                                    <div class="row well">
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cabeza" name="chk[chk_cabeza]" value="chk_cabeza" <?= isset($selectedYegua['chk']['chk_cabeza']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_cabeza">Cabeza</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_longitud_cuello" name="chk[chk_longitud_cuello]" value="chk_longitud_cuello" <?= isset($selectedYegua['chk']['chk_longitud_cuello']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_longitud_cuello">Longitud cuello</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_orientacion_cuello" name="chk[chk_orientacion_cuello]" value="chk_orientacion_cuello" <?= isset($selectedYegua['chk']['chk_orientacion_cuello']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_orientacion_cuello">Orientacion cuello</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cruza" name="chk[chk_cruza]" value="chk_cruza" <?= isset($selectedYegua['chk']['chk_cruza']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_cruza">Cruza</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_pecho" name="chk[chk_pecho]" value="chk_pecho" <?= isset($selectedYegua['chk']['chk_pecho']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_pecho">Pecho</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <h3 class="h3subtitu margin-space">Morfometría</h3>
                                    <div class="row well">
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_radio" name="chk[chk_radio]" value="chk_radio" <?= isset($selectedYegua['chk']['chk_radio']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_radio">Radio</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cana_anterior" name="chk[chk_cana_anterior]" value="chk_cana_anterior" <?= isset($selectedYegua['chk']['chk_cana_anterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_cana_anterior">Caña anterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cuartilla_anterior" name="chk[chk_cuartilla_anterior]" value="chk_cuartilla_anterior" <?= isset($selectedYegua['chk']['chk_cuartilla_anterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_cuartilla_anterior">Cuartilla anterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_femur" name="chk[chk_femur]" value="chk_femur" <?= isset($selectedYegua['chk']['chk_femur']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_femur">Fémur</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cana_posterior" name="chk[chk_cana_posterior]" value="chk_cana_posterior" <?= isset($selectedYegua['chk']['chk_cana_posterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_cana_posterior">Caña posterior</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_cuartilla_posterior" name="chk[chk_cuartilla_posterior]" value="chk_cuartilla_posterior" <?= isset($selectedYegua['chk']['chk_cuartilla_posterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_cuartilla_posterior">Cuartilla posterior</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <h3 class="h3subtitu margin-space">Movimiento</h3>
                                    <div class="row well">
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_velocidad" name="chk[chk_velocidad]" value="chk_velocidad" <?= isset($selectedYegua['chk']['chk_velocidad']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_velocidad">Velocidad</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_elevacion_anterior" name="chk[chk_elevacion_anterior]" value="chk_elevacion_anterior" <?= isset($selectedYegua['chk']['chk_elevacion_anterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_elevacion_anterior">Elevación anterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_elevacion_posterior" name="chk[chk_elevacion_posterior]" value="chk_elevacion_posterior" <?= isset($selectedYegua['chk']['chk_elevacion_posterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_elevacion_posterior">Elevacion posterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_pisada" name="chk[chk_pisada]" value="chk_pisada" <?= isset($selectedYegua['chk']['chk_pisada']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_pisada">Pisada</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_pulimento" name="chk[chk_pulimento]" value="chk_pulimento" <?= isset($selectedYegua['chk']['chk_pulimento']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_pulimento">Pulimento</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_elasticidad" name="chk[chk_elasticidad]" value="chk_elasticidad" <?= isset($selectedYegua['chk']['chk_elasticidad']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_elasticidad">Elasticidad</label>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_compensacion" name="chk[chk_compensacion]" value="chk_compensacion" <?= isset($selectedYegua['chk']['chk_compensacion']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_compensacion">Compensación</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <?php if (!is_user_logged_in()) : ?>
                                                <p class="alert alert-warning" style="margin: 15px 0;">
                                                    <i class="fa fa-info-circle"></i> 
                                                    Registrate para acceder a los beneficios de nuestro software, <br />
                                                    como la posibilidad de guardar todos tus ejemplares buscados.</p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <input type="submit" 
                                                   value="<?= $settings["search_field_text"]; ?>" 
                                                   class="up-button up_btn-s btn-grey btn-buscarguardar"
                                                   style="line-height: 40px !important; margin: 0 10px; padding: 3px 50px;"/>
                                                   <?php if (is_user_logged_in()) : ?>        
                                                <input type="submit" 
                                                       name="guardar"
                                                       value="Buscar y guardar información de la Yegua" 
                                                       class="up-button btn-grey btn-buscarguardar"
                                                       style="line-height: 40px !important; margin: 0 10px; padding: 3px 50px;"/>               
                                                   <?php endif; ?>
                                            <input type="submit" 
                                                   value="Sugerencias S. A. R. A." 
                                                   class="up-button up_btn-s btn-red btn-buscarguardar"
                                                   style="line-height: 40px !important; margin: 0 10px; padding: 3px 50px;"/>
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

</form>
<!-- FIN FORM SOFTWARE -->

<?php if (isset($_POST) && isset($products) && $products->have_posts()) : ?>
    <span id="hr-search-results-eq"></span>
    <hr />
    <p class="text-center" style="margin: 50px 0 0 0;">
        Los siguientes resultados se basan en <b>(<?= $countVars; ?>)</b> criterios entre 
        los <b>58</b> criterios disponibles.
    </p>
    <h3 class="h3subtitu" style="margin-bottom: 30px; text-align: left">Resultados encontrados</h3>

    <div id="search-results-eq">
        <?php woocommerce_product_loop_start(); ?>

        <?php while ($products->have_posts()) : $products->the_post(); ?>

            <?php wc_get_template_part('content', 'product'); ?>

        <?php endwhile; // end of the loop.                                                          ?>

        <?php woocommerce_product_loop_end(); ?>
    </div>
<?php endif; ?>

<?php 
wp_reset_postdata();
echo '<div class="woocommerce">' . ob_get_clean() . '</div>';
?>

<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/vc_accordion/vc-accordion.min.js?ver=5.1"); ?>'></script>
<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/vc_tabs/vc-tabs.min.js?ver=5.1"); ?>'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

    (function ($) {
        'use strict';
        // Get viewport width
        var e = window, a = 'inner';
        if (!('innerWidth' in window)) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        var viewportWidth = e[ a + 'Width' ];
        // Remove active class for tabs on windows smaller then 768 on load
        if (viewportWidth < 768) {
            jQuery(".vc_tta-panel-heading").click(function () {
                if (jQuery(this).parent().hasClass("vc_active") && jQuery(this).parent().hasClass("vc_was_active")) {
                    jQuery(this).parent().removeClass("vc_was_active");
                } else if (jQuery(this).parent().hasClass("vc_active") && !jQuery(this).parent().hasClass("vc_was_active")) {
                    jQuery(this).parent().removeClass("vc_active").addClass("vc_was_active");
                } else if (!jQuery(this).parent().hasClass("vc_active") && jQuery(this).parent().hasClass("vc_was_active")) {
                    jQuery(this).parent().removeClass("vc_was_active");
                }
            });
        }
    })(jQuery);

    jQuery('#selectedYegua').change(function () {
        if (jQuery(this).val() != "") {
            jQuery('form.buscadr').submit();
        }
    });

    jQuery('form.buscadr').submit(function () {
        var numberOfChecked = jQuery('form.buscadr input.form-check-input:checked').length;
        
        if (numberOfChecked <= 0) {
            alert('Debe selecionar al menos una variable de mejoramiento');
            return false;
        }
        
        if (numberOfChecked > 6) {
            alert('Solo puedes seleccionar 6 variables');
            return false;
        }
        
        return true;
    });

    jQuery('input[type="range"]').on("change", function () {
        if (jQuery(this).val() == 0) {
            jQuery(this).parent().parent().removeClass("selectedVar");
            jQuery(this).parent().prev(".emptyVar").hide();
            jQuery(this).next().children(".valor").html("-");
        } else {
            jQuery(this).parent().parent().addClass("selectedVar");
            jQuery(this).parent().prev(".emptyVar").show();
            jQuery(this).next().children(".valor").html(jQuery(this).val());
        }
    });

    jQuery('.emptyVar').click(function () {
        jQuery(this).next().children('input[type="range"]').val(0);
        jQuery(this).next().children('input[type="range"]').trigger('change');
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

    jQuery('form.buscadr input.form-check-input').change(function () {
        var numberOfChecked = jQuery('form.buscadr input.form-check-input:checked').length;
        if (numberOfChecked > 6) {
            jQuery(this).prop('checked', false);
            alert('Solo puedes seleccionar 6 variables');
        }
    });
<?php if (isset($products) && $products->have_posts()) : ?>
        setTimeout(function () {
            jQuery('html, body').animate({
                scrollTop: jQuery('#hr-search-results-eq').offset().top
            }, 2000);
        }, 1000);
<?php endif; ?>

</script>