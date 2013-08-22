<a onclick="initField('dataview')"><div class="pretitle">
  Ringkasan<img src="<?=base_url() ?>resource/images/collapse.png" for="dataview" collapsed="false" width="16" align="right" />
</div></a>
<div id="dataview" class="accord" style="display:block;">
  <h2 style="margin:10px 0;">Jumlah Sarana Klinis berdasarkan Jenis</h2>
  <?php $index=0 ?>
  <?php foreach($res as $res_item): ?>
  <div class="summary">
    <span class="summarytext"><?=$res_item['JUMLAH'] ?></span>
    <p><?=$res_item['DESKRIPSI'] ?></p>
  </div>
  <?php if($index==3) { ?><div class="clear"></div><?php $index=0; } else { $index++; }?>
  <?php endforeach ?>
  <div class="clear"></div>
</div>