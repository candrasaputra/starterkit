<table id="dt" class="table table-bordered table-hover dataTable">
	<thead>
		<tr>
			<td>Nama</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($get_roles as $key): ?>
		<tr>
			<td><?php echo $key->roleAlias; ?></td>
			<td>
				<a href="<?php echo base_url('roles/edit_roles/'.$key->roleID); ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i></a>
				<a href="<?php echo base_url('roles/delete/'.$key->roleID); ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
  $(function () {
    $("#dt").DataTable({
      // "ordering": false
      "searching": true,
      "lengthChange": false,
    });
  });
</script>
