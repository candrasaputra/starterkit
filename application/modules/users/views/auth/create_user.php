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
                  <?php echo form_open("users/auth/create_user");?>
                        <p>
                              <label>Role</label><br />
                              <?php echo form_dropdown('roleID', $options); ?>
                        </p>

                        <p>
                              <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                              <?php echo form_input($first_name);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                              <?php echo form_input($last_name);?>
                        </p>
                        
                        <?php
                        if($identity_column!=='email') {
                            echo '<p>';
                            echo lang('create_user_identity_label', 'identity');
                            echo '<br />';
                            echo form_error('identity');
                            echo form_input($identity);
                            echo '</p>';
                        }
                        ?>

                        <p>
                              <?php echo lang('create_user_company_label', 'company');?> <br />
                              <?php echo form_input($company);?>
                        </p>
                        <p>
                              <?php echo lang('create_user_email_label', 'email');?> <br />
                              <?php echo form_input($email);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_phone_label', 'phone');?> <br />
                              <?php echo form_input($phone);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_password_label', 'password');?> <br />
                              <?php echo form_input($password);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                              <?php echo form_input($password_confirm);?>
                        </p>


                        <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

                  <?php echo form_close();?>

                  

                </div><!-- /.box-body -->
                <div id="loading" style="display:none" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<div id="infoMessage"><?php echo $message;?></div>