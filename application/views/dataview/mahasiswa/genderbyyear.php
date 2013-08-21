<?php if(!isset($params['filter'])) { ?><dataview><?php } ?>
<a onclick="initField('graph')"><div class="pretitle">
  Grafik<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" />
</div></a>
<div id="graph" class="accord">
<canvas id="chart" width="790" height="300"></canvas>
<?php if(empty($res)): ?>
<p style="text-align:center; z-index:7; position:relative; top:-200px;">Query tidak menghasilkan data</p>
<?php endif ?>
<script>
var chartData = {
	labels : [
		<?php foreach($res as $res_item): ?>
		<?="\"".$res_item['TAHUN']."\", " ?>
		<?php endforeach ?>
	],
	datasets : [
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [
				<?php foreach($res as $res_item): ?>
				<?=$res_item['L'].", " ?>
				<?php endforeach ?>
			]
		},
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : [
				<?php foreach($res as $res_item): ?>
				<?=$res_item['P'].", " ?>
				<?php endforeach ?>
			]
		}
	]
}

var myLine = new Chart(document.getElementById("chart").getContext("2d")).Bar(chartData);
</script>
<h2>Legenda:<span style="font-size:14px; margin-left:10px;">
<img src="<?=base_url() ?>resource/images/lgdblue.png" class="legend" />Laki-Laki&ensp;
<img src="<?=base_url() ?>resource/images/lgdgray.png" class="legend" />Perempuan</span>
</h2>
</div>
<a onclick="initField('dataview')"><div class="pretitle">
  Ringkasan<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" />
</div></a>
<div class="accord" style="display:block">
<?php
	$lratio;
	$pratio;
	$index = 0;
	foreach($res as $res_item) {
		if($index == 0) {
			
		}
		$index++;
	}
?>
  <div class="summary">
    <p>Rasio Laki-Laki Tahun <?=$res_item['TAHUN'] ?></p>
    <span style="font-size:48px"><?php $lratio = ($res_item['L'] / ($res_item['L'] + $res_item['P'])) * 100; $lratio = explode(".", $lratio); echo $lratio[0] ?>%</span>
  </div>
  <div class="summary">
    <p>Rasio Perempuan Tahun <?=$res_item['TAHUN'] ?></p>
    <span style="font-size:48px"><?php $pratio = 100 - $lratio[0]; echo $pratio; ?>%</span>
  </div>
  <div class="clear" style="margin-bottom:20px;"></div>
  <a href="#">Lihat Detail Data</a>
</div>
<?php if(!isset($params['filter'])) { ?></dataview><?php } ?>