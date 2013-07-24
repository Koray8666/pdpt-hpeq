<?php if(!isset($params['filter'])) { ?><dataview> <?php } ?>
<canvas id="chart" width="940" height="390"></canvas>
<script>
var chartData = {
	labels : [
		<?php foreach($res as $res_item): ?>
		<?="\"".$res_item['TIPE_RS']."\", " ?>
		<?php endforeach ?>
	],
	datasets : [
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [
				<?php foreach($res as $res_item): ?>
				<?=$res_item['JUMLAH'].", " ?>
				<?php endforeach ?>
			]
		}
	]
}

var myLine = new Chart(document.getElementById("chart").getContext("2d")).Bar(chartData);
</script>
<h2>Ringkasan Data</h2>
<table border="0">
  <tr>
	<?php foreach($res as $res_item): ?>
    <th><?=$res_item['TIPE_RS'] ?></th>
  	<?php endforeach ?>
  </tr>
  <tr>
    <?php foreach($res as $res_item): ?>
    <td><?=$res_item['JUMLAH'] ?></td>
    <?php endforeach ?>
  </tr>
</table>
<?php if(!isset($params['filter'])) { ?></dataview> <?php } ?>