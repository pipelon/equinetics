<?php
$item = profesional_get_profesional($id);
?>
<link type="text/css" rel="stylesheet" href="<?= plugins_url('emergencia/includes/views/resources/bootstrap.min.css') ?>">
<div class="wrap">
    <h2>
        <?php _e('Nuestros Profesionales: ', 'wedevs'); ?> <?= $item->nombre; ?>
        <a href="<?php echo admin_url('admin.php?page=profesionless&action=list'); ?>" class="add-new-h2 pull-right">
            <?php _e('Volver', 'wedevs'); ?>
        </a>
    </h2>

    <table class="table table-striped table-bordered" style="margin-top: 30px;">
        <tr>
            <th>id</th>
            <td>
                <?= $item->id; ?>
                <a href="<?php echo admin_url('admin.php?page=profesionales&action=edit&id=' . $item->id); ?>" class="add-new-h2 pull-right">
                    <?php _e('Editar', 'wedevs'); ?>
                </a>
            </td>
        </tr>
        <tr>
            <th>Activo</th>
            <td><?= $item->activo; ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= $item->nombre; ?></td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td><?= $item->direccion; ?></td>
        </tr>
        <tr>
            <th>Correo electrónico</th>
            <td><?= $item->correo; ?></td>
        </tr>
        <tr>
            <th>Celular</th>
            <td><?= $item->celular; ?></td>
        </tr>
        <tr>
            <th>Profesión</th>
            <td><?= $item->profesion; ?></td>
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
