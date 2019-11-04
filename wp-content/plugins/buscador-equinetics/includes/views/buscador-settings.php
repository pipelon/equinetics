<?php
$settings =  Buscador_equinetics()->get_settings();
?>
<div class="wrap">
    <h1>
        <?php _e('Buscador Equinetics', 'BcdEqntcs'); ?>
    </h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-search_field_text">
                    <th scope="row">
                        <label for="search_field_text" title="Texto para el botón buscar."><?php _e('Texto para el botón buscar', 'BcdEqntcs'); ?></label>
                    </th>
                    <td>
                        <input type="text" 
                               name="search_field_text" 
                               id="search_field_text" 
                               class="regular-text" 
                               placeholder="Texto para el botón buscar." 
                               value="<?= $settings["search_field_text"]; ?>" 
                               required="required" />
                    </td>
                </tr>                
                <tr class="row-result_per_page">
                    <th scope="row">
                        <label for="result_per_page" title="Resultado por página."><?php _e('Resultado por página', 'BcdEqntcs'); ?></label>
                    </th>
                    <td>
                        <input type="number" 
                               name="result_per_page" 
                               id="result_per_page" 
                               class="regular-text" 
                               placeholder="Resultado por página." 
                               value="<?= $settings["result_per_page"]; ?>" 
                               required="required" />
                    </td>
                </tr>                
            </tbody>
        </table>

        <?php wp_nonce_field('profesional-new'); ?>
        <?php submit_button(__('Guardar Configuración', 'BcdEqntcs'), 'primary', 'submit_settings'); ?>

    </form>
</div>