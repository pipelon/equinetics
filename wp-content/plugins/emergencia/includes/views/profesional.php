<link type="text/css" rel="stylesheet" href="<?= plugins_url('emergencia/includes/views/resources/bootstrap.css') ?>">
<script type="text/javascript" src="<?= plugins_url('emergencia/includes/views/resources/jquery.validate.min.js') ?>"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


<script src="https://www.google.com/recaptcha/api.js"></script>

<?php
$privkey = '6Len8YcUAAAAALO4sxEyxjFrLJYCHgIWV9vCwJn2';
$pubkey = '6Len8YcUAAAAAFLX8S4kc1xV58JDdRPEmpBu569U';

if (isset($_POST['formIsEmergency'])) {

    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

        //VALIDO EL CAPTCHA
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' .
                $privkey
                . '&response=' .
                $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        if ($responseData->success) {
            $nombre = isset($_POST['nombre']) ? sanitize_text_field($_POST['nombre']) : '';
            $direccion = isset($_POST['direccion']) ? sanitize_text_field($_POST['direccion']) : '';
            $correo = isset($_POST['email']) ? sanitize_text_field($_POST['email']) : '';
            $celular = isset($_POST['celular']) ? sanitize_text_field($_POST['celular']) : '';
            $mensaje = isset($_POST['mensaje']) ? sanitize_text_field($_POST['mensaje']) : '';
            $typeemergency = isset($_POST['typeemergency']) ? sanitize_text_field($_POST['typeemergency']) : '';

            //BUSCO LOS PROFESIONALES ACTIVOS
            $profesionales = profesional_get_actived_profesional();
            $correos = $celulares = [];
            foreach ($profesionales as $profesional) {
                $correos[] = $profesional->correo;
                $celulares[] = $profesional->celular;
            }

            //ARMO EL MENSAJE
            $subject = "Emergencia veterinaria desde Equinetics.com.co";
            $message = "Un usuario requiere un profesional para resolver un emergencia veterinaria. <br />";
            $message .= "<br />Nombre: " . $nombre;
            $message .= "<br />Dirección: " . $direccion;
            $message .= "<br />Correo electrónico: " . $correo;
            $message .= "<br />Celular: " . $celular;
            $message .= "<br />Tipo de Emergencia: " . $typeemergency;
            $message .= "<br />Descripción de la emergencia: " . $mensaje;
            $message .= "<br /><br />Póngase en contacto con el usuario si desea atender la emergencia.";
            $headers[] = 'From: Felipe Jaramillo <fjaramillo@equinetics.com.co>';
            $headers[] = 'Content-Type: text/html; charset=UTF-8';

            $sent = wp_mail(implode(",", $correos), $subject, $message, $headers);
            if ($sent) {
                echo "<script type='text/javascript'>jQuery.alert({
                type: 'green',
                title: '¡Éxito!',
                content: 'Su mensaje ha sido enviado con éxito. En breve uno de nuestro profesionales se estará comunicando con usted!',
                });
             </script>";
            }//mail sent!
            else {
                echo "<script type='text/javascript'>jQuery.alert({
                type: 'red',
                typeAnimated: true,
                title: '¡Advertencia!',
                content: 'El mensaje no pudo ser enviado. Por favor, inténtelo de nuevo más tarde!',
                });
             </script>";
            }
        } else {
            echo "<script type='text/javascript'>jQuery.alert({
                type: 'red',
                typeAnimated: true,
                title: '¡Advertencia!',
                content: 'Lo sentimos, el código de verificación no se ha introducido correctamente. Inténtalo de nuevo.',
                });
             </script>";
        }
    } else {
        echo "<script type='text/javascript'>jQuery.alert({
                type: 'red',
                typeAnimated: true,
                title: '¡Advertencia!',
                content: 'Por favor, valida que no eres un robot.',
                });
             </script>";
    }
}
?>
<div class="emergencia" data-toggle="modal" data-target="#myModal"  >
    <img src="<?= plugins_url("emergencia/includes/views/resources/Call.gif"); ?>" />
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel">
                    <i class="fa fa-plus icon-emergency"></i>Emergencia veterinaria
                </h3>
            </div>

            <div class="modal-body">


                <label class="text-center" style="width: 100%">Seleccione una emergencia</label>
                <div class="row servicios">
                    <div class="col-md-3 col-xs-3">
                        <img src="<?= plugins_url("emergencia/includes/views/resources/doctor-icon-150x150.png"); ?>" 
                             data-toggle="tooltip" data-placement="top" title="Parto"
                             data-servicio="Parto" />
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <img src="<?= plugins_url("emergencia/includes/views/resources/hospital-icon-150x150.png"); ?>" 
                             data-toggle="tooltip" data-placement="top" title="Enfermedad general"
                             data-servicio="Enfermedad general" />
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <img src="<?= plugins_url("emergencia/includes/views/resources/teeth-icon-150x150.png"); ?>"
                             data-toggle="tooltip" data-placement="top" title="Odontología"
                             data-servicio="Odontología" />
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <img src="<?= plugins_url("emergencia/includes/views/resources/tablets-icon-150x150.png"); ?>" 
                             data-toggle="tooltip" data-placement="top" title="Ortopedia"
                             data-servicio="Ortopedia" />
                    </div>
                </div>

                <form id="newModalForm" method="POST">
                    <div class="form-group">
                        <label class="control-label" for="typeemergency">Tipo de emergencia</label>
                        <input type="text" class="form-control" 
                               id="typeemergency" 
                               name="typeemergency" 
                               placeholder="Tipo de emergencia"
                               readonly="readonly" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="mensaje">Descripción de la emergencia</label>
                        <textarea name="mensaje" 
                                  id="mensaje" 
                                  class="form-control"
                                  placeholder="Escriba una breve descripción del problema que presenta el Caballo"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nombre">Nombre</label>
                        <input type="text" class="form-control" 
                               id="nombre" 
                               name="nombre" 
                               value="<?= isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : ''; ?>"
                               placeholder="Nombre de contacto" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="direccion">Lugar</label>
                        <input type="text" class="form-control" 
                               id="direccion" 
                               name="direccion" 
                               value="<?= isset($_POST['direccion']) && !empty($_POST['direccion']) ? $_POST['direccion'] : ''; ?>"
                               placeholder="Dirección donde sucede la emergencia" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="celular">Celular</label>
                        <input type="text" class="form-control" 
                               id="celular" 
                               name="celular"
                               value="<?= isset($_POST['celular']) && !empty($_POST['celular']) ? $_POST['celular'] : ''; ?>"
                               placeholder="N&uacute;mero de celular de contacto" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Correo electr&oacute;nico</label>
                        <input type="email" class="form-control" 
                               id="email" 
                               name="email" 
                               value="<?= isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : ''; ?>"
                               placeholder="Correo electr&oacute;nico" />
                    </div>     
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="<?= $pubkey; ?>"></div>
                    </div> 
                    <div class="modal-footer">
                        <button type="submit" class="btn" id="btnSaveIt">Contactar</button>
                        <button type="button" class="btn btn-default" id="btnCloseIt" data-dismiss="modal">Close</button>
                        <input type="hidden" name="formIsEmergency" />
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">



    jQuery(document).ready(function () {

        jQuery('[data-toggle="tooltip"]').tooltip();

        jQuery(".servicios div img").click(function () {
            jQuery("#typeemergency").val(jQuery(this).data('servicio'));
        });

        jQuery("#newModalForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                direccion: {
                    required: true
                },
                celular: {
                    required: true
                },
                email: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "Debe ingresar un nombre de contacto."
                },
                direccion: {
                    required: "Debe ingresar una dirección."
                },
                celular: {
                    required: "Debe ingresar un número de celular."
                },
                email: {
                    required: "Debe ingresar un correo electronico.",
                    email: "Escriba un correo electrónico válido."
                }
            },
            highlight: function (element) {
                jQuery(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                jQuery(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });


        jQuery(".emergencia").tooltip({
            html: true,
            title: '<p class="text-center">Si tienes una emergencia Equina, no dudes en contactarnos y\n\
                     te asignaremos unos de nuestros profesionales para que atiend tu caso.</p>',
            placement: 'left',
            trigger: 'hover'
        });
    });

</script>