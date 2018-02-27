<!-- Main content -->

<script type="text/javascript">
	function onClick(i){
				$.ajax({
					url : "<?php echo site_url('users/auth/ajax_activate_user')?>/"+i,
					type: "POST",
					dataType: "json",
					success: function(json)
					{
						//if success reload ajax table
						if (json.st === 0) {
								toastr_gagal('Gagal!', json.msg);
						} else {
								$('#msg-container').html('');
								toastr_sukses('Sukses!', json.msg);
						}
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
							alert('Error adding / update data');
					}
			 });

				$("#cek"+i).attr('onClick', "unClick("+i+")");
			}

	function unClick(i) {
		$.ajax({
			url : "<?php echo site_url('users/auth/ajax_deactivate_user')?>/"+i,
			type: "POST",
			dataType: "json",
			success: function(json)
			{
				//if success reload ajax table
				if (json.st === 0) {
						toastr_gagal('Gagal!', json.msg);
				} else {
						$('#msg-container').html('');
						toastr_sukses('Sukses!', json.msg);
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
					alert('Error adding / update data');
			}
	 });

		$("#cek"+i).attr('onClick', 'onClick('+i+')');
	}
</script>
<section class="content">
	<a class="btn btn-primary" href="<?php echo base_url('users/auth/create_user'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> User</a>
	<a class="btn btn-success" href="<?php echo base_url('roles/add'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Role</a>
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $title ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">

	                <!-- Mulai -->
	                <div id="infoMessage"><?php echo $message;?></div>
					<table id="example1" class="table table-bordered table-hover dataTable">
						<thead>
							<tr>
								<th><?php echo lang('index_fname_th');?></th>
								<th><?php echo lang('index_username_th');?></th>
								<th><?php echo lang('index_role_th');?></th>
								<th><?php echo lang('index_status_th');?></th>
								<th>Last Login</th>
								<th><?php echo lang('index_action_th');?></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($users as $user):?>
							<tr>
					            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					            <td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
					            <td>
						            <?php if (!empty($roles["$user->roleID"])): ?>
						            	<?php echo htmlspecialchars($roles["$user->roleID"],ENT_QUOTES,'UTF-8');?>
						            <?php else: ?>
						            	<span style="color:red;"><i class="fa fa-exclamation-triangle"></i> Data Tidak Tersedia</span>
						            <?php endif ?>
					            </td>
					            <td>
									<?php
										$checked = null;
										if ($user->active) {
											$checked = ' checked="checked"';
										}

										if ($user->active) {
											$onklik = "unClick(".$user->id.")";
										}else{
											$onklik = "onClick(".$user->id.")";
										}
									 ?>

									<label class="switch">
										<input id="cek<?php echo $user->id; ?>" value="<?php echo $user->id;?>" onClick ="<?php echo $onklik; ?>" type="checkbox" <?php echo $checked;?>>
										<div class="slider"></div>
									</label>
								</td>
								<td><?php echo date("d-m-Y H:i:s", $user->last_login); ?></td>
								<td>
									<?php echo anchor("users/auth/edit_user/".$user->id, 'Edit') ;?>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>

					<p><?php echo anchor('users/auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('users/auth/create_group', lang('index_create_group_link'))?></p>

                </div><!-- /.box-body -->
                <div id="loading" style="display:none" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- /.box -->
        </div>

        <div class="col-md-12">
            <div class="box box-solid box-success">
                <div class="box-header">
                    <h3 class="box-title">User Role</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

	                <!-- Mulai -->
	                <div id="infoMessage"><?php echo $message;?></div>

					<?php echo Modules::run('roles/listroles'); ?>

                </div><!-- /.box-body -->
                <div id="loading" style="display:none" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
