<?php if(!isset($params['filter'])) { ?><dataview><?php } ?>
<a onclick="initField('graph')"><div class="pretitle">
  Grafik<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" />
</div></a>
<div id="graph" class="accord" style="display:block">
<canvas id="chart" width="780" height="390"></canvas>
<script>
var chartData = {
	labels : [
		<?php foreach($res as $res_item): ?>
		<?="\"".$res_item['TAHUN_MASUK']."\", " ?>
		<?php endforeach ?>
	],
	datasets : [
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [
				<?php foreach($res as $res_item): ?>
				<?=$res_item['JML_MAHASISWA'].", " ?>
				<?php endforeach ?>
			]
		}
	]
}

var myLine = new Chart(document.getElementById("chart").getContext("2d")).Line(chartData);
</script>
</div>
<a onclick="initField('dataview')"><div class="pretitle">
  Ringkasan Data<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" />
</div></a>
<div id="dataview" class="accord">
<table border="0">
  <tr><th>Tahun Masuk</th><th>Jumlah Mhs</th></tr>
  <?php foreach($res as $res_item): ?>
  <tr>
    <td><?=$res_item['TAHUN_MASUK'] ?></td>
    <td><?=$res_item['JML_MAHASISWA'] ?></td>
  </tr>
  <?php endforeach ?>
</table>
</div>
<?php if(!isset($params['filter'])) { ?></dataview><?php } ?>