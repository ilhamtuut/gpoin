<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Poin Admin : <b><?php echo $jumlah_poin_admin->jml;?></b>
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
							<h3 class="text-center title-login">POIN</h3>
						</div>
						<div class="panel-body">				
							<form action="<?php echo base_url(); ?>jangkrik/transfer/validasi" class="inner-login" method="post">
								<div class="form-group">
								    <select type="text" class="form-control" name="tipe">
								        <option value="">-</option>
								        <option value="G-POIN">G-POIN</option>
								        <option value="G-NETWORK">G-NETWORK</option>
								    </select>
								</div>
								<div class="form-group">
								   	<input type="text" class="form-control" name="jmlpoin" placeholder="Poin">
								</div>
								<div class="form-group">
								    <input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group">
								    <input type="password" class="form-control" name="password" placeholder="Password">
								</div>						               
								    <input type="submit" class="btn btn-block btn-success" value="Submit" />   
							</form>
						</div>
					</div>
                </div>
            </div>
            
            <div class="table-responsive"> 
            <caption><h3><center>History Transfer</center></h3></caption><hr>
				<table id="data" class="table table-bordered table-hover table-striped">
					<thead class="bg-primary">
				        <tr>
				            <th style="text-align: center;">No</th>
				            <th style="text-align: center;">Poin</th>
				            <th>Informasi</th>
				            <th style="text-align: center;">Tanggal Transaksi</th>
				        </tr>
				    </thead>
				    <tbody>
				            <?php 
					$no=1;
					 	foreach($transaksi as $data) { ?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td style="text-align: center;"><?php echo $data->kredit; ?></td>
						<td><?php echo $data->ket; ?> KE <?php echo $data->username; ?></td>
						<td style="text-align: center;"><?php echo $data->tgl; ?></td>
					</tr>
					<?php 
				    	}
					 	foreach($transaksi1 as $data) { ?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td style="text-align: center;"><?php echo $data->kredit; ?></td>
						<td><?php echo $data->ket; ?> KE <?php echo $data->username; ?></td>
						<td style="text-align: center;"><?php echo $data->tgl; ?></td>
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