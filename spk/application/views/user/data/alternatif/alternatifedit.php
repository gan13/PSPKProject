<?php
if(empty($data))
{
	redirect(base_url(akses().'/data/alternatif'));
}
foreach($data as $row){	
}
echo validation_errors();
echo form_open(base_url(akses().'/data/alternatif/edit'),array('class'=>'form-horizontal'));
?>
<input type="hidden" name="alternatifid" value="<?=$row->alternatif_id;?>"/>
<div class="form-group">
	<label class="col-sm-2 control-label" for="">Nama Alternatif</label>
	<div class="col-md-7">
		<input type="text" name="nama" id="" class="form-control " autocomplete="off" placeholder="Nama Alternatif" required="" value="<?php echo set_value('nama',$row->nama_alternatif); ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">&nbsp;</label>
	<div class="col-md-4">
		<button type="submit" class="btn btn-primary btn-flat">Ubah</button>
		<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
	</div>
</div>
<?php
echo form_close();
?>