<?php if(!isset($params['filter'])) { ?><dataview><?php } ?>
<a onclick="initField('graph')"><div class="pretitle">
  Grafik<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" />
</div></a>
<div id="graph" class="accord" style="display:block">
<canvas id="chart" width="790" height="390"></canvas>
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
  Ringkasan Data<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" />
</div></a>
<div id="dataview" class="accord">
<table border="0">
  <tr><th>Tahun</th><th>Laki-Laki</th><th>Perempuan</th></tr>
  <?php foreach($res as $res_item): ?>
  <tr>
    <td><?=$res_item['TAHUN'] ?></td>
    <td><?=$res_item['L'] ?></td>
    <td><?=$res_item['P'] ?></td>
  </tr>
  <?php endforeach ?>
</table>
</div>
<?php if(!isset($params['filter'])) { ?></dataview><?php } ?>