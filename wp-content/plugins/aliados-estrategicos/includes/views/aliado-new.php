<div class="wrap">
    <h1>
        <?php _e('Aliados estrat&eacute;gicos', 'wedevs'); ?>
        <a href="<?php echo admin_url('admin.php?page=aliados&action=list'); ?>" class="add-new-h2 pull-right">
            <?php _e('Volver', 'wedevs'); ?>
        </a>
    </h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-tipo">
                    <th scope="row">
                        <label for="tipo"><?php _e('Tipo', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <select name="tipo" id="tipo" class="regular-text">
                            <option value="CRIADERO">CRIADERO</option>
                            <option value="COMERCIO">COMERCIO</option>
                            <option value="PROFESIONALES">PROFESIONALES</option>
                        </select>                        
                    </td>
                </tr>
                <tr class="row-nombre">
                    <th scope="row">
                        <label for="nombre"><?php _e('Nombre', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="nombre" id="nombre" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-url">
                    <th scope="row">
                        <label for="url"><?php _e('URL Sitio web', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="url" id="url" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-descripcion-corta">
                    <th scope="row">
                        <label for="descripcion_corta"><?php _e('Descripci&oacute;n corta', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="descripcion_corta" id="descripcion_corta" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-descripcion-larga">
                    <th scope="row">
                        <label for="descripcion_larga"><?php _e('Descripci&oacute;n larga', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <textarea name="descripcion_larga" id="descripcion_larga"placeholder="<?php echo esc_attr('', 'wedevs'); ?>" rows="5" cols="30" required="required"></textarea>
                    </td>
                </tr>
                <tr class="row-telefono">
                    <th scope="row">
                        <label for="telefono"><?php _e('Tel&eacute;fono', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="telefono" id="telefono" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-email">
                    <th scope="row">
                        <label for="email"><?php _e('Correo electr&oacute;nico', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="email" id="email" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-direccion">
                    <th scope="row">
                        <label for="direccion"><?php _e('Direcci&oacute;n', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="direccion" id="direccion" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-latitud">
                    <th scope="row">
                        <label for="latitud"><?php _e('Latitud', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="latitud" id="latitud" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-longitud">
                    <th scope="row">
                        <label for="longitud"><?php _e('Longitud', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="longitud" id="longitud" class="regular-text" placeholder="<?php echo esc_attr('', 'wedevs'); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-logo-imagen">
                    <th scope="row">
                        <label for="logo_imagen"><?php _e('Logo o imagen', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <?php wp_enqueue_media(); ?>
                        <div class='image-preview-wrapper'>
                            <img id='image-preview' src='<?= plugins_url("aliados-estrategicos/includes/views/resources/sin-imagen.png"); ?>' width='200'>
                        </div>
                        <br />
                        <input id="upload_image_button" type="button" class="button" value="<?php _e('Subir imagen'); ?>" />
                        <input type='hidden' name='logo_imagen' id='logo_imagen' value=''> 
                    </td>
                </tr>
            </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field('aliado-new'); ?>
        <?php submit_button(__('Crear Aliado', 'wedevs'), 'primary', 'submit_aliado'); ?>

    </form>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        // Uploading files
        var file_frame;
        var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
        var set_to_post_id = '<?php echo $my_saved_attachment_post_id; ?>'; // Set this
        jQuery('#upload_image_button').on('click', function (event) {
            event.preventDefault();
            // If the media frame already exists, reopen it.
            if (file_frame) {
                // Set the post ID to what we want
                file_frame.uploader.uploader.param('post_id', set_to_post_id);
                // Open frame
                file_frame.open();
                return;
            } else {
                // Set the wp.media post id so the uploader grabs the ID we want when initialised
                wp.media.model.settings.post.id = set_to_post_id;
            }
            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: 'Select a image to upload',
                button: {
                    text: 'Use this image',
                },
                multiple: false	// Set to true to allow multiple files to be selected
            });
            // When an image is selected, run a callback.
            file_frame.on('select', function () {
                // We set multiple to false so only get one image from the uploader
                attachment = file_frame.state().get('selection').first().toJSON();
                // Do something with attachment.id and/or attachment.url here
                $('#image-preview').attr('src', attachment.url).css('width', '100px');
                $('#logo_imagen').val(attachment.url);
                // Restore the main post ID
                wp.media.model.settings.post.id = wp_media_post_id;
            });
            // Finally, open the modal
            file_frame.open();
        });
        // Restore the main ID when the add media button is pressed
        jQuery('a.add_media').on('click', function () {
            wp.media.model.settings.post.id = wp_media_post_id;
        });
    });
</script>