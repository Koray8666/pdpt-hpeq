<?php if(!isset($params['filter'])) { ?>
<dataview>
<?php } ?>
<a onclick="initField('graph')"><div class="pretitle">
  Grafik<img src="<?=base_url() ?>resource/images/expand.png" for="graph" collapsed="true" width="16" align="right" />
</div></a>
<div id="graph" class="accord">
<canvas id="chart" width="790" height="300"></canvas>
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
				<?=$res_item['R'].", " ?>
				<?php endforeach ?>
			]
		},
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : [
				<?php foreach($res as $res_item): ?>
				<?=$res_item['N'].", " ?>
				<?php endforeach ?>
			]
		}
	]
}

var myLine = new Chart(document.getElementById("chart").getContext("2d")).Bar(chartData);
</script>
<h2>Legenda:<span style="font-size:14px; margin-left:10px;">
<img src="<?=base_url() ?>resource/images/lgdblue.png" class="legend" />Reguler&ensp;
<img src="<?=base_url() ?>resource/images/lgdgray.png" class="legend" />Non-Reguler</span></h2>
</div>
<?php
$rratio = ($res_item['R'] / ($res_item['R'] + $res_item['N'])) * 100;
$rratio = explode(".", $rratio);
$nratio = 100 - $rratio[0];
?>
<a onclick="initField('dataview')"><div class="pretitle">
  Ringkasan Data<img src="<?=base_url() ?>resource/images/collapse.png" for="dataview" collapsed="false" width="16" align="right" />
</div></a>
<div id="dataview" class="accord" style="display:block">
  <div class="summary">
    <p>Rasio Pemilihan Kelas Tahun <?=$res_item['TAHUN'] ?></p>
    <span class="summarytext">R<?=$rratio[0] ?>:N<?=$nratio ?></span>
  </div>
  <div class="clear"></div>
  <p><a href="#">Lihat Detail Data</a></p>
</div>
<?php if(!isset($params['filter'])) { ?></dataview></div> <?php } ?>