<script>
$("input[type=reset], input[type=submit]").button();
$("input[name=filter_start]").spinner({min:2003, max:2011});
$("input[name=filter_end]").spinner({min:2004, max:2012});
$("input[name=filter_pt]").autocomplete({
	minLength: 3,
	source: function(request, response){
    	$.get("<?=base_url()?>index.php/dataview/pt/daftar_json", {term:request.term}, function(data){     
        	response($.map(data, function(item) {
        		return {
					label: item.LABEL,
					id: item.ID,
					value: item.ID + "-" + item.LABEL
        		}
        	}))
    	}, "json");
  	},
	cache: false
});
$("input[name=filter_ps]").autocomplete({
	minLength: 3,
	source: function(request, response) {
		$.get("<?=base_url()?>index.php/dataview/ps/daftar_json", 
			{
				term:request.term, 
				pt:$("input[name=filter_pt]").val()
			}, 
			function(data){     
        	response($.map(data, function(item) {
        		return {
					label: item.LABEL,
					id: item.ID,
					value: item.ID + "-" + item.LABEL
        		}
        	}))
    	}, "json");
	},
	cache: false
});

function doFilter(url) {
	$.get("<?=base_url() ?>index.php/" + url, 
		{
			filter: "true",
			pt: $("input[name=filter_pt]").val(),
			ps: $("input[name=filter_ps]").val(),
			start: $("input[name=filter_start]").val(),
			end: $("input[name=filter_end]").val()
		}
	).done(function(resp) {
		$("dataview").html(resp);
	});
}

function clearField(elem) {
	$("input[name=filter_" + elem + "]").val("");
	$("input[name=filter_" + elem + "]").focus();
}
</script>
<a onclick="initField('filter')"><div class="pretitle">
  Filter<img src="<?=base_url() ?>resource/images/expand.png" width="16" align="right" />
</div></a>
<div id="filter" class="accord">
  <form action="javascript:void(0);" name="filter" method="get">
    <table border="0" style="margin-bottom:10px; margin-top:-10px;">
      <tr>
        <td width="150">Per Perguruan Tinggi</td>
        <td><input type="text" name="filter_pt" size="50" <?php if(isset($params['filter_pt'])) echo 'value="'.$params['filter_pt'].'"' ?>/><a onclick="clearField('pt')"><img src="<?=base_url() ?>resource/images/cancel.png" class="clearfield" /></a></td>
      </tr>
      <tr>
        <td>Per Program Studi</td>
        <td><input type="text" name="filter_ps" size="50" <?php if(isset($params['filter_ps'])) echo 'value="'.$params['filter_ps'].'"' ?>/><a onclick="clearField('ps')"><img src="<?=base_url() ?>resource/images/cancel.png" class="clearfield" /></a></td>
      </tr>
      <tr class="filter-date">
        <td><span style="position:relative; top:3px;">Per Jangka Waktu</span></td>
        <td><span style="position:relative; top:3px;">Dari</span> <input name="filter_start" size="5" value="2003" />&emsp;<span style="position:relative; top:3px;">Hingga</span> <input name="filter_end" size="5" value="2012" /></td>
      </tr>
    </table>
    <input type="reset" value="Hapus Filter" style="float:left;" /> <input type="submit" onclick="doFilter('<?=$filter_url?>')" value="Cari" style="float:left;" />
    <div style="color:#aaa; padding: 12px 0 0 10px; float:left;"><strong>Hint</strong>: Untuk reset data pada grafik, silahkan tekan 'Hapus Filter', kemudian tekan 'Cari'</div>
    <div class="clear"></div>
  </form>
</div>