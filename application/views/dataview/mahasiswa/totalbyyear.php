<?php if(!isset($params['filter'])) { ?><dataview><?php } ?>
<a onclick="initField('graph')"><div class="pretitle">
  Grafik<img src="<?=base_url() ?>resource/images/expand.png" for="graph" collapsed="true" width="16" align="right" />
</div></a>
<div id="graph" class="accord">
<canvas id="chart" width="780" height="300"></canvas>
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
  Ringkasan<img src="<?=base_url() ?>resource/images/collapse.png" for="dataview" collapsed="false" width="16" align="right" />
</div></a>
<div id="dataview" class="accord" style="display:block">
<?php
	$hpeak = 0;
	$lpeak = 0;
	$index = 0;
	$sum = 0;
	foreach($res as $res_item) {
		if($res_item['JML_MAHASISWA'] > $hpeak) {
			$hpeak_y = $res_item['TAHUN_MASUK'];
			$hpeak = $res_item['JML_MAHASISWA'];
		}
		if($res_item['JML_MAHASISWA'] < $lpeak || $lpeak == 0) {
			$lpeak = $res_item['JML_MAHASISWA'];
			$lpeak_y = $res_item['TAHUN_MASUK'];
		}
		$sum = $sum + $res_item['JML_MAHASISWA'];
		$index++;
	}
	if($index > 0) {
		$average = $sum / ($index + 1);
		$average = explode(".", $average);
	}
?>
  <div class="summary">
    <p>Mahasiswa Masuk PT Tahun <?=$res_item['TAHUN_MASUK'] ?></p>
    <span style="font-size:48px"><?=$res_item['JML_MAHASISWA'] ?></span>
  </div>
  <div class="summary">
    <p>Jumlah Penerimaan <strong>Tertinggi</strong> pada Tahun</p>
    <span style="font-size:48px"><?=$hpeak_y ?></span><br />
    <p><?=$hpeak ?> Mahasiswa</p>
  </div>
  <div class="summary">
    <p>Jumlah Penerimaan <strong>Terendah</strong> pada Tahun</p>
    <span style="font-size:48px"><?=$lpeak_y ?></span><br />
    <p><?=$lpeak ?> Mahasiswa</p>
  </div>
  <div class="summary">
    <p>Rata-rata Penerimaan Mahasiswa per Tahun</p>
    <span style="font-size:48px"><?=$average[0] ?></span>
  </div>
  <div class="clear" style="margin-bottom:20px;"></div>
  <p><a href="#">Lihat Detail Data</a></p>
</div>
<?php if(!isset($params['filter'])) { ?></dataview><?php } ?>