<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body">
        
            <div class="row">
				<div class="col-md-6 col-md-offset-3">
				<?php if($this->session->flashdata('pass_login')) : ?>
		<div class="alert alert-success alert-dismissable">
			<?php echo $this->session->flashdata('pass_login'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('fail_login')) : ?>
			<div class="alert alert-danger alert-dismissable">
				<?php echo $this->session->flashdata('fail_login'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
			<?php endif; ?> 
					<div class="panel panel-primary">
						<div class="panel-heading">
							<!-- <h3 class="text-center title-login">POIN</h3> -->
						</div>
						<div class="panel-body">				
							<form action="<?php echo base_url(); ?>jangkrik/bank/save_bank_member" class="inner-login" method="post">
								
								<div class="form-group">
								    <input type="text" class="form-control" name="bank" placeholder="Nama Bank">
								</div>
													               
								    <input type="submit" class="btn btn-block btn-success" value="SAVE" />   
							</form>
						</div>
					</div>
                </div>
            </div>
            
            <div class="table-responsive"> 
            <caption><h3><center>Data Nama Bank</center></h3></caption><hr>
				<table id="data" class="table table-bordered table-hover table-striped">
					<thead class="bg-primary">
				        <tr>
				            <th width="5%" style="text-align: center;">No</th>
				            <th style="text-align: center;">Nama Bank</th>
				            <th style="text-align: center;">Status</th>
				           
				        </tr>
				    </thead>
				    <tbody>
				            <?php 
					$no=1;
					 	foreach($bank as $data) { ?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td style="text-align: center;"><?php echo $data->bank; ?></td>
						<td style="text-align: center;"> 
							<?php 
								if($data->cek==1){
									echo "Active";
								}else{
									echo "Deactivated";
								}

							?>
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