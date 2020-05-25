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
                        <label for="selectedYegua">Seleccione una de las yeguas almacenadas</label>
                        <select id="selectedYegua" name="selectedYegua" class="form-control">
                            <option value="">Seleccione...</option>
                            <?php foreach ($infoYeguas as $key => $value) : ?>
                                <option value="<?= trim($key); ?> "
                                        <?= (isset($_POST["selectedYegua"]) && trim($_POST["selectedYegua"]) == $key) ? 'selected' : ''; ?>>
                                            <?= $value["nombre_yegua"]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-row margin-space">
                <div class="form-group col-md-4">
                    <label for="nombre_yegua">Nombre</label>
                    <input type="text" class="form-control" name="form[nombre_yegua]" id="nombre_yegua"
                           value="<?= isset($_POST["form"]["nombre_yegua"]) ? $_POST["form"]["nombre_yegua"] : '' ?>">
                </div>                
                <div class="form-group col-md-4">
                    <label for="registro">Registro</label>
                    <input type="text" class="form-control" name="form[registro]" id="registro"
                           value="<?= isset($_POST["form"]["registro"]) ? $_POST["form"]["registro"] : '' ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="andar">Andar</label>
                    <select id="andar" name="andar" class="form-control" required>
                        <option value="">Seleccione un andar...</option>
                        <?php foreach ($categories as $idCat => $nmCat) : ?>
                            <option value="<?= trim($idCat); ?> "
                                    <?= (isset($_POST["andar"]) && trim($_POST["andar"]) == $idCat) ? 'selected' : ''; ?>>
                                        <?= $nmCat; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="padre">Padre</label>
                    <input type="text" class="form-control" name="form[padre]" id="padre"
                           value="<?= isset($_POST["form"]["padre"]) ? $_POST["form"]["padre"] : '' ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="madre">Madre</label>
                    <input type="text" class="form-control" name="form[madre]" id="madre"
                           value="<?= isset($_POST["form"]["madre"]) ? $_POST["form"]["madre"] : '' ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="abuelo_materno">Abuelo materno</label>
                    <input type="text" class="form-control" name="form[abuelo_materno]" id="abuelo_materno"
                           value="<?= isset($_POST["form"]["abuelo_materno"]) ? $_POST["form"]["abuelo_materno"] : '' ?>">
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
                            <span class="vc_tta-title-text">Cruz - Dorso</span>
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
                            <span class="vc_tta-title-text">MEJORAMIENTO DEL REPRODUCTOR</span>
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
                                            <div class="description">
                                                <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;"></h3>
                                                <p>
                                                    Con el objetivo facilitar la selección y descarte de 
                                                    reproductores S.A.R.A posee 2 fases principales.
                                                </p>
                                                <p>
                                                    <b>Fase 1 o Fase de Descripción</b>
                                                </p>
                                                <p style="text-align: justify">
                                                    Consiste en la caracterización morfológica y descripción 
                                                    del desplazamiento del ejemplar a mejorar, implica 
                                                    llenar parcial o totalmente el formulario de variables, 
                                                    esto le permite al programa perfilar la yegua 
                                                    que se desea mejorar.
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <b>Fase 2 o Fase de Mejoramiento Esperado</b>
                                                </p>
                                                <p style="text-align: justify">
                                                    Durante esta fase existen 2 opciones que 
                                                    le permitirán identificar los potenciales 
                                                    reproductores para su yegua.
                                                </p>
                                                <p style="text-align: justify">
                                                    La primera opción es utilizar el botón <b>BUSCAR</b>, 
                                                    con el cual usted selecciona las características 
                                                    que según su criterio son las fundamentales a 
                                                    mejorar por el Reproductor, el programa buscará 
                                                    los ejemplares que cumplan con estas características.
                                                </p>
                                                <p style="text-align: justify">
                                                    Opción 2 o Botón de <b>SUGERENCIAS</b>, para utilizar esta función 
                                                    asegurese de calificar completamente las variables de 
                                                    ( Aplomos, Alzada, Balance, Morfometría y Movimiento) 
                                                    con estos valores y nuestros criterios S.A.R.A identificara 
                                                    los reproductores ideales para este ejemplar.
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <b>Resultados</b>
                                                </p>
                                                <p style="text-align: justify">
                                                    Finalizadas las fases 1 y 2 puede 
                                                    abrir el perfil completo de los 
                                                    reproductores seleccionados por nuestro 
                                                    software para su yegua, 
                                                    y analizar la compatibilidad de 
                                                    los ejemplares de manera detallada.
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <b>Importante </b>
                                                </p>
                                                <p style="text-align: justify">
                                                    Si no comprende la evaluación de 
                                                    alguna variable, es preferible dejar 
                                                    la casilla en blanco y nuestro software 
                                                    omitirá esta casilla evitando resultados erróneos.
                                                </p>
                                                <p style="text-align: justify">
                                                    Recomendamos usar información de ejemplares 
                                                    mayores a los 36 meses esto garantiza que la 
                                                    información usada sea compatible con la manejada 
                                                    por nuestro programa.
                                                </p>
                                                <p style="text-align: justify">
                                                    A medida que aumente el número de variables 
                                                    evaluadas, S.A.R.A arrojara resultados 
                                                    mas específicos y detallados para 
                                                    cada ejemplar.
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">                                                                                                    
                                                    <label for="geometria_figura">Figura</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_geometria_figura" data-input="geometria_figura" >
                                                    <input type="hidden"                                                            
                                                           id="geometria_figura" 
                                                           name="var[geometria_figura]"
                                                           data-range="range_geometria_figura"
                                                           value="<?=
                                                           isset($_POST['var']['geometria_figura']) ?
                                                                   $_POST['var']['geometria_figura'] : "";
                                                           ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Cuadrada
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['geometria_figura']) && $_POST['var']['geometria_figura'] !== '' ?
                                                                    $_POST['var']['geometria_figura'] : "-";
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Rectangular
                                                        </span>
                                                    </div>
                                                </div>   
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_geometria_figura">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="geometria_orientacion">Orientación</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_geometria_orientacion" data-input="geometria_orientacion" >
                                                    <input type="hidden"                                                            
                                                           id="geometria_orientacion" 
                                                           name="var[geometria_orientacion]"
                                                           data-range="range_geometria_orientacion"
                                                           value="<?= isset($_POST['var']['geometria_orientacion']) ? $_POST['var']['geometria_orientacion'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Descendente
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['geometria_orientacion']) && $_POST['var']['geometria_orientacion'] !== '' ?
                                                                    $_POST['var']['geometria_orientacion'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Ascendente
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_geometria_orientacion">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="balance_horizontal">Horizontal</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_balance_horizontal" data-input="balance_horizontal" >
                                                    <input type="hidden"                                                            
                                                           id="balance_horizontal" 
                                                           name="var[balance_horizontal]"
                                                           data-range="range_balance_horizontal"
                                                           value="<?= isset($_POST['var']['balance_horizontal']) ? $_POST['var']['balance_horizontal'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Desbalanceado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['balance_horizontal']) && $_POST['var']['balance_horizontal'] !== '' ?
                                                                    $_POST['var']['balance_horizontal'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Cercano al piso
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_balance_horizontal">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="balance_vertical">Vertical</label>
                                                    <input type="range" min="1" max="5" class="custom-range" id="range_balance_vertical" data-input="balance_vertical" >
                                                    <input type="hidden"

                                                           id="balance_vertical" 
                                                           name="var[balance_vertical]"
                                                           data-range="range_balance_vertical"
                                                           value="<?= isset($_POST['var']['balance_vertical']) ? $_POST['var']['balance_vertical'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Angosto porción 1
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['balance_vertical']) && $_POST['var']['balance_vertical'] !== '' ?
                                                                    $_POST['var']['balance_vertical'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Angosto zona 3
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_balance_vertical">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg"> 
                                                    <label for="lineaSuperior_cabeza">Cabeza</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_lineaSuperior_cabeza" data-input="lineaSuperior_cabeza" >
                                                    <input type="hidden"                                                            
                                                           id="lineaSuperior_cabeza" 
                                                           name="var[lineaSuperior_cabeza]"
                                                           data-range="range_lineaSuperior_cabeza"
                                                           value="<?= isset($_POST['var']['lineaSuperior_cabeza']) ? $_POST['var']['lineaSuperior_cabeza'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Ordinaria
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['lineaSuperior_cabeza']) && $_POST['var']['lineaSuperior_cabeza'] !== '' ?
                                                                    $_POST['var']['lineaSuperior_cabeza'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Estética
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_lineaSuperior_cabeza">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="lineaSuperior_longitud_cuello">Longitud cuello</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_lineaSuperior_longitud_cuello" data-input="lineaSuperior_longitud_cuello" >
                                                    <input type="hidden"                                                            
                                                           id="lineaSuperior_longitud_cuello" 
                                                           name="var[lineaSuperior_longitud_cuello]"
                                                           data-range="range_lineaSuperior_longitud_cuello"
                                                           value="<?= isset($_POST['var']['lineaSuperior_longitud_cuello']) ? $_POST['var']['lineaSuperior_longitud_cuello'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['lineaSuperior_longitud_cuello']) && $_POST['var']['lineaSuperior_longitud_cuello'] !== '' ?
                                                                    $_POST['var']['lineaSuperior_longitud_cuello'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Largo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_lineaSuperior_longitud_cuello">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <!--<div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="lineaSuperior_orientacion_cuello">Orientación Cuello</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_lineaSuperior_orientacion_cuello" data-input="lineaSuperior_orientacion_cuello" >
                                                    <input type="hidden"                                                            
                                                           id="lineaSuperior_orientacion_cuello" 
                                                           name="var[lineaSuperior_orientacion_cuello]"
                                                           data-range="range_lineaSuperior_orientacion_cuello"
                                                           value="<?php // isset($_POST['var']['lineaSuperior_orientacion_cuello']) ? $_POST['var']['lineaSuperior_orientacion_cuello'] : "";        ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                            <?php /*
                                              isset($_POST['var']['lineaSuperior_orientacion_cuello']) && $_POST['var']['lineaSuperior_orientacion_cuello'] !== '' ?
                                              $_POST['var']['lineaSuperior_orientacion_cuello'] : "-" */
                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_lineaSuperior_orientacion_cuello">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>-->                                            
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="lineaSuperior_pecho">Pecho</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_lineaSuperior_pecho" data-input="lineaSuperior_pecho" >
                                                    <input type="hidden"                                                            
                                                           id="lineaSuperior_pecho" 
                                                           name="var[lineaSuperior_pecho]"
                                                           data-range="range_lineaSuperior_pecho"
                                                           value="<?= isset($_POST['var']['lineaSuperior_pecho']) ? $_POST['var']['lineaSuperior_pecho'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Angosto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['lineaSuperior_pecho']) && $_POST['var']['lineaSuperior_pecho'] !== '' ?
                                                                    $_POST['var']['lineaSuperior_pecho'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Amplio
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_lineaSuperior_pecho">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="espalda_tamano">Tamaño</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_espalda_tamano" data-input="espalda_tamano" >
                                                    <input type="hidden"                                                            
                                                           id="espalda_tamano" 
                                                           name="var[espalda_tamano]"
                                                           data-range="range_espalda_tamano"
                                                           value="<?= isset($_POST['var']['espalda_tamano']) ? $_POST['var']['espalda_tamano'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['espalda_tamano']) && $_POST['var']['espalda_tamano'] !== '' ?
                                                                    $_POST['var']['espalda_tamano'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_espalda_tamano">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="espalda_orientacion">Orientación</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_espalda_orientaciono" data-input="espalda_orientacion" >
                                                    <input type="hidden"                                                            
                                                           id="espalda_orientacion" 
                                                           name="var[espalda_orientacion]"
                                                           data-range="range_espalda_orientacion"
                                                           value="<?= isset($_POST['var']['espalda_orientacion']) ? $_POST['var']['espalda_orientacion'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['espalda_orientacion']) && $_POST['var']['espalda_orientacion'] !== '' ?
                                                                    $_POST['var']['espalda_orientacion'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_espalda_orientacion">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                    <span class="vc_tta-title-text">CRUZ - DORSO</span>
                                </a>
                            </h4>
                        </div>
                        <div class="vc_tta-panel-body" style="">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">

                                    <div class="row">

                                        <!-- INICIO VARIABLES -->

                                        <div class="col-md-6">   
                                            <h4 class="tituVar">Cruz - Dorso</h4>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="lineaSuperior_cruz">Cruz</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_lineaSuperior_cruz" data-input="lineaSuperior_cruz" >
                                                    <input type="hidden"                                                            
                                                           id="lineaSuperior_cruz" 
                                                           name="var[lineaSuperior_cruz]"
                                                           data-range="range_lineaSuperior_cruz"
                                                           value="<?= isset($_POST['var']['lineaSuperior_cruz']) ? $_POST['var']['lineaSuperior_cruz'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['lineaSuperior_cruz']) && $_POST['var']['lineaSuperior_cruz'] !== '' ?
                                                                    $_POST['var']['lineaSuperior_cruz'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Larga
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_lineaSuperior_cruz">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="dorso_tamano">Tamaño dorso</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_dorso_tamano" data-input="dorso_tamano" >
                                                    <input type="hidden"                                                            
                                                           id="dorso_tamano" 
                                                           name="var[dorso_tamano]"
                                                           data-range="range_dorso_tamano"
                                                           value="<?= isset($_POST['var']['dorso_tamano']) ? $_POST['var']['dorso_tamano'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['dorso_tamano']) && $_POST['var']['dorso_tamano'] !== '' ?
                                                                    $_POST['var']['dorso_tamano'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Largos
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_dorso_tamano">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <!--<div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="dorso_linea">Línea dorso</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_dorso_linea" data-input="dorso_linea" >
                                                    <input type="hidden"                                                            
                                                           id="dorso_linea" 
                                                           name="var[dorso_linea]"
                                                           data-range="range_dorso_linea"
                                                           value="<?php // isset($_POST['var']['dorso_linea']) ? $_POST['var']['dorso_linea'] : "";        ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                            <?php /*
                                              isset($_POST['var']['dorso_linea']) && $_POST['var']['dorso_linea'] !== '' ?
                                              $_POST['var']['dorso_linea'] : "-" */
                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_dorso_linea">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>-->
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="grupa_tamano">Tamaño</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_grupa_tamano" data-input="grupa_tamano" >
                                                    <input type="hidden"                                                            
                                                           id="grupa_tamano" 
                                                           name="var[grupa_tamano]"
                                                           data-range="range_grupa_tamano"
                                                           value="<?= isset($_POST['var']['grupa_tamano']) ? $_POST['var']['grupa_tamano'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['grupa_tamano']) && $_POST['var']['grupa_tamano'] !== '' ?
                                                                    $_POST['var']['grupa_tamano'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_grupa_tamano">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="grupa_orientacion">Orientación</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_grupa_orientacion" data-input="grupa_orientacion" >
                                                    <input type="hidden"                                                            
                                                           id="grupa_orientacion" 
                                                           name="var[grupa_orientacion]"
                                                           data-range="range_grupa_orientacion"
                                                           value="<?= isset($_POST['var']['grupa_orientacion']) ? $_POST['var']['grupa_orientacion'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['grupa_orientacion']) && $_POST['var']['grupa_orientacion'] !== '' ?
                                                                    $_POST['var']['grupa_orientacion'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_grupa_orientacion">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="grupa_amplitud">Amplitud</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_grupa_amplitud" data-input="grupa_amplitud" >
                                                    <input type="hidden"                                                            
                                                           id="grupa_amplitud" 
                                                           name="var[grupa_amplitud]"
                                                           data-range="range_grupa_amplitud"
                                                           value="<?= isset($_POST['var']['grupa_amplitud']) ? $_POST['var']['grupa_amplitud'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['grupa_amplitud']) && $_POST['var']['grupa_amplitud'] !== '' ?
                                                                    $_POST['var']['grupa_amplitud'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_grupa_amplitud">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="aplomos_anteriores_frente">Anteriores (Frontalmente)</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_aplomos_anteriores_frente" data-input="aplomos_anteriores_frente" >
                                                    <input type="hidden"                                                            
                                                           id="aplomos_anteriores_frente" 
                                                           name="var[aplomos_anteriores_frente]"
                                                           data-range="range_aplomos_anteriores_frente"
                                                           value="<?= isset($_POST['var']['aplomos_anteriores_frente']) ? $_POST['var']['aplomos_anteriores_frente'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Izquierdo
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['aplomos_anteriores_frente']) && $_POST['var']['aplomos_anteriores_frente'] !== '' ?
                                                                    $_POST['var']['aplomos_anteriores_frente'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Estevado
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_aplomos_anteriores_frente">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="aplomos_anteriores_lateralmente">Anteriores (Lateralmente)</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_aplomos_anteriores_lateralmente" data-input="aplomos_anteriores_lateralmente" >
                                                    <input type="hidden"                                                            
                                                           id="aplomos_anteriores_lateralmente" 
                                                           name="var[aplomos_anteriores_lateralmente]"
                                                           data-range="range_aplomos_anteriores_lateralmente"
                                                           value="<?= isset($_POST['var']['aplomos_anteriores_lateralmente']) ? $_POST['var']['aplomos_anteriores_lateralmente'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Plantado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['aplomos_anteriores_lateralmente']) && $_POST['var']['aplomos_anteriores_lateralmente'] !== '' ?
                                                                    $_POST['var']['aplomos_anteriores_lateralmente'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Remetido
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_aplomos_anteriores_lateralmente">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="aplomos_posteriores_atras">Posteriores (Atrás)</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_aplomos_posteriores_atras" data-input="aplomos_posteriores_atras" >
                                                    <input type="hidden"                                                            
                                                           id="aplomos_posteriores_atras" 
                                                           name="var[aplomos_posteriores_atras]"
                                                           data-range="range_aplomos_posteriores_atras"
                                                           value="<?= isset($_POST['var']['aplomos_posteriores_atras']) ? $_POST['var']['aplomos_posteriores_atras'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Cerrados
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['aplomos_posteriores_atras']) && $_POST['var']['aplomos_posteriores_atras'] !== '' ?
                                                                    $_POST['var']['aplomos_posteriores_atras'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Abiertos
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_aplomos_posteriores_atras">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="aplomos_posteriores_lateralmente">Posteriores (Lateralmente)</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_aplomos_posteriores_lateralmente" data-input="aplomos_posteriores_lateralmente" >
                                                    <input type="hidden"                                                            
                                                           id="aplomos_posteriores_lateralmente" 
                                                           name="var[aplomos_posteriores_lateralmente]"
                                                           data-range="range_aplomos_posteriores_lateralmente"
                                                           value="<?= isset($_POST['var']['aplomos_posteriores_lateralmente']) ? $_POST['var']['aplomos_posteriores_lateralmente'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Plantado
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['aplomos_posteriores_lateralmente']) && $_POST['var']['aplomos_posteriores_lateralmente'] !== '' ?
                                                                    $_POST['var']['aplomos_posteriores_lateralmente'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Remetido
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_aplomos_posteriores_lateralmente">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="alzada">Alzada</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_alzada_estatura" data-input="alzada_estatura" >
                                                    <input type="hidden"                                                            
                                                           id="alzada_estatura" 
                                                           name="var[alzada_estatura]"
                                                           data-range="range_alzada_estatura"
                                                           value="<?= isset($_POST['var']['alzada_estatura']) ? $_POST['var']['alzada_estatura'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['alzada_estatura']) && $_POST['var']['alzada_estatura'] !== '' ?
                                                                    $_POST['var']['alzada_estatura'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Alta
                                                        </span>
                                                    </div>                                                    
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_alzada_estatura">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>                                                                                       
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="morfometria_cana_anterior">Caña anterior</label>
                                                    <input type="range" min="1" max="4" class="custom-range" id="range_morfometria_cana_anterior" data-input="morfometria_cana_anterior" >
                                                    <input type="hidden"                                                            
                                                           id="morfometria_cana_anterior" 
                                                           name="var[morfometria_cana_anterior]"
                                                           data-range="range_morfometria_cana_anterior"
                                                           value="<?= isset($_POST['var']['morfometria_cana_anterior']) ? $_POST['var']['morfometria_cana_anterior'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['morfometria_cana_anterior']) && $_POST['var']['morfometria_cana_anterior'] !== '' ?
                                                                    $_POST['var']['morfometria_cana_anterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy larga
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_morfometria_cana_anterior">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="morfometria_cuartilla_anterior">Cuartilla anterior</label>
                                                    <input type="range" min="1" max="4" class="custom-range" id="range_morfometria_cuartilla_anterior" data-input="morfometria_cuartilla_anterior" >
                                                    <input type="hidden"                                                            
                                                           id="morfometria_cuartilla_anterior" 
                                                           name="var[morfometria_cuartilla_anterior]"
                                                           data-range="range_morfometria_cuartilla_anterior"
                                                           value="<?= isset($_POST['var']['morfometria_cuartilla_anterior']) ? $_POST['var']['morfometria_cuartilla_anterior'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['morfometria_cuartilla_anterior']) && $_POST['var']['morfometria_cuartilla_anterior'] !== '' ?
                                                                    $_POST['var']['morfometria_cuartilla_anterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy larga
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_morfometria_cuartilla_anterior">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="morfometria_femur">Fémur</label>
                                                    <input type="range" min="0" max="3" class="custom-range" id="range_morfometria_femur" data-input="morfometria_femur" >
                                                    <input type="hidden"                                                            
                                                           id="morfometria_femur" 
                                                           name="var[morfometria_femur]"
                                                           data-range="range_morfometria_femur"
                                                           value="<?= isset($_POST['var']['morfometria_femur']) ? $_POST['var']['morfometria_femur'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Muy corto
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['morfometria_femur']) && $_POST['var']['morfometria_femur'] !== '' ?
                                                                    $_POST['var']['morfometria_femur'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Largo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_morfometria_femur">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="morfometria_cana_posterior">Caña posterior</label>
                                                    <input type="range" min="1" max="4" class="custom-range" id="range_morfometria_cana_posterior" data-input="morfometria_cana_posterior" >
                                                    <input type="hidden"                                                            
                                                           id="morfometria_cana_posterior" 
                                                           name="var[morfometria_cana_posterior]"
                                                           data-range="range_morfometria_cana_posterior"
                                                           value="<?= isset($_POST['var']['morfometria_cana_posterior']) ? $_POST['var']['morfometria_cana_posterior'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['morfometria_cana_posterior']) && $_POST['var']['morfometria_cana_posterior'] !== '' ?
                                                                    $_POST['var']['morfometria_cana_posterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy larga
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_morfometria_cana_posterior">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="morfometria_cuartilla_posterior">Cuartilla posterior</label>
                                                    <input type="range" min="1" max="4" class="custom-range" id="range_morfometria_cuartilla_posterior" data-input="morfometria_cuartilla_posterior" >
                                                    <input type="hidden"                                                            
                                                           id="morfometria_cuartilla_posterior" 
                                                           name="var[morfometria_cuartilla_posterior]"
                                                           data-range="range_morfometria_cuartilla_posterior"
                                                           value="<?= isset($_POST['var']['morfometria_cuartilla_posterior']) ? $_POST['var']['morfometria_cuartilla_posterior'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Corta
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['morfometria_cuartilla_posterior']) && $_POST['var']['morfometria_cuartilla_posterior'] !== '' ?
                                                                    $_POST['var']['morfometria_cuartilla_posterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy larga
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_morfometria_cuartilla_posterior">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>                                            
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_velocidad">Velocidad</label>
                                                    <input type="range" min="0" max="3" class="custom-range" id="range_movimiento_velocidad" data-input="movimiento_velocidad" >
                                                    <input type="hidden"                                                            
                                                           id="movimiento_velocidad" 
                                                           name="var[movimiento_velocidad]"
                                                           data-range="range_movimiento_velocidad"
                                                           value="<?= isset($_POST['var']['movimiento_velocidad']) ? $_POST['var']['movimiento_velocidad'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Muy baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['movimiento_velocidad']) && $_POST['var']['movimiento_velocidad'] !== '' ?
                                                                    $_POST['var']['movimiento_velocidad'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy alta
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_movimiento_velocidad">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="movimiento_elevacion_anterior">Elevación anteriores</label>
                                                    <input type="range" min="0" max="3" class="custom-range" id="range_movimiento_elevacion_anterior" data-input="movimiento_elevacion_anterior" >
                                                    <input type="hidden"                                                            
                                                           id="movimiento_elevacion_anterior" 
                                                           name="var[movimiento_elevacion_anterior]"
                                                           data-range="range_movimiento_elevacion_anterior"
                                                           value="<?= isset($_POST['var']['movimiento_elevacion_anterior']) ? $_POST['var']['movimiento_elevacion_anterior'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Muy baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['movimiento_elevacion_anterior']) && $_POST['var']['movimiento_elevacion_anterior'] !== '' ?
                                                                    $_POST['var']['movimiento_elevacion_anterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Alta
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_movimiento_elevacion_anterior">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_elevacion_posterior">Elevación posteriores</label>
                                                    <input type="range" min="0" max="3" class="custom-range" id="range_movimiento_elevacion_posterior" data-input="movimiento_elevacion_posterior" >
                                                    <input type="hidden"                                                            
                                                           id="movimiento_elevacion_posterior" 
                                                           name="var[movimiento_elevacion_posterior]"
                                                           data-range="range_movimiento_elevacion_posterior"
                                                           value="<?= isset($_POST['var']['movimiento_elevacion_posterior']) ? $_POST['var']['movimiento_elevacion_posterior'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Muy baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['movimiento_elevacion_posterior']) && $_POST['var']['movimiento_elevacion_posterior'] !== '' ?
                                                                    $_POST['var']['movimiento_elevacion_posterior'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Alta
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_movimiento_elevacion_posterior">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="movimiento_pisada">Potencia en la pisada</label>
                                                    <input type="range" min="0" max="3" class="custom-range" id="range_movimiento_pisada" data-input="movimiento_pisada" >
                                                    <input type="hidden"                                                            
                                                           id="movimiento_pisada" 
                                                           name="var[movimiento_pisada]"
                                                           data-range="range_movimiento_pisada"
                                                           value="<?= isset($_POST['var']['movimiento_pisada']) ? $_POST['var']['movimiento_pisada'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Muy baja
                                                        </span>
                                                        <span class="valor">
                                                            <?=
                                                            isset($_POST['var']['movimiento_pisada']) && $_POST['var']['movimiento_pisada'] !== '' ?
                                                                    $_POST['var']['movimiento_pisada'] : "-"
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy potente
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_movimiento_pisada">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                            <!--<div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_pulimento">Pulimento</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_movimiento_pulimento" data-input="movimiento_pulimento" >
                                                    <input type="hidden"                                                            
                                                           id="movimiento_pulimento" 
                                                           name="var[movimiento_pulimento]"
                                                           data-range="range_movimiento_pulimento"
                                                           value="<?php // isset($_POST['var']['movimiento_pulimento']) ? $_POST['var']['movimiento_pulimento'] : "";        ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Valor mínimo
                                                        </span>
                                                        <span class="valor">
                                            <?php /*
                                              isset($_POST['var']['movimiento_pulimento']) && $_POST['var']['movimiento_pulimento'] !== '' ?
                                              $_POST['var']['movimiento_pulimento'] : "-" */
                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Valor máximo
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_movimiento_pulimento">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>-->
                                            <!--<div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cabeza.jpg">
                                                    <label for="movimiento_elasticidad">Elasticidad</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_movimiento_elasticidad" data-input="movimiento_elasticidad" >
                                                    <input type="hidden"                                                            
                                                           id="movimiento_elasticidad" 
                                                           name="var[movimiento_elasticidad]"
                                                           data-range="range_movimiento_elasticidad"
                                                           value="<?php // isset($_POST['var']['movimiento_elasticidad']) ? $_POST['var']['movimiento_elasticidad'] : "";        ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Poco elástico
                                                        </span>
                                                        <span class="valor">
                                            <?php /*
                                              isset($_POST['var']['movimiento_elasticidad']) && $_POST['var']['movimiento_elasticidad'] !== '' ?
                                              $_POST['var']['movimiento_elasticidad'] : "-" */
                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Muy elástico
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_movimiento_elasticidad">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>-->
                                            <!--<div class="form-row" style="position: relative;">
                                                <span class="emptyVar" style="display: none"><i class="fa fa-ban"></i></span>
                                                <div class="form-group col-md-12 divVariable" 
                                                     data-image="cuello.jpg">
                                                    <label for="movimiento_compensacion">Compensación</label>
                                                    <input type="range" min="1" max="3" class="custom-range" id="range_movimiento_compensacion" data-input="movimiento_compensacion" >
                                                    <input type="hidden"                                                            
                                                           id="movimiento_compensacion" 
                                                           name="var[movimiento_compensacion]"
                                                           data-range="range_movimiento_compensacion"
                                                           value="<?php //= isset($_POST['var']['movimiento_compensacion']) ? $_POST['var']['movimiento_compensacion'] : ""; ?>">
                                                    <div class="valores">
                                                        <span class="minvalor">
                                                            Descompensado
                                                        </span>
                                                        <span class="valor">
                                                            <?php /*=
                                                            isset($_POST['var']['movimiento_compensacion']) && $_POST['var']['movimiento_compensacion'] !== '' ?
                                                                    $_POST['var']['movimiento_compensacion'] : "-"*/
                                                            ?>
                                                        </span>
                                                        <span class="maxvalor">
                                                            Compensado
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="info" 
                                                      data-toggle="modal" 
                                                      data-target="#mdl_movimiento_compensacion">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>-->
                                        </div>
                                        <!-- FIN VARIABLES -->

                                        <!-- INICIO INFO -->
                                        <div class="col-md-6">
                                            <div class="horse-image">
                                                <img src="<?= plugins_url("buscador-equinetics/includes/views/assets/images/cuello.jpg"); ?>" />
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
                                    <p>*Seleccione máximo 6 características en el orden de prioridad de mejoramiento.</p>
                                    <div class="row margin-space well">
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="chk_geometria_figura" 
                                                       name="chk[chk_geometria_figura]" 
                                                       value="chk_geometria_figura"
                                                       <?= isset($_POST['chk']['chk_geometria_figura']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_geometria_figura">Figura</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="chk_geometria_orientacion" 
                                                       name="chk[chk_geometria_orientacion]" 
                                                       value="chk_geometria_orientacion"
                                                       <?= isset($_POST['chk']['chk_geometria_orientacion']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_geometria_orientacion">Orientación</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_balance_horizontal" name="chk[chk_balance_horizontal]" value="chk_balance_horizontal" <?= isset($_POST['chk']['chk_balance_horizontal']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_balance_horizontal">Balance horizontal</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_balance_vertical" name="chk[chk_balance_vertical]" value="chk_balance_vertical" <?= isset($_POST['chk']['chk_balance_vertical']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_balance_vertical">Balance vertical</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_espalda_tamano" name="chk[chk_espalda_tamano]" value="chk_espalda_tamano" <?= isset($_POST['chk']['chk_espalda_tamano']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_espalda_tamano">Tamaño espalda</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_espalda_orientacion" name="chk[chk_espalda_orientacion]" value="chk_espalda_orientacion" <?= isset($_POST['chk']['chk_espalda_orientacion']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_espalda_orientacion">Orientación espalda</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_dorso_tamano" name="chk[chk_dorso_tamano]" value="chk_dorso_tamano" <?= isset($_POST['chk']['chk_dorso_tamano']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_dorso_tamano">Tamaño Dorso</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_dorso_linea" name="chk[chk_dorso_linea]" value="chk_dorso_linea" <?php // isset($_POST['chk']['chk_dorso_linea']) ? 'checked' : ''        ?>>
                                                <label class="form-check-label" for="chk_dorso_linea">Línea dorso</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>-->
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_grupa_tamano" name="chk[chk_grupa_tamano]" value="chk_grupa_tamano" <?= isset($_POST['chk']['chk_grupa_tamano']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_grupa_tamano">Tamaño grupa</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_grupa_orientacion" name="chk[chk_grupa_orientacion]" value="chk_grupa_orientacion" <?= isset($_POST['chk']['chk_grupa_orientacion']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_grupa_orientacion">Orientación grupa</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_grupa_amplitud" name="chk[chk_grupa_amplitud]" value="chk_grupa_amplitud" <?= isset($_POST['chk']['chk_grupa_amplitud']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_grupa_amplitud">Amplitud grupa</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_alzada_estatura" name="chk[chk_alzada_estatura]" value="chk_alzada_estatura" <?= isset($_POST['chk']['chk_alzada_estatura']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_alzada_estatura">Alzada</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6" style="visibility: hidden">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_dorso_linea" name="chk[chk_dorso_linea]" value="chk_dorso_linea" <?php // isset($_POST['chk']['chk_dorso_linea']) ? 'checked' : ''        ?>>
                                                <label class="form-check-label" for="chk_dorso_linea">Línea dorso</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <label class="form-check-label" style="padding-top: 20px">Aplomos anteriores</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_anteriores_frente" name="chk[chk_aplomos_anteriores_frente]" value="chk_aplomos_anteriores_frente" <?= isset($_POST['chk']['chk_aplomos_anteriores_frente']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_aplomos_anteriores_frente">Frontalmente</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_anteriores_lateralmente" name="chk[chk_aplomos_anteriores_lateralmente]" value="chk_aplomos_anteriores_lateralmente" <?= isset($_POST['chk']['chk_aplomos_anteriores_lateralmente']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_aplomos_anteriores_lateralmente">Lateralmente</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <label class="form-check-label" style="padding-top: 20px">Aplomos posteriores</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_posteriores_atras" name="chk[chk_aplomos_posteriores_atras]" value="chk_aplomos_posteriores_atras" <?= isset($_POST['chk']['chk_aplomos_posteriores_atras']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_aplomos_posteriores_atras">Posteriormente</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_aplomos_posteriores_lateralmente" name="chk[chk_aplomos_posteriores_lateralmente]" value="chk_aplomos_posteriores_lateralmente" <?= isset($_POST['chk']['chk_aplomos_posteriores_lateralmente']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_aplomos_posteriores_lateralmente">Lateralmente</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>                                        
                                    </div>

                                    <h3 class="h3subtitu margin-space">Línea Superior</h3>
                                    <div class="row well">
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_lineaSuperior_cabeza" name="chk[chk_lineaSuperior_cabeza]" value="chk_lineaSuperior_cabeza" <?= isset($_POST['chk']['chk_lineaSuperior_cabeza']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_lineaSuperior_cabeza">Cabeza</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_lineaSuperior_longitud_cuello" name="chk[chk_lineaSuperior_longitud_cuello]" value="chk_lineaSuperior_longitud_cuello" <?= isset($_POST['chk']['chk_lineaSuperior_longitud_cuello']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_lineaSuperior_longitud_cuello">Longitud cuello</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_lineaSuperior_orientacion_cuello" name="chk[chk_lineaSuperior_orientacion_cuello]" value="chk_lineaSuperior_orientacion_cuello" <?php //isset($_POST['chk']['chk_lineaSuperior_orientacion_cuello']) ? 'checked' : ''        ?>>
                                                <label class="form-check-label" for="chk_lineaSuperior_orientacion_cuello">Orientación cuello</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>-->
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_lineaSuperior_cruz" name="chk[chk_lineaSuperior_cruz]" value="chk_lineaSuperior_cruz" <?= isset($_POST['chk']['chk_lineaSuperior_cruz']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_lineaSuperior_cruz">Cruz</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_lineaSuperior_pecho" name="chk[chk_lineaSuperior_pecho]" value="chk_lineaSuperior_pecho" <?= isset($_POST['chk']['chk_lineaSuperior_pecho']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_lineaSuperior_pecho">Pecho</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>        
                                    </div>
                                    <h3 class="h3subtitu margin-space">Morfometría</h3>
                                    <div class="row well">                                        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_morfometria_cana_anterior" name="chk[chk_morfometria_cana_anterior]" value="chk_morfometria_cana_anterior" <?= isset($_POST['chk']['chk_morfometria_cana_anterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_morfometria_cana_anterior">Caña anterior</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_morfometria_cuartilla_anterior" name="chk[chk_morfometria_cuartilla_anterior]" value="chk_morfometria_cuartilla_anterior" <?= isset($_POST['chk']['chk_morfometria_cuartilla_anterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_morfometria_cuartilla_anterior">Cuartilla anterior</label><span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_morfometria_femur" name="chk[chk_morfometria_femur]" value="chk_morfometria_femur" <?= isset($_POST['chk']['chk_morfometria_femur']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_morfometria_femur">Fémur</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_morfometria_cana_posterior" name="chk[chk_morfometria_cana_posterior]" value="chk_morfometria_cana_posterior" <?= isset($_POST['chk']['chk_morfometria_cana_posterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_morfometria_cana_posterior">Caña posterior</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>        
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_morfometria_cuartilla_posterior" name="chk[chk_morfometria_cuartilla_posterior]" value="chk_morfometria_cuartilla_posterior" <?= isset($_POST['chk']['chk_morfometria_cuartilla_posterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_morfometria_cuartilla_posterior">Cuartilla posterior</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>        
                                    </div>
                                    <h3 class="h3subtitu margin-space">Movimiento</h3>
                                    <div class="row well">
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_movimiento_velocidad" name="chk[chk_movimiento_velocidad]" value="chk_movimiento_velocidad" <?= isset($_POST['chk']['chk_movimiento_velocidad']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_movimiento_velocidad">Velocidad</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_movimiento_elevacion_anterior" name="chk[chk_movimiento_elevacion_anterior]" value="chk_movimiento_elevacion_anterior" <?= isset($_POST['chk']['chk_movimiento_elevacion_anterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_movimiento_elevacion_anterior">Elevación anterior</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_movimiento_elevacion_posterior" name="chk[chk_movimiento_elevacion_posterior]" value="chk_movimiento_elevacion_posterior" <?= isset($_POST['chk']['chk_movimiento_elevacion_posterior']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_movimiento_elevacion_posterior">Elevación posterior</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_movimiento_pisada" name="chk[chk_movimiento_pisada]" value="chk_movimiento_pisada" <?= isset($_POST['chk']['chk_movimiento_pisada']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_movimiento_pisada">Potencia en la pisada</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>        
                                        <!--<div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_movimiento_pulimento" name="chk[chk_movimiento_pulimento]" value="chk_movimiento_pulimento" <?php // isset($_POST['chk']['chk_movimiento_pulimento']) ? 'checked' : ''        ?>>
                                                <label class="form-check-label" for="chk_movimiento_pulimento">Pulimento</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>-->   
                                        <!--<div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_movimiento_elasticidad" name="chk[chk_movimiento_elasticidad]" value="chk_movimiento_elasticidad" <?php // isset($_POST['chk']['chk_movimiento_elasticidad']) ? 'checked' : ''        ?>>
                                                <label class="form-check-label" for="chk_movimiento_elasticidad">Elasticidad</label>
                                                <span class="prioridad badge badge-secondary"></span>
                                            </div>
                                        </div>-->
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chk_movimiento_compensacion" name="chk[chk_movimiento_compensacion]" value="chk_movimiento_compensacion" <?= isset($_POST['chk']['chk_movimiento_compensacion']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="chk_movimiento_compensacion">Compensación</label>
                                                <span class="prioridad badge badge-secondary"></span>
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
                                                   name="buscar"
                                                   value="<?= $settings["search_field_text"]; ?>" 
                                                   class="up-button up_btn-s btn-grey btn-buscarguardar"
                                                   style="line-height: 40px !important; padding: 3px 50px;"/>
                                                   <?php if (is_user_logged_in()) : ?>        
                                                <input type="submit" 
                                                       name="guardar"
                                                       value="Buscar y guardar" 
                                                       class="up-button btn-grey btn-buscarguardar"
                                                       style="line-height: 40px !important; padding: 3px 50px;"/>               
                                                   <?php endif; ?>
                                            <input type="submit" 
                                                   name="sugerencia"
                                                   value="Sugerencias S. A. R. A." 
                                                   class="up-button up_btn-s btn-red btn-buscarguardar"
                                                   style="line-height: 40px !important; padding: 3px 50px;"/>
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
    <input type="hidden" name="priority" id="priority" value="<?= isset($_POST['priority']) ? $_POST['priority'] : ''; ?>" />

</form>
<!-- FIN FORM SOFTWARE -->

<?php
if (isset($_POST) &&
        (
        (isset($products) && $products->have_posts()) ||
        (isset($products90) && $products90->have_posts()) ||
        (isset($products80) && $products80->have_posts())
        )
) :
    $anyShown = false;
    ?>
    <span id="hr-search-results-eq"></span>
    <hr />    
    <h3 class="h3subtitu" style="margin-bottom: 30px; text-align: left">Ejemplares compatibles</h3>

    <div id="search-results-eq">

        <?php if ((int) $products->found_posts > 0) : ?>
            <?php $anyShown = true; ?>
            <div class="fullresult">
                <p class="text-center" style="padding: 10px 0;">
                    <?php if (!$isSaraResults): ?>
                        Los siguientes resultados se basan en las solicitudes de mejora de: 
                        <span class="variables_resultados"></span>.
                    <?php endif; ?>
                </p>

                <?php woocommerce_product_loop_start(); ?>

                <?php while ($products->have_posts()) : $products->the_post(); ?>

                    <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; ?>

                <?php woocommerce_product_loop_end(); ?>
            </div>
        <?php endif; ?>

        <?php if ((int) $products90->found_posts > 0 && !$anyShown) : ?>
            <?php $anyShown = true; ?>
            <div class="result90">
                <p class="text-center" style="padding: 10px 0;">
                    Los siguientes resultados se basan en las solicitudes de mejora de: 
                    <span class="variables_resultados_90"></span>.
                </p>
                <?php woocommerce_product_loop_start(); ?>

                <?php while ($products90->have_posts()) : $products90->the_post(); ?>

                    <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; ?>

                <?php woocommerce_product_loop_end(); ?>                
            </div>
        <?php endif; ?>

        <?php if ((int) $products80->found_posts > 0 && !$anyShown) : ?>
            <?php $anyShown = true; ?>
            <div class="result80">
                <p class="text-center" style="padding: 10px 0;">
                    Los siguientes resultados se basan en las solicitudes de mejora de: 
                    <span class="variables_resultados_80"></span>.
                </p>
                <?php woocommerce_product_loop_start(); ?>

                <?php while ($products80->have_posts()) : $products80->the_post(); ?>                   

                    <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; ?>

                <?php woocommerce_product_loop_end(); ?>                
            </div>
        <?php endif; ?>

    </div>
    <?php
elseif (!empty($_POST) &&
        (
        (!isset($products) || !$products->have_posts()) &&
        (!isset($products90) || !$products90->have_posts()) &&
        (!isset($products80) || !$products80->have_posts())
        )
):
    ?>
    <span id="hr-search-results-eq"></span>
    <hr />    
    <h3 class="h3subtitu" style="margin-bottom: 30px; text-align: left">Resultados encontrados</h3>
    <p style="margin-bottom: 50px;">No se encontraron ejemplares compatibles con las tipificaciones de su Yegua.</p>
<?php endif; ?>

<?php
wp_reset_postdata();
echo '<div class="woocommerce">' . ob_get_clean() . '</div>';
?>
<!-- incluye los modales de las variables -->
<?php include dirname(__FILE__) . '/descriptions/modals.php'; ?>
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

    var selectedImprovements = [];

    jQuery('#selectedYegua').change(function () {
        if (jQuery(this).val() !== "") {
            //BUSCO LOS DATOS DE LA YEGUA SELECCIONADA
            jQuery.ajax({
                beforeSend: function () {},
                type: "POST",
                url: "<?= get_site_url(); ?>/wp-admin/admin-ajax.php",
                data: {'action': 'get_selected_yegua', 'nmYegua': jQuery(this).val()},
                dataType: "json",
                success: function (data) {
                    //INGRESO LOS DATOS PERSONALES DE LA YEGUA GUARDADA
                    jQuery("#nombre_yegua").val(data.nombre_yegua);
                    jQuery("#registro").val(data.registro);
                    jQuery("#padre").val(data.padre);
                    jQuery("#madre").val(data.madre);
                    jQuery("#abuelo_materno").val(data.abuelo_materno);
                    jQuery("#andar").val(data.andar);
                    //INGRESO LAS TIPIFICACIONES GUARDADAS
                    jQuery.each(data.var, function (i, val) {
                        jQuery("#" + i).val(val);
                    });
                    set_selected_values();
                    //CHECKEO LAS MEJORAS GUARDADAS
                    jQuery("input[type='checkbox']").prop('checked', false);
                    jQuery.each(data.chk, function (i, val) {
                        jQuery("#" + i).prop('checked', true);
                    });
                    var prioritySelected2 = data.priority.split(",");
                    selectedImprovements = [];
                    jQuery.each(prioritySelected2, function (i, val) {
                        if (jQuery("#" + val).is(":checked")) {
                            selectedImprovements.push(jQuery("#" + val).attr('id'));
                        }
                        setPriority();
                    });

                },
                error: function (error) {
                    alert("Ha ocurrido un error: Código: (" + error.status + ") '" + error.statusText + "'");
                }
            });
            //jQuery('form.buscadr').submit();
        }
    });

    jQuery("form.buscadr input[type=submit]").click(function () {
        jQuery("input[type=submit]", jQuery(this).parents("form")).removeAttr("clicked");
        jQuery(this).attr("clicked", "true");
    });
    jQuery('form.buscadr').submit(function () {
        /* BOTON QUE HIZO SUBMIT */
        var buttonSubmited = jQuery("input[type=submit][clicked=true]").attr('name');

        /* VALIDAR QUE AL MENOS UNA TIPIFICACION SEA SELECCIONADA */
        /*var bandera1 = false;
         jQuery('form.buscadr input.custom-range-hidden').each(function () {            
         if (jQuery(this).val() !== "0" ||
         jQuery(this).attr('id') !== "morfometria_femur" &&
         jQuery(this).attr('id') !== "movimiento_velocidad" &&
         jQuery(this).attr('id') !== "movimiento_pisada" &&
         jQuery(this).attr('id') !== "movimiento_elevacion_anterior" &&
         jQuery(this).attr('id') !== "movimiento_elevacion_posterior") {
         bandera1 = true;
         return false;
         }
         });
         if (!bandera1) {
         alert('Debe tipificar al menos una variable de su Yegua.');
         return false;
         }*/

        /* VALIDAR QUE AL MENOS UN CHECK DE MEJORA SEA SELECCIONADO */
        var numberOfChecked = jQuery('form.buscadr input.form-check-input:checked').length;
        if (numberOfChecked <= 0 && buttonSubmited !== "sugerencia") {
            alert('Debe selecionar al menos una variable de mejoramiento');
            return false;
        }

        /* VALIDAR QUE SOLO SE SELECCIONES MAXIMO 6 VARIABLES */
        if (numberOfChecked > 6) {
            alert('Solo puedes seleccionar 6 variables');
            return false;
        }

        /*VALIDO QUE SI EL BOTON ES SARA HAYA SELECCIONADO LAS VARIABLES NECESARIAS */
        if (buttonSubmited == "sugerencia") {
            if (jQuery('#movimiento_velocidad').val() == "" ||
                    jQuery('#movimiento_pisada').val() == "" ||
                    jQuery('#movimiento_elevacion_anterior').val() == "" ||
                    jQuery('#movimiento_elevacion_posterior').val() == "" ||
                    jQuery('#morfometria_cana_anterior').val() == "" ||
                    jQuery('#morfometria_cuartilla_anterior').val() == "" ||
                    jQuery('#morfometria_cana_posterior').val() == "" ||
                    jQuery('#morfometria_cuartilla_posterior').val() == "" ||
                    jQuery('#alzada_estatura').val() == "" ||
                    jQuery('#balance_horizontal').val() == "" ||
                    jQuery('#aplomos_anteriores_frente').val() == "" ||
                    jQuery('#aplomos_anteriores_lateralmente').val() == "" ||
                    jQuery('#aplomos_posteriores_atras').val() == "" ||
                    jQuery('#aplomos_posteriores_lateralmente').val() == "") {
                alert("Califique las variables de (Aplomos, Alzada, Balance, Morfometría y Movimiento) para usar esta función.");
                return false;
            }
        }

        /* VALIDACION DE VARIABLES TIPIFICADAS VS MEJORADAS */
        var bandera = true;
        jQuery('form.buscadr input.form-check-input:checked').each(function () {
            var variableChk = jQuery(this).attr("id").replace('chk_', '');

            if (jQuery("#" + variableChk).val() === "0" &&
                    variableChk !== "morfometria_femur" &&
                    variableChk !== "movimiento_velocidad" &&
                    variableChk !== "movimiento_pisada" &&
                    variableChk !== "movimiento_elevacion_anterior" &&
                    variableChk !== "movimiento_elevacion_posterior") {
                bandera = false;
                return false;
            }
        });
        if (!bandera) {
            alert('Todas las características que desea mejorar en el reproductor, \n\
deben estar tipificadas en la información de su Yegua.\n\
Por favor revise la información suministrada.');
            return false;
        }

        /* VALIDAR QUE SI SE MEJORA EL DORSO SE DEBA SELECCIONAR LA CRUZ */
        if ((jQuery("#chk_lineaSuperior_cruz").is(':checked')
                && !jQuery("#chk_dorso_tamano").is(':checked')) ||
                (jQuery("#chk_dorso_tamano").is(':checked')
                        && !jQuery("#chk_lineaSuperior_cruz").is(':checked'))
                ) {
            alert("Las variables 'Dorso' y 'Cruz' están directamente relacionadas. \n\
            Por favor tipifique ambas variables");
            return false;
        }

        /* SI NO HAY ERRORES REALIZA LA BUSQUEDA */
        return true;
    });

    //SI SE DESLIZA ALGUNA VARIABLE CON EL RANGO DEBO LLENAR EL VALOR OCULTO
    jQuery('input[type="range"]').change(function () {
        /*if (jQuery(this).val() == 0) {
         jQuery(this).parent().parent().removeClass("selectedVar");
         jQuery(this).parent().prev(".emptyVar").hide();
         jQuery(this).next().children(".valor").html("-");
         } else {*/
        jQuery("#" + jQuery(this).data('input')).val(jQuery(this).val());
        jQuery(this).parent().parent().addClass("selectedVar");
        jQuery(this).parent().prev(".emptyVar").show();
        jQuery(this).next().next(".valores").children(".valor").html(jQuery(this).val());
        /*}*/
    });

    jQuery('.emptyVar').click(function () {
        jQuery(this).next().children('input[type="range"]').val(2);
        jQuery(this).next().children('input[type="range"]').trigger('change');
        jQuery(this).next().children('input[type="hidden"]').val("");
        jQuery(this).parent().removeClass("selectedVar");
        jQuery(this).hide();
        jQuery(this).next().children(".valores").children(".valor").html("-");
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

    jQuery('form.buscadr input.form-check-input').change(function () {
        var numberOfChecked = jQuery('form.buscadr input.form-check-input:checked').length;
        if (numberOfChecked > 6) {
            jQuery(this).prop('checked', false);
            selectedImprovements.splice(selectedImprovements.indexOf(jQuery(this).attr('id')), 1);
            jQuery(this).siblings(".prioridad").html("");
            jQuery(this).parent(".form-check.form-check-inline").removeClass("haspriority");
            jQuery(this).siblings(".prioridad").removeClass("haspriority");
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

    /* FUNCION ENCARGADA DE DAR LOS VALORES INICIALES DE LOS RANGOS */
    function set_selected_values() {
        //VALOR INICIAL PARA LOS RANGOS DE LAS VARIABLES
        jQuery('input[type="hidden"]').each(function () {
            if (jQuery(this).attr("id") !== "priority") {
                if (jQuery(this).val() !== "") {
                    jQuery("#" + jQuery(this).data("range")).val(jQuery(this).val());
                    jQuery(this).parent().parent().addClass("selectedVar");
                    jQuery(this).parent().prev(".emptyVar").show();
                    jQuery(this).next().children(".valor").html(jQuery(this).val());
                }
            }
        });
    }

    /* FUNCION ENCARGADA DE DEFINIR LA PRIORIDAD DE LAS MEJORAS */

    jQuery(document).ready(function () {

        set_selected_values();

        var prioritySelected = jQuery("#priority").val().split(",");
        jQuery.each(prioritySelected, function (i, val) {
            if (jQuery("#" + val).is(":checked")) {
                selectedImprovements.push(jQuery("#" + val).attr('id'));
            }
            setPriority();
        });

<?php if (!empty($lblpriority)): ?>
            var chkSelected = "<?php echo $lblpriority; ?>".split(",");
            var varchkSelected = []
            jQuery.each(chkSelected, function (i, val) {
                varchkSelected.push(jQuery("label[for='" + val + "']").text());
            });
            jQuery(".variables_resultados").text(varchkSelected.join(', '));
<?php endif; ?>

<?php if (!empty($lblpriority90)): ?>
            var chkSelected90 = "<?php echo $lblpriority90; ?>".split(",");
            var varchkSelected90 = []
            jQuery.each(chkSelected90, function (i, val) {
                varchkSelected90.push(jQuery("label[for='" + val + "']").text());
            });
            jQuery(".variables_resultados_90").text(varchkSelected90.join(', '));
<?php endif; ?>

<?php if (!empty($lblpriority80)): ?>
            var chkSelected80 = "<?php echo $lblpriority80; ?>".split(",");
            var varchkSelected80 = []
            jQuery.each(chkSelected80, function (i, val) {
                varchkSelected80.push(jQuery("label[for='" + val + "']").text());
            });
            jQuery(".variables_resultados_80").text(varchkSelected80.join(', '));
<?php endif; ?>

    });

    jQuery("input[type='checkbox']").click(function () {
        if (jQuery(this).is(":checked")) {
            selectedImprovements.push(jQuery(this).attr('id'));
        } else {
            selectedImprovements.splice(selectedImprovements.indexOf(jQuery(this).attr('id')), 1);
        }
        setPriority();
    });

    function setPriority() {
        jQuery(".prioridad").html("");
        jQuery(".prioridad").removeClass("haspriority");
        jQuery(".form-check.form-check-inline").removeClass("haspriority");
        jQuery.each(selectedImprovements, function (i, val) {
            let prioridad = i + 1;
            jQuery("#" + val).siblings(".prioridad").html(prioridad);
            jQuery("#" + val).parent(".form-check.form-check-inline").addClass("haspriority");
            jQuery("#" + val).siblings(".prioridad").addClass("haspriority");
        });
        jQuery("#priority").val(selectedImprovements.join());
    }

</script>