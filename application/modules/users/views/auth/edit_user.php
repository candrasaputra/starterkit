<script type="text/javascript">
function previewImage() {
  document.getElementById("image-preview").style.display = "block";
  var oFReader = new FileReader();
   oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview").src = oFREvent.target.result;
  };
};
</script>
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
                  <style media="screen">
                    #image-preview{
                      /*display:none;*/
                      border: 5px solid #ddd;
                      border-radius: 10px;
                      width : 300px;
                      height : 300px;
                    }
                  </style>
                  <div id="infoMessage"><?php echo $message;?></div>
                  <div class="form-body">
                    <?php echo form_open_multipart(uri_string());?>
                      <div class="col-md-4">

                        <!-- <?php //if ($user->image != null || file_exists('./assets/img/usr/'.$user->image)) { ?> -->
                        <img src="<?php echo base_url('assets/img/usr/').$user->image; ?>"  id="image-preview" alt="image preview"/>

                        <br/>
                        <p></p>
                        <strong><?php echo "Upload foto baru:"; ?></strong><br/>
                        <?php echo form_upload($image);?>
                        <p>*maksimal 5MB.</p>
                        <!-- <input type="file" id="image-source" onchange="previewImage();"/> -->
                      </div>
                      <div class="col-md-8">
                            <p>
                                  <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                                  <?php echo form_input($first_name);?>
                            </p>
                            <p>
                                  <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                                  <?php echo form_input($last_name);?>
                            </p>
                            <p>
                                  <?php echo lang('edit_user_company_label', 'company');?> <br />
                                  <?php echo form_input($company);?>
                            </p>
                            <p>
                                  <?php echo lang('edit_user_roles_label', 'role');?> <br />
                                  <?php echo form_dropdown($role,$rolesoptions,$roleselected);?>
                            </p>
                            <p>
                                  <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                                  <?php echo form_input($phone);?>
                            </p>
                            <p>
                                  <?php echo lang('edit_user_password_label', 'password');?> <br />
                                  <?php echo form_input($password);?>
                            </p>
                            <p>
                                  <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                                  <?php echo form_input($password_confirm);?>
                            </p>

                            <!-- <?php if ($this->ion_auth->is_admin()): ?>

                                <h3><?php echo lang('edit_user_groups_heading');?></h3>
                                <?php foreach ($groups as $group):?>
                                    <label class="checkbox">
                                    <?php
                                        $gID=$group['id'];
                                        $checked = null;
                                        $item = null;
                                        foreach($currentGroups as $grp) {
                                            if ($gID == $grp->id) {
                                                $checked= ' checked="checked"';
                                            break;
                                            }
                                        }
                                    ?>
                                    <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                    </label>
                                <?php endforeach?>

                            <?php endif ?> -->

                            <?php echo form_hidden('id', $user->id);?>
                            <?php echo form_hidden($csrf); ?>

                            <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>
                      </div>
                    <?php echo form_close();?>
                  </div>


                </div><!-- /.box-body -->
                <div id="loading" style="display:none" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
