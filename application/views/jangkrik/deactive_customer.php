<div class="col-lg-12">
<?php if($this->session->flashdata('pass_login')) : ?>
	    <div class="alert alert-success">
	      <?php echo $this->session->flashdata('pass_login'); ?>
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    </div>
	<?php endif; ?>
	<?php if($this->session->flashdata('fail_login')) : ?>
	        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('fail_login'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body">
        
            <div class="table-responsive"> 
 
				<table id="data" class="table table-bordered table-hover table-striped">
					<thead class="bg-primary">
				        <tr>
				            <th width="5%" style="text-align: center;">No</th>
				            <th style="text-align: center;">Jenis</th>
				            <th style="text-align: center;">Nomor</th>
				            <th style="text-align: center;">Status</th>
				        </tr>
				    </thead>
				    <tbody>
				            <?php 
					$no=1;
					 	foreach($customer as $data) { ?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td style="text-align: center;"><?php echo $data->jenis; ?></td>
						<td style="text-align: center;"> <?php echo $data->nomor; ?></td>
						<td style="text-align: center;"> 
						<a href="<?php echo base_url(); ?>jangkrik/customer/update_active/<?php echo $data->id; ?>" class="btn btn-success" onclick="return confirm('Anda Yakin Ingin Mengaktifkan???')">
							Active
						</a>	
						</td>
						
					</tr>
					<?php 
				    	}
				    ?>
				    </tbody>
				</table>
			</div>            <!-- /.row (nested) -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
                <!-- /.col-lg-12 -->