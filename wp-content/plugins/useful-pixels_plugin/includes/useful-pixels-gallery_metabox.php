<?php 
/*=== Easy Image Gallery ===
Contributors: sumobi
* http://wordpress.org/plugins/easy-image-gallery/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

 */

function horseclub_meta_boxes_gallery() {
        add_meta_box( 'usefulpi_post_gallery', esc_html__('Post Slider Images', 'horseclub' ), 'horseclub_gallery_metabox', 'post', 'normal', 'high' );
        add_meta_box( 'usefulpi_portfolio_gallery', esc_html__('Portfolio Slider Images', 'horseclub' ), 'horseclub_gallery_metabox', 'portfolio', 'normal', 'high' );
        
}
    add_action( 'add_meta_boxes', 'horseclub_meta_boxes_gallery' );

function horseclub_gallery_metabox() {
        global $post; ?>

    <div id="gallery_images_container" class="up_image_gallery">
        <ul class="gallery_images">
            <?php
            $image_gallery = get_post_meta( $post->ID, '_horseclub_image_gallery', true );
            $attachments = array_filter( explode( ',', $image_gallery ) );
             if ( $attachments )
            foreach ( $attachments as $attachment_id ) {
                echo '<li class="image attachment details" data-attachment_id="' . $attachment_id . '"><div class="attachment-preview"><div class="thumbnail">
                            ' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '</div>
                            <a href="#" class="delete check" title="' . esc_html__( 'Remove image', 'horseclub' ) . '"><div class="media-modal-icon"></div></a>
                        </div></li>';
        }
?>
        </ul>
        <input type="hidden" id="image_gallery" name="image_gallery" value="<?php echo esc_attr( $image_gallery ); ?>" />
        <?php wp_nonce_field( 'up_image_gallery', 'up_image_gallery' ); ?>

    </div>

    <p class="add_gallery_images hide-if-no-js">
        <input type="button" class="up_gallery_btn button" value="<?php esc_html_e( 'Add images', 'horseclub' ); ?>">
    </p>
    
  <?php /* Props to WooCommerce for the following JS code */ ?>

    <script type="text/javascript">
        jQuery(document).ready(function($){

              // Uploading files
            var image_gallery_frame;
            var $image_gallery_ids = $('#image_gallery');
            var $gallery_images = $('#gallery_images_container ul.gallery_images');

            jQuery('.add_gallery_images').on( 'click', '.up_gallery_btn', function( event ) {

                var $el = $(this);
                var attachment_ids = $image_gallery_ids.val();

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( image_gallery_frame ) {
                    image_gallery_frame.open();
                    return;
                }

                // Create the media frame.
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: '<?php esc_html_e( 'Add Images to Gallery', 'horseclub' ); ?>',
                    button: {
                        text: '<?php esc_html_e( 'Add to gallery', 'horseclub' ); ?>',
                    },
                    multiple: true
                });

                // When an image is selected, run a callback.
                image_gallery_frame.on( 'select', function() {

                    var selection = image_gallery_frame.state().get('selection');

                    selection.map( function( attachment ) {

                        attachment = attachment.toJSON();

                        if ( attachment.id ) {
                            attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

                             $gallery_images.append('\
                                <li class="image attachment details" data-attachment_id="' + attachment.id + '">\
                                    <div class="attachment-preview">\
                                        <div class="thumbnail">\
                                            <img src="' + attachment.url + '" />\
                                        </div>\
                                       <a href="#" class="delete check" title="<?php esc_html_e( 'Remove image', 'horseclub' ); ?>"><div class="media-modal-icon"></div></a>\
                                    </div>\
                                </li>');

                        }

                    } );

                    $image_gallery_ids.val( attachment_ids );
                });

                // Finally, open the modal.
                image_gallery_frame.open();
            });

            // Image ordering
            $gallery_images.sortable({
                items: 'li.image',
                cursor: 'move',
                scrollSensitivity:40,
                forcePlaceholderSize: true,
                forceHelperSize: false,
                helper: 'clone',
                opacity: 0.65,
                placeholder: 'eig-metabox-sortable-placeholder',
                start:function(event,ui){
                    ui.item.css('background-color','#f6f6f6');
                },
                stop:function(event,ui){
                    ui.item.removeAttr('style');
                },
                update: function(event, ui) {
                    var attachment_ids = '';

                    $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                        var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                        attachment_ids = attachment_ids + attachment_id + ',';
                    });

                    $image_gallery_ids.val( attachment_ids );
                }
            });

            // Remove images
            $('#gallery_images_container').on( 'click', 'a.delete', function() {

                $(this).closest('li.image').remove();

                var attachment_ids = '';

                $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                    var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                    attachment_ids = attachment_ids + attachment_id + ',';
                });

                $image_gallery_ids.val( attachment_ids );

                return false;
            } );

        });
    </script>

    <?php }
function horseclub_image_gallery_save_post( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    $post_types = array ('page', 'post');

    // check user permissions
    if ( isset( $_POST[ 'post_type' ] ) && !array_key_exists( $_POST[ 'post_type' ], $post_types ) ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    }
    else {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }

    if ( ! isset( $_POST[ 'up_image_gallery' ] ) || ! wp_verify_nonce( $_POST[ 'up_image_gallery' ], 'up_image_gallery' ) )
        return;

    if ( isset( $_POST[ 'image_gallery' ] ) && !empty( $_POST[ 'image_gallery' ] ) ) {

        $attachment_ids = sanitize_text_field( $_POST['image_gallery'] );

        // turn comma separated values into array
        $attachment_ids = explode( ',', $attachment_ids );

        // clean the array
        $attachment_ids = array_filter( $attachment_ids  );

        // return back to comma separated list with no trailing comma. This is common when deleting the images
        $attachment_ids =  implode( ',', $attachment_ids );

        update_post_meta( $post_id, '_horseclub_image_gallery', $attachment_ids );
    } else {
        delete_post_meta( $post_id, '_horseclub_image_gallery' );
    }

    do_action( 'horseclub_image_gallery_save_post', $post_id );
}
add_action( 'save_post', 'horseclub_image_gallery_save_post' );

