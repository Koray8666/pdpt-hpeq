<?php if(!isset($params['filter'])) { ?><dataview><?php } ?>
<a onclick="initField('graph')"><div class="pretitle">
  Grafik<img src="<?=base_url() ?>resource/images/expand.png" for="graph" collapsed="true" width="16" align="right" />
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
  Ringkasan<img src="<?=base_url() ?>resource/images/collapse.png" for="dataview" collapsed="false" width="16" align="right" />
</div></a>
<div id="dataview" class="accord" style="display:block">
<?php
	$peak_l = array("h"=>"0", "h_y"=>0);
	$peak_p = array("h"=>"0", "h_y"=>0);
	$index = 0;
	foreach($res as $res_item) {
		$l_ratio = ($res_item['L'] / ($res_item['L'] + $res_item['P'])) * 100;
		$p_ratio = ($res_item['P'] / ($res_item['L'] + $res_item['P'])) * 100;
		if($l_ratio > $peak_l["h"]) { $peak_l["h"] = $l_ratio; $peak_l["h_y"] = $res_item["TAHUN"]; }
		if($p_ratio > $peak_p["h"]) { $peak_p["h"] = $p_ratio; $peak_p["h_y"] = $res_item["TAHUN"]; }
		$index++;
	}
	$peak_l["h"] = explode(".", $peak_l["h"]);
	$peak_p["h"] = explode(".", $peak_p["h"]);
?>
  <div class="summary">
    <p>Rasio Jenis Kelamin Tahun <?=$res_item['TAHUN'] ?></p>
    <span style="font-size:48px">L<?php $lratio = ($res_item['L'] / ($res_item['L'] + $res_item['P'])) * 100; $lratio = explode(".", $lratio); echo $lratio[0] ?>:P<?php $pratio = 100 - $lratio[0]; echo $pratio; ?></span>
  </div>
  <div class="summary">
    <p>Rasio Mhs <strong>Laki-Laki</strong> Tertinggi</p>
    <span class="summarytext"><?=$peak_l["h"][0] ?>.<?php if(isset($peak_l["h"][1])) echo substr($peak_l["h"][1], 0, 2); else echo "0" ?>%</span>
    <p>Tahun <?=$peak_l["h_y"] ?></p>
  </div>
  <div class="summary">
    <p>Rasio Mhs <strong>Perempuan</strong> Tertinggi</p>
    <span class="summarytext"><?=$peak_p["h"][0] ?>.<?php if(isset($peak_p["h"][1])) echo substr($peak_p["h"][1], 0, 2); else echo "0" ?>%</span>
    <p>Tahun <?=$peak_p["h_y"] ?></p>
  </div>
  <div class="clear"></div>
  <a href="#">Lihat Detail Data</a>
</div>
<?php if(!isset($params['filter'])) { ?></dataview><?php } ?>