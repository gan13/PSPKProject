<link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/plugins/datatables/dataTables.bootstrap.css"/>
<script src="<?=base_url();?>konten/tema/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>konten/tema/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
});
</script>
<div>
	<a href="<?=base_url(akses().'/data/alternatif/add');?>" class="btn btn-primary btn-md">Tambah alternatif</a>
</div>
<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>No</th>
		<th>Nama Alternatif</th>		
		<th></th>
	</thead>
	<tbody>
		<?php
		$no=0;
		if(!empty($data))
		{
			foreach($data as $row)
			{
				$no+=1;
				$id=$row->alternatif_id;
			?>
			<tr>
				<td width="10%"><?=$no;?></td>
				<td width="70%"><?=$row->nama_alternatif;?></td>
				<td>
					<a title="Edit Alternatif" href="<?=base_url(akses().'/data/alternatif/edit');?>?id=<?=$id;?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
					<a title="Hapus Alternatif" onclick="return confirm('Yakin ingin menghapus alternatif ini?');" href="<?=base_url(akses().'/data/alternatif/delete');?>?id=<?=$id;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>