<?php if(!isset($params['filter'])) { ?><dataview> <?php } ?>
<div style="min-width:940px">
<div style="width:790px; float:left;">
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
<div style="width:150px; float:left;">
<h2>Ringkasan Data</h2>
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
</div>
<?php if(!isset($params['filter'])) { ?></dataview> <?php } ?>