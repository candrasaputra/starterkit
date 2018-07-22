<script type="text/javascript">
$(function(){
  $('#frm').submit(function(){
    $('#loading').show();
    $('html, body').animate({scrollTop : 0},800);
    setTimeout(function() {
        $.ajax({
            type:'POST',
            url:$('#frm').attr('action'),
            data:$('#frm').serialize(),
            dataType: 'json',
            success: function(json){
              $('#loading').hide();
              if (json.st === 0) {
                  $('#msg-container').html("<div class='alert alert-danger alert-dismissible bts-bwh' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><center>"+json.msg+"</center></div>");
              } else {
                  $('#msg-container').html('');

                  swal({
                      title: json.msg,
                      text: "Data Berhasil di Simpan!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "OK",
                      cancelButtonText: "No, cancel plx!",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm){
                      if (isConfirm) {
                        location.reload();
                        // window.location="<?php echo base_url('outletproduct/detail/'.$this->uri->segment(3)); ?>";
                      } else {
                          swal("Cancelled", "Your imaginary file is safe :)", "error");
                      }
                    });

              }
            },
         });
      }, 200)
      return false;
  });
});

function onClick(i){
  $.ajax({
    url : "<?php echo site_url('roles/prosess_add')?>/"+i+'/'+<?php echo $get_role->roleID; ?>,
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
    url : "<?php echo site_url('roles/prosess_delete')?>/"+i+'/'+<?php echo $get_role->roleID; ?>,
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


<!-- Main content -->
<section class="content">
    <a class="btn btn-warning" href="<?php echo base_url('users'); ?>"><i class="fa fa-reply" aria-hidden="true"></i>
 Kembali ke users</a>
    <p></p>

    <div id="msg-container"></div>

    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid box-success">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $title." <strong>$get_role->roleName</strong>" ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form id="frm" action="<?php echo base_url('roles/proses_update_roles'); ?>" method="POST">
                  <input type="hidden" name="roleku" value="<?php echo $this->encryption->encrypt($this->uri->segment('3')); ?>" />
                  <label>Nama</label>
                  <input type="text" class="form-control" value="<?php echo $get_role->roleName; ?>" disabled />
                  <label>Nama Alias</label>
                  <input name="roleAlias" type="text" class="form-control" value="<?php echo $get_role->roleAlias; ?>" />
                  <div class="box-footer bt-right">
                    <input type="submit" class="btn btn-success pull-right" value="Simpan" id="bttnSimpan" />
                  </div>
                </form>

                <br/>
                <legend>Pilih Hak Akses:</legend>
                <?php $this->load->model('rolesgroups/rolesgroups_m'); ?>
                <table id="datatable" class="table table-bordered table-striped display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Hak Akses</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($groups as $group):?>
                      <?php $num = $this->rolesgroups_m->get_where_double_custom('group_id', $group['id'], 'roleID', $get_role->roleID, 'id')->num_rows(); ?>
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
                      <tr>
                          <td>
                              <?php echo $no; ?>
                          </td>
                          <td>
                              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                          </td>
                          <td>
                              <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
                          </td>
                          <td>
                              <!-- <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>> -->
                              <?php
                                if ($num == 0) {
                                  $onklik = "onClick(".$group['id'].")";
                                }else{
                                  $onklik = "unClick(".$group['id'].")";
                                }
                               ?>
                              <label class="switch">
                                <input id="cek<?php echo $group['id']; ?>" value="<?php echo $group['id'];?>" onClick ="<?php echo $onklik; ?>" type="checkbox" <?php echo $checked;?>>
                                <div class="slider"></div>
                              </label>
                          </td>
                      </tr>
                    <?php $no++; ?>
                    <?php endforeach?>
                  </tbody>

                </table>

                </div><!-- /.box-body -->
                <div id="loading" style="display:none" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- /.box -->
        </div>

        <div class="col-md-9">
            <div class="callout callout-warning">
                <h4>
                    <i class="icon fa fa-warning"></i>
                    Petunjuk!
                </h4>
                <p>* Kegunaan Form ini adalah untuk mengganti hak akses dari role.</p>
                <p>* <strong>Alias</strong> digunakan sebagai pengganti nama dan bersifat unik.</p>
            </div>
        </div>
    </div>
</section><!-- /.content -->

<script type="text/javascript">
  $(function () {
    $("#datatable").DataTable({
      // "ordering": false
      "responsive": true,
      "paging": false,
      "scrollY": "500px",
      // "searching": false,
      "lengthChange": false,
      "aaSorting": []
    });
  });
</script>
