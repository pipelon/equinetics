<link rel='stylesheet' 
      id='vc_tta_style-css'  
      href='<?= plugins_url("js_composer/assets/css/js_composer_tta.min.css?ver=5.1"); ?>' 
      type='text/css' media='all' />


<div class="wpb_column vc_column_container vc_col-sm-12" style="position: relative">
    <div class="wpb_column vc_column_container vc_col-sm-5 tabsaliados">
        <h2>Conoce nuestros aliados</h2>
        <br />
        <div class="vc_tta-container" data-vc-action="collapse">
            <div class="vc_general vc_tta vc_tta-tabs vc_tta-shape-square vc_tta-spacing-1 vc_tta-o-no-fill vc_tta-tabs-position-top vc_tta-controls-align-left">
                <div class="vc_tta-tabs-container">
                    <ul class="vc_tta-tabs-list">
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#criaderos" data-vc-tabs="" data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Criaderos</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#comercio" data-vc-tabs="" data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Comercio</span>
                            </a>
                        </li>
                        <li class="vc_tta-tab" data-vc-tab="">
                            <a href="#profesionales" data-vc-tabs="" data-vc-container=".vc_tta">
                                <span class="vc_tta-title-text">Profesionales</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="vc_tta-panels-container">
                    <div class="vc_tta-panels">
                        <!-- BUSCADOR DE CIUDADES -->
                        <div id="searchform" 
                             class="form-search">
                            <label class="hide" for="s"></label>
                            <input type="text" 
                                   name="aliadoSearch" 
                                   id="aliadoSearcch" 
                                   class="search-query" 
                                   placeholder="Ingresa la ciudad o sector para buscar">
                            <button type="submit" class="searchsubmit">
                                <i class="fa fa-search"></i>
                            </button>
                            <span class="error" style="display: none">
                                No se encontraron resultados con ese criterio
                            </span>
                        </div>
                        <!-- FIN DE CIUDADES -->
                        <div class="vc_tta-panel" id="criaderos" data-vc-content=".vc_tta-panel-body">
                            <div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title">
                                    <a href="#criaderos" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                        <span class="vc_tta-title-text">Criaderos</span></a>
                                </h4>
                            </div>
                            <div class="vc_tta-panel-body">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <?php
                                        $_GET['tipo'] = 'CRIADERO';
                                        include dirname(__FILE__) . '/aliados.php';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_tta-panel" id="comercio" data-vc-content=".vc_tta-panel-body">
                            <div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title">
                                    <a href="#comercio" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                        <span class="vc_tta-title-text">Comercio</span>
                                    </a>
                                </h4>
                            </div>
                            <div class="vc_tta-panel-body">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <?php
                                        $_GET['tipo'] = 'COMERCIO';
                                        include dirname(__FILE__) . '/aliados.php';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_tta-panel" id="profesionales" data-vc-content=".vc_tta-panel-body">
                            <div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title">
                                    <a href="#profesionales" data-vc-accordion="" data-vc-container=".vc_tta-container">
                                        <span class="vc_tta-title-text">Profesionales</span>
                                    </a>
                                </h4>
                            </div>
                            <div class="vc_tta-panel-body">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <?php
                                        $_GET['tipo'] = 'PROFESIONALES';
                                        include dirname(__FILE__) . '/aliados.php';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>        
</div>

<script type="text/javascript">

    var map;
    var markers = [];
    var img = 'http://equinetics.com.co/wp-content/uploads/2018/04/FAVICON-EQUINETICS-LOGO.png';

    var infowindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 3.6422921, lng: -77.4705524},
            zoom: 6,
            /*styles: [
                {elementType: 'geometry', stylers: [{color: '#F1F1F1'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#FFFFFF'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#999999'}]},
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#000000'}]
                },
                {
                    featureType: "administrative",
                    elementType: "geometry",
                    stylers: [{"color": "#666666"}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#000000'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#E3E3E3'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#666666'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#FFFFFF'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#FFFFFF'}]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9ca5b3'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#A0A09A'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#FFFFFF'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#f3d19c'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{color: '#D7CFC4'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#D7CFC4'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#A0A09A'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#000000'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#FFFFFF'}]
                }
            ]*/

        });
    }

    function addMarker(location, value) {
        DeleteMarkers();
        marker = new google.maps.Marker({
            position: location,
            icon: img,
            title: value,
            map: map
        });
        markers.push(marker);
        infowindow.open(map, marker);
    }

    function DeleteMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    jQuery(document).ready(function () {

        jQuery('.headingaliado').click(function () {
            var coord = jQuery(this).data('coord');
            var value = jQuery(this).val();
            var res = coord.split(",");
            var koordynaty = [parseFloat(res[0]), parseFloat(res[1])];
            var newMarker = new google.maps.LatLng(parseFloat(res[0]), parseFloat(res[1]));
            infowindow = new google.maps.InfoWindow({
                content: '<div id="content"><h3>' + jQuery(this).data('nombre') + '</h3><p>' +
                        '<br />' + jQuery(this).data('direccion') + '' +
                        '<br />' + jQuery(this).data('telefono') + '' +
                        '<br />' + jQuery(this).data('email') + '</p></div>'
            });
            addMarker(newMarker, value);
        });

        jQuery('.accordion').click(function () {
            this.classList.toggle("active");
            var idAccord = jQuery(this).data('accordion');
            if (jQuery(this).hasClass('active')) {
                jQuery('.panel').hide();
                jQuery('.accordion').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('#' + idAccord).show('slow');
            } else {
                jQuery('#' + idAccord).hide('slow');
            }

        });

        jQuery('.searchsubmit').click(function () {
            var valor = jQuery('#aliadoSearcch').val();
            if (valor !== '') {
                jQuery('button.headingaliado').each(function () {
                    var nombre = jQuery(this).data('nombre');
                    if (nombre.indexOf(valor.toLowerCase()) >= 0) {
                        jQuery(this).show();
                        jQuery('.error').hide();
                    } else {
                        jQuery(this).hide();
                        jQuery('.error').show();
                    }
                });
            } else {
                jQuery('button.headingaliado').show();
                jQuery('.error').hide();
            }

        });

    });

</script>
<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/vc_accordion/vc-accordion.min.js?ver=5.1"); ?>'></script>
<script type='text/javascript' src='<?= plugins_url("js_composer/assets/lib/vc_tabs/vc-tabs.min.js?ver=5.1"); ?>'></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT8zGRY3VHICCuxEetWXc_F-50-o8Vo2Y&callback=initMap"
async defer></script>