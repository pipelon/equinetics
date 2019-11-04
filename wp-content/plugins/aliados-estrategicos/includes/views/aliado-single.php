<?php
$item = aliado_get_aliado($id);
?>
<link type="text/css" rel="stylesheet" href="<?= plugins_url('aliados-estrategicos/includes/views/resources/bootstrap.min.css') ?>">
<div class="wrap">
    <h2>
        <?php _e('Aliados estrat&eacute;gico: ', 'wedevs'); ?> <?= $item->nombre; ?>
        <a href="<?php echo admin_url('admin.php?page=aliados&action=list'); ?>" class="add-new-h2 pull-right">
            <?php _e('Volver', 'wedevs'); ?>
        </a>
    </h2>

    <table class="table table-striped table-bordered" style="margin-top: 30px;">
        <tr>
            <th>id</th>
            <td>
                <?= $item->id; ?>
                <a href="<?php echo admin_url('admin.php?page=aliados&action=edit&id=' . $item->id); ?>" class="add-new-h2 pull-right">
                    <?php _e('Editar', 'wedevs'); ?>
                </a>
            </td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td><?= $item->tipo; ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= $item->nombre; ?></td>
        </tr>
        <tr>
            <th>URL Sitio Web</th>
            <td><?= $item->url; ?></td>
        </tr>
        <tr>
            <th>Descripci&oacute;n corta</th>
            <td><?= $item->descripcion_corta; ?></td>
        </tr>
        <tr>
            <th>Descripci&oacute;n larga</th>
            <td><?= $item->descripcion_larga; ?></td>
        </tr>
        <tr>
            <th>Tel&eacute;fono</th>
            <td><?= $item->telefono; ?></td>
        </tr>
        <tr>
            <th>Correo Electr&oacute;nico</th>
            <td><?= $item->email; ?></td>
        </tr>
        <tr>
            <th>Direcci&oacute;n</th>
            <td><?= $item->direccion; ?></td>
        </tr>
        <tr>
            <th>Latitud</th>
            <td><?= $item->latitud; ?></td>
        </tr>
        <tr>
            <th>Longitud</th>
            <td><?= $item->longitud; ?></td>
        </tr>
        <tr>
            <th>Logo o Imagen</th>
            <td>
                <?php if (empty($item->logo_imagen)) : ?>
                    <img src="<?= plugins_url("aliados-estrategicos/includes/views/resources/sin-imagen.png"); ?>" alt="Logo" style="width: 150px; border: 1px solid #ccc; padding: 5px;" />
                <?php else : ?>
                    <img src="<?= $item->logo_imagen; ?>" alt="Logo" style="width: 150px; border: 1px solid #ccc; padding: 5px;" />
                <?php endif; ?>

            </td>
        </tr>
    </table>
</div>
