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
				<?php if($this->session->flashdata('info')) : ?>
				<div class="alert alert-warning alert-dismissable">
					<?php echo $this->session->flashdata('info'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				</div>
				<?php endif; ?> 
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="text-center title-login">POIN</h3>
						</div>
						<div class="panel-body">				
							<form action="<?php echo base_url(); ?>jangkrik/home/transfer" class="inner-login" method="post">
								<div class="form-group">
								   	<input type="text" class="form-control" name="tipe" value="<?php echo $tipe ;?>" Readonly>
								</div>
								<div class="form-group">
								   	<input type="text" class="form-control" name="jmlpoin" value="<?php echo $jmlpoin;?>" Readonly>
								</div>
								<div class="form-group">
								    <input type="text" class="form-control" name="username" value="<?php echo $username;?>" Readonly>
								</div>
								<div class="form-group">
								    <input type="password" class="form-control" name="password" placeholder="Konfirmasi Password">
								</div>						               
								    <input type="submit" class="btn btn-block btn-success" value="Submit" />   
							</form>
						</div>
					</div>
                </div>
            </div>
                            <!-- /.row (nested) -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
                <!-- /.col-lg-12 -->