<div class="vc_row wpb_row vc_row-fluid">
    <div class="vc_container">
        <div class="wpb_column vc_column_container vc_col-sm-12 last-values">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="vc_col-sm-4">
                        <div class="box-sales">
                            <span class="icon-value"><i class="fa fa-dollar"></i></span>
                            <span class="data-value">$<?= number_format($ventasUltimoMes[0]->total_sales, 0, ',', '.'); ?></span>
                            <div class="label-value" 
                                 data-toggle="modal" 
                                 data-target="#myModalMonthly" style="cursor: zoom-in">
                                VENTAS DEL MES
                            </div>
                        </div>
                    </div>
                    <div class="vc_col-sm-4">
                        <div class="box-sales">
                            <span class="icon-value"><i class="fa fa-clock"></i></span>
                            <span class="data-value">$<?= number_format($ventasUltimoAnio[0]->total_sales, 0, ',', '.'); ?></span>
                            <div class="label-value" 
                                 data-toggle="modal" 
                                 data-target="#myModalMonthly" style="cursor: zoom-in">
                                VENTAS DEL ÚLTIMO AÑO
                            </div>
                        </div>
                    </div>
                    <div class="vc_col-sm-4">
                        <div class="box-sales">
                            <span class="icon-value"><i class="fa fa-file-invoice"></i></span>
                            <span class="data-value">$<?= number_format($ventasTotales[0]->total_sales, 0, ',', '.'); ?></span>
                            <div class="label-value" 
                                 data-toggle="modal" 
                                 data-target="#myModalMonthly" style="cursor: zoom-in">
                                VENTAS TOTALES
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="vc_row wpb_row vc_row-fluid reportes" style="background: #f5f5f5 !important; padding-top: 30ox; padding-bottom: 30px;">
    <div class="vc_container">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper graficosReportes" style="margin: 100px 0;">
                    <div class="vc_col-sm-6">
                        <h2 style="color:#be1e2d">Servicios más solicitados</h2>
                        <br />
                        <?php foreach ($round_chart["data"] as $key => $value): ?>
                            <?php
                            $valueGraph[] = [
                                "value" => round($value['total'] * 100 / $round_chart["total"]),
                                "color" => $value['color'],
                                "highlight" => "#3c5ecc",
                                "label" => $key
                            ];
                            ?>
                        <?php endforeach; ?>

                        <div class="vc_chart vc_round-chart wpb_content_element" 
                             data-vc-legend="1" 
                             data-vc-tooltips="1" 
                             data-vc-animation="easeInOutCubic" 
                             data-vc-stroke-color="#ffffff" 
                             data-vc-stroke-width="2" 
                             data-vc-type="pie" 
                             data-vc-values="<?= htmlentities(json_encode($valueGraph)); ?>">

                            <div class="wpb_wrapper">
                                <div class="vc_chart-with-legend">
                                    <canvas class="vc_round-chart-canvas" width="158" height="158" style="width: 158px; height: 158px;"></canvas>
                                </div>
                                <ul class="vc_chart-legend">
                                    <?php foreach ($round_chart["data"] as $key => $value): ?>
                                        <li>
                                            <span style="background-color:<?= $value['color']; ?>"></span><?= $key ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="vc_col-sm-6">
                        <h2 style="color: #be1e2d">Total de ventas en el año</h2>
                        <br />
                        <div class="vc_chart vc_line-chart wpb_content_element" 
                             data-vc-legend="1" 
                             data-vc-tooltips="1" 
                             data-vc-animation="easeInOutCubic" 
                             data-vc-type="line" 
                             data-vc-values="<?= htmlentities(json_encode($trend_graph["data"])); ?>">
                            <div class="wpb_wrapper">
                                <div class="vc_chart-with-legend">
                                    <canvas class="vc_line-chart-canvas" width="197" height="197" style="width: 197px; height: 197px;"></canvas>
                                </div>
                                <ul class="vc_chart-legend">
                                    <?php foreach ($trend_graph["labels"] as $key => $value): ?>
                                        <li>
                                            <span style="background-color:<?= $value['color']; ?>"></span><?= $key ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<div class="vc_col-sm-6">
                        <div class="vc_chart vc_line-chart wpb_content_element" 
                             data-vc-legend="1" 
                             data-vc-tooltips="1" 
                             data-vc-animation="easeInOutCubic" 
                             data-vc-type="bar" 
                             data-vc-values="<?php //= htmlentities(json_encode($bar_graph["data"]));   ?>">

                            <div class="wpb_wrapper">
                                <div class="vc_chart-with-legend">
                                    <canvas class="vc_line-chart-canvas" width="400" height="197" style="width: 197px; height: 197px;"></canvas>
                                </div>
                                <ul class="vc_chart-legend">
                    <?php // foreach ($bar_graph["labels"] as $key => $value): ?>
                                        <li>
                                            <span style="background-color:<?php //= $value['color'];   ?>"></span><?php //= $key   ?>
                                        </li>
                    <?php // endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" 
     id="myModalMonthly" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title text-center" id="myModalLabel">
                    <i class="fa fa-dollar"></i>Ventas mensuales
                </h3>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-condensed table-striped">
                    <tr>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                    <?php foreach ($monthlySales as $sales): ?>
                        <tr>
                            <td><?= $sales->name ?></td>
                            <td><?= substr($sales->fecha, 0, 10); ?></td>
                            <td class="text-center"><?= $sales->total ?></td>
                            <td>$<?= number_format($sales->total_sales, 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= plugins_url('js_composer/assets/lib/waypoints/waypoints.min.js') ?>"></script>
<script type="text/javascript" src="<?= plugins_url('js_composer/assets/lib/bower/progress-circle/ProgressCircle.min.js') ?>"></script>
<script type="text/javascript" src="<?= plugins_url('js_composer/assets/lib/vc_chart/jquery.vc_chart.min.js') ?>"></script>
<script type="text/javascript" src="<?= plugins_url('reports-equinetics/includes/views/assets/js/Chart.js') ?>"></script>
<script type="text/javascript" src="<?= plugins_url('js_composer/assets/lib/vc_line_chart/vc_line_chart.min.js') ?>"></script>
<script type="text/javascript" src="<?= plugins_url('js_composer/assets/lib/vc_round_chart/vc_round_chart.min.js') ?>"></script>