<style>
:root {
  --size: 150px;
  --bord: 10px;
}

.chart {
  width: var(--size);
  height: var(--size);
  float: left;
  margin: 10px;
  border: var(--bord) solid transparent;
  border-radius: 50%;
  background: linear-gradient(white, white) padding-box, conic-gradient(#BE1E2D var(--value), lightgrey var(--value)) border-box;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2em;
}

.chart .tituVar,
.chart .subtituVaR{
  font-size: 20px;
  display: block;
  text-align: center;
  text-transform: capitalize;
}
.tituVar{    
    font-weight: bold;
    line-height: 0.5;    
}
.subtituVaR{
  
}

.x-66 {
  --value: 60%;
}

.x-20 {
  --value: 20%;
}
</style>

<div style="width: 100%; float: left">
    <?php $variables = get_post_meta($atts['horseid']);?>

    <?php foreach($variables as $key => $value) :?>
        <?php if(substr($key, 0, 8) === "varsara_") : ;?>
          <?php $temp = explode("_", substr($key, 8)); ?>
          <?php $vChart = floor(((int)$value[0]*100)/3); ?>
          <div class="chart" style="--value: <?= $vChart; ?>%" >
              <p>
                  <span class="tituVar"><?= $temp[0]; ?></span>
                  <span class="subtituVaR"><?= $temp[1]; ?></span>
              </p>
          </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>