<div class="wrap">
    <h1>
        <?php _e( 'Agregar nuevo Profesional', 'wedevs' ); ?>
        <a href="<?php echo admin_url('admin.php?page=profesionales&action=list'); ?>" class="add-new-h2 pull-right">
            <?php _e('Volver', 'wedevs'); ?>
        </a>
    </h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-nombre">
                    <th scope="row">
                        <label for="nombre"><?php _e( 'Nombre', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="nombre" id="nombre" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-direccion">
                    <th scope="row">
                        <label for="direccion"><?php _e( 'Dirección', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="direccion" id="direccion" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-correo">
                    <th scope="row">
                        <label for="correo"><?php _e( 'Correo Electrónico', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="correo" id="correo" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-celular">
                    <th scope="row">
                        <label for="celular"><?php _e( 'Celular', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="celular" id="celular" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-profesion">
                    <th scope="row">
                        <label for="profesion"><?php _e( 'Profesión', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="profesion" id="profesion" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-logo-imagen">
                    <th scope="row">
                        <label for="logo_imagen"><?php _e('Logo o imagen', 'wedevs'); ?></label>
                    </th>
                    <td>
                        <?php wp_enqueue_media(); ?>
                        <div class='image-preview-wrapper'>
                            <img id='image-preview' src='<?= plugins_url("emergencia/includes/views/resources/sin-imagen.png"); ?>' width='200'>
                        </div>
                        <br />
                        <input id="upload_image_button" type="button" class="button" value="<?php _e('Subir imagen'); ?>" />
                        <input type='hidden' name='logo_imagen' id='logo_imagen' value=''> 
                    </td>
                </tr>
                <tr class="row-activo">
                    <th scope="row">
                        <label for="activo"><?php _e( 'Activo', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <select name="activo" id="activo" required="required">
                            <option value="1"><?php echo __( 'SI,', 'wedevs' ); ?></option>
                            <option value="0"><?php echo __( 'NO', 'wedevs' ); ?></option>
                        </select>
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field( 'profesional-new' ); ?>
        <?php submit_button( __( 'Crear Profesional', 'wedevs' ), 'primary', 'submit_profesional' ); ?>

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