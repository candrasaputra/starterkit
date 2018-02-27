<script type="text/javascript">
    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "aaSorting": [],
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('logsecurity/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

</script>

<!-- Main content -->
<section class="content">
  
  <div class="row">
    <div class="col-md-12">
        <div class="box row-horizon box-cos-biaya box-solid">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
              <!-- Mulai -->
              <table id="table" class="table table-bordered table-striped">
  				      <thead>
  				        <tr>
  				        	<th>Aksi</th>
      							<th>Deskripsi</th>
                    <th>IP</th>
      							<th>User</th>
      							<th>Waktu</th>
  				        </tr>
  				      </thead>
  				      <tbody>
  				      </tbody>

  				      <tfoot>
  				        <tr>
  					        <th>Aksi</th>
  				        	<th>Deskripsi</th>
                    <th>IP</th>
  				        	<th>User</th>
  				        	<th>Waktu</th>
  				        </tr>
  				      </tfoot>
  				    </table>

            </div><!-- /.box-body -->
            <div id="loading" style="display:none" class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->