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
						<th style="text-align: center;">Username</th>
						<th style="text-align: center;">Nama Lengkap</th>
						<th style="text-align: center;">Jumlah Poin</th>
						<th style="text-align: center;">Harga</th>
						<th style="text-align: center;">Tanggal Beli</th>
						
						<th style="text-align: center;"></th>

					</tr>
				</thead>
				
				<tbody>
				<?php 
				$no=1;
				foreach ($masuk as $data) {
				 ?>
				<tr>
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td style="text-align: center;"><?php echo $data->username; ?></td>
					<td style="text-align: center;"><?php echo $data->namalengkap; ?></td>
					<td style="text-align: center;"><?php echo $data->poin; ?></td>
					<td style="text-align: center;"><?php echo $data->harga+$data->kode_unik; ?></td>
					<td style="text-align: center;"><?php echo $data->tgl_beli; ?></td>
					
					<td style="text-align: center;" class="btn-info">
						<a hreh="#" data-toggle="modal" data-target="#modal<?php echo $data->id; ?>" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-eye-open"></span>
						 View Konfirmasi Pembayaran
						</a>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<?php if (isset($masuk)){foreach($masuk as $data){
	// $namafoto=$data->gambar;
	// $foto=substr($namafoto,39,-1);
	?>
<div class="modal fade" id="modal<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header bg-primary">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h3 class="modal-title"><i class="glyphicon glyphicon-usd"></i> Lihat Konfirmasi Pembayaran</h3>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-sm-12">
            		<!-- <img class="img-thumbnail center-block" src="<?php echo base_url('assets/images'); echo '/'.$foto; ?>"  alt="No Images"> -->
            		<table class="table table-hover table-striped">
            		<tr>
            		<td width="25%" style="text-align: right;">Atas Nama</td>
            		<td width="5%" style="text-align: center;">:</td>
            		<td><?php echo $data->atas_nama_member ;?></td>
            		</tr>
            		<tr>
            		<td style="text-align: right;">Metode</td>
            		<td style="text-align: center;">:</td>
            		<td><?php echo $data->metode ;?></td>
            		</tr>
            		<tr>
            		<td style="text-align: right;">Bank</td>
            		<td style="text-align: center;">:</td>
            		<td><?php echo $data->bank_member ;?></td>
            		</tr>
            		<tr>
            		<td style="text-align: right;">No. Rekening</td>
            		<td style="text-align: center;">:</td>
            		<td><?php echo $data->no_rek_member ;?></td>
            		</tr>
            		<tr>
            		<td style="text-align: right;">Jumlah Transfer</td>
            		<td style="text-align: center;">:</td>
            		<td><?php echo $data->jml_transfer ;?></td>
            		</tr>
            		<tr>
            		<td style="text-align: right;">Tanggal Transfer</td>
            		<td style="text-align: center;">:</td>
            		<td><?php echo $data->tgl_transfer ;?></td>
            		</tr>
            		</table>
            		</div>
            	</div>
            </div>
            <div class="modal-footer">
            	<a href="<?php echo base_url(); ?>jangkrik/beli/update_accept/<?php echo $data->id ;?>" class="btn btn-success btn-sm">
                	<i class="glyphicon glyphicon-check"></i> Konfirmasi
                </a>
            	<a href="<?php echo base_url(); ?>jangkrik/beli/update_cancel/<?php echo $data->id ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Membatalkan Pembelian Ini???')">
                	<i class="glyphicon glyphicon-remove"></i> Dibatalkan
                </a>
                <button class="btn btn-secondary btn-sm" data-dismiss="modal">
                	<i class="glyphicon glyphicon-log-out"></i> Keluar
                </button>
            </div>
        </div>
    </div>
</div>
<?php } } ?>