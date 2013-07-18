<h1>Pemilihan Jenjang Pendidikan Tahun <?=$res['TAHUN'] ?></h1>
<canvas id="chart" width="750" height="400"></canvas>
<dataview>
<script>
var chartData = {
	labels : [
		"S3 (Doktor)",
		"S2 (Master)",
		"S1 (Sarjana)",
		"SP2 (Spesialis 2)",
		"SP1 (Spesialis 1)",
		"D4 (Diploma 4)",
		"D3 (Diploma 3)",
		"D2 (Diploma 2)",
		"D1 (Diploma 1)",
		"Profesi",
	],
	datasets : [
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [
				<?=$res['S3'].", " ?>
				<?=$res['S2'].", " ?>
				<?=$res['S1'].", " ?>
				<?=$res['SP2'].", " ?>
				<?=$res['SP1'].", " ?>
				<?=$res['D4'].", " ?>
				<?=$res['D3'].", " ?>
				<?=$res['D2'].", " ?>
				<?=$res['D1'].", " ?>
				<?=$res['PRO'] ?>
			]
		}
	]
}

var myLine = new Chart(document.getElementById("chart").getContext("2d")).Bar(chartData);
</script>
</dataview>
<div style="width:400px; float:left">
<h2>Persentase</h2>
<canvas id="percent" height="380" width="380"></canvas>
<script>
var doughnutData = [
	{
		value: <?=$res['S3'] ?>,
		color:"#F7464A"
	},
	{
		value : <?=$res['S2'] ?>,
		color : "#46BFBD"
	},
	{
		value : <?=$res['S1'] ?>,
		color : "#FDB45C"
	},
	{
		value : <?=$res['SP2'] ?>,
		color : "#9BD655"
	},
	{
		value : <?=$res['SP1'] ?>,
		color : "#7290D0"
	},
	{
		value: <?=$res['D4'] ?>,
		color:"#C41317"
	},
	{
		value : <?=$res['D3'] ?>,
		color : "#138C8A"
	},
	{
		value : <?=$res['D2'] ?>,
		color : "#CA8129"
	},
	{
		value : <?=$res['D1'] ?>,
		color : "#68A322"
	},
	{
		value : <?=$res['PRO'] ?>,
		color : "#1A2030"
	}
];
var myDoughnut = new Chart(document.getElementById("percent").getContext("2d")).Doughnut(doughnutData);

</script>
</div>
<div style="width:350px; float:left">
<h2>Ringkasan Data</h2>
<table border="0">
  <tr>
    <th>S3</th>
    <th>S2</th>
    <th>S1</th>
    <th>SP2</th>
    <th>SP1</th>
    <th>D4</th>
    <th>D3</th>
    <th>D2</th>
    <th>D1</th>
    <th>Profesi</th>
  </tr>
  <tr>
    <td><?=$res['S3'] ?></td>
	<td><?=$res['S2'] ?></td>
    <td><?=$res['S1'] ?></td>
    <td><?=$res['SP2'] ?></td>
    <td><?=$res['SP1'] ?></td>
    <td><?=$res['D4'] ?></td>
    <td><?=$res['D3'] ?></td>
    <td><?=$res['D2'] ?></td>
    <td><?=$res['D1'] ?></td>
    <td><?=$res['PRO'] ?></td>
  </tr>
  <tr>
    <td><?php $num = explode(".", $prc['S3']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['S2']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['S1']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['SP2']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['SP1']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['D4']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['D3']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['D2']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['D1']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
    <td><?php $num = explode(".", $prc['PRO']); if($num[0] == "") $num[0] = "0"; echo $num[0]."%"; ?></td>
  </tr>
</table>
<h2>Legenda</h2>
<table border="0">
  <tr>
    <td><img src="<?=base_url() ?>resource/images/lgdred.png" class="legend" />S3 (Doktor)</td>
    <td><img src="<?=base_url() ?>resource/images/lgdreddk.png" class="legend" />D4 (Diploma 4)</td>
  </tr>
  <tr>
    <td><img src="<?=base_url() ?>resource/images/lgdturq.png" class="legend" />S2 (Master)</td>
    <td><img src="<?=base_url() ?>resource/images/lgdturqdk.png" class="legend" />D3 (Diploma 3)</td>
  </tr>
  <tr>
    <td><img src="<?=base_url() ?>resource/images/lgdyell.png" class="legend" />S1 (Sarjana)</td>
    <td><img src="<?=base_url() ?>resource/images/lgdyelldk.png" class="legend" />D2 (Diploma 2)</td>
  </tr>
  <tr>
    <td><img src="<?=base_url() ?>resource/images/lgdgree.png" class="legend" />SP2 (Spesialis 2)</td>
    <td><img src="<?=base_url() ?>resource/images/lgdgreedk.png" class="legend" />D1 (Diploma 1)</td>
  </tr>
  <tr>
    <td><img src="<?=base_url() ?>resource/images/lgdblue2.png" class="legend" />SP1 (Spesialis 1)</td>
    <td><img src="<?=base_url() ?>resource/images/lgdbluedk.png" class="legend" />Profesi</td>
  </tr>
</table>
</div>