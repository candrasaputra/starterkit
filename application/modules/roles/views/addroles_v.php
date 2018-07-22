<!-- Main content -->
<section class="content">
    <a class="btn btn-warning" href="<?php echo base_url('users'); ?>"><i class="fa fa-reply" aria-hidden="true"></i>
 Kembali ke users</a>
    <p></p>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $title?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<form action="<?php echo base_url('roles/proses_add_role'); ?>" id="form" class="form-horizontal" method="POST">
						<input type="hidden" value="" name="id"/> 
						<div class="form-body">
							<div class="form-group">
							  <label class="control-label col-md-3">Nama Role</label>
							  <div class="col-md-9">
							    <input name="roleName" class="form-control" type="text">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3">Nama Alias</label>
							  <div class="col-md-9">
							    <input name="roleAlias" class="form-control" type="text">
							  </div>
							</div>
						</div>

						<input type="submit" name="btnSave" class="btn btn-success pull-right" value="Simpan" />
					</form>
                </div><!-- /.box-body -->
                <div id="loading" style="display:none" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->