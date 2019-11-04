<div class="div-rating" id="div-rating">
    <h2>Calificación de clientes y usuarios</h2>


    <?php foreach ($bars as $key => $value) : ?>
        <?php
        $promedio = $value / $totalVotes;
        $widthBar = $promedio * 100 / 5;
        ?>

        <div class="full-bar-rating">
            <div class="label-rating">
                <span><?= $key; ?></span>
                <span class="badge"><?= $value / $totalVotes; ?></span>
            </div>
            <div class="full-bar-progress-rating">
                <div class="prebar-progress-rating" style="width: <?= $widthBar; ?>%;">
                </div>
            </div>
        </div>

        <style>
            @keyframes slideInFromRight {
                from { width: 0%; }
                to   { width: <?= $widthBar; ?>; }
            }​
        </style>

    <?php endforeach; ?>

    <div style="">(<?= $totalVotes; ?>) usuarios calificadores</div>


</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        var ventana_ancho = jQuery(window).width();
        if (ventana_ancho <= 768) {
            var positionBar = 950;
        } else {
            var positionBar = 200;
        }

        jQuery(document).scroll(function () {
            if (jQuery(this).scrollTop() > positionBar) {
                jQuery(".prebar-progress-rating").addClass("bar-progress-rating slideInFromRight");
            } else {
                jQuery(".prebar-progress-rating").removeClass("bar-progress-rating slideInFromRight");
            }
        });
    });
</script>