<?php $aliados = aliado_get_all_aliado(['tipo' => $_GET['tipo']]); ?>

<?php foreach ($aliados as $aliado) : ?>
    <button class="accordion headingaliado" 
            data-accordion="accordion-<?= $aliado->id; ?>"
            data-coord="<?= $aliado->latitud; ?>,<?= $aliado->longitud; ?>"
            data-nombre="<?= strtolower($aliado->nombre); ?>"
            data-direccion="<?= $aliado->direccion; ?>"
            data-email="<?= $aliado->email; ?>"
            data-telefono="<?= $aliado->telefono; ?>">
                <?= $aliado->nombre; ?>
    </button>
    <div class="panel" id="accordion-<?= $aliado->id; ?>">
        <p style="text-align: center">
            <?php if (empty($aliado->logo_imagen)) : ?>
                <img src="<?= plugins_url("aliados-estrategicos/includes/views/resources/sin-imagen.png"); ?>" alt="Logo" style="height: 150px; border: 1px solid #ccc; padding: 5px;" />
            <?php else : ?>
                <img src="<?= $aliado->logo_imagen; ?>" alt="Logo" style="height: 150px; border: 1px solid #ccc; padding: 5px;" />
            <?php endif; ?>

        </p>
        <p>
            <?= $aliado->descripcion_larga; ?>
        </p>
        <address>
            <b>Direcci&oacute;n: </b> <?= $aliado->direccion; ?><br/>
            <b>Tel&eacute;fono: </b> <?= $aliado->telefono; ?><br/>
            <b>Correo Electr&oacute;nico: </b> <?= $aliado->email; ?><br/>
            <b>URL: </b> <?= $aliado->url; ?><br/>
        </address>
    </div>
<?php endforeach; ?>