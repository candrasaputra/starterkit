<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $title ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                	<!-- Mulai -->
                  
					<div id="infoMessage"><?php echo $message;?></div>

					<?php echo form_open("users/auth/create_group");?>

					      <p>
					            <?php echo lang('create_group_name_label', 'group_name');?> <br />
					            <?php echo form_input($group_name);?>
					      </p>

					      <p>
					            <?php echo lang('create_group_desc_label', 'description');?> <br />
					            <?php echo form_input($description);?>
					      </p>

					      <p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p>

					<?php echo form_close();?>

                </div><!-- /.box-body -->
                <div id="loading" style="display:none" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->