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
        	<div class="row">
        	<div class="col-md-2"></div>
        		<div class="col-md-8">
        		<table border="0" cellspacing="5" cellpadding="5">
			        <tbody>
			        <tr>
			        	<form action="<?php echo base_url();?>jangkrik/hasil/bydate" method="post" >
			            <td width="15%">Tanggal Awal</td>
			            <td>
			            <div class="input-group">
			            <input size="10" class="form-control tanggal" type="text" id="tgl1" name="tglawal" readonly>
			            <div class="input-group-addon">
							<a href="#tgl1"><i class="fa fa-calendar bigger-110"></i></a>
						</div></div>
			            </td>
			        	<td width="2%"></td>
			            <td width="15%">Tanggal Akhir</td>
			            <td>
			            <div class="input-group">
			            <input size="10" class="form-control tanggal" type="text" id="tgl2" name="tglakhir" readonly>
			            <div class="input-group-addon">
							<a href="#tgl2"><i class="fa fa-calendar bigger-110"></i></a>
						</div></div>
						</td>
			            <td width="2%"></td>
			            <td><button type="submit" class="btn btn-default">Search</button></td>
			        	</form>
			        </tr>
			    	</tbody>
			    </table>
			    </div>
			</div>
			    <hr>
			    
				<table id="data" class="table table-bordered table-hover table-striped">
					<thead class="bg-primary">
						<tr>
							<th width="5%" style="text-align: center;">No</th>
							<th style="text-align: center;">Username</th>
							<th style="text-align: center;">Nama Lengkap</th>
							<th style="text-align: center;">Jumlah Poin</th>
							<th style="text-align: center;">Tanggal</th>
							<th style="text-align: center;">Nominal</th>
							<th style="text-align: center;">Kode Unik</th>
							<th style="text-align: center;">Total</th>

						</tr>
					</thead>
					
					<tbody>
					<?php 
					$no=1;
					$nominal=0;
					$kode=0;
					$subtotal=0;
					foreach ($dat as $data) {
					$nominal += $data->harga;
					$kode += $data->kode_unik;
					$total=$data->harga+$data->kode_unik;
					$subtotal += $total;
					 ?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td style="text-align: center;"><?php echo $data->username; ?></td>
						<td style="text-align: center;"><?php echo $data->namalengkap; ?></td>
						<td style="text-align: center;"><?php echo $data->poin; ?></td>
						<td style="text-align: center;"><?php echo $data->tgl_accept; ?></td>
						<td style="text-align: center;"><?php echo $data->harga; ?></td>
						<td style="text-align: center;"><?php echo $data->kode_unik; ?></td>
						<td style="text-align: center;"><?php echo number_format($total, 0, ',', '.'); ?></td>
					</tr>
					
					<?php } ?>
					</tbody>
					
					<tr>	
						<td class="bg-info" colspan="5" style="text-align: center;"><b>Total</b></td>
						<td class="bg-info" style="text-align: center;"><b><?php echo number_format($nominal, 0, ',', '.'); ?>
						<td class="bg-info" style="text-align: center;"><b><?php echo number_format($kode, 0, ',', '.'); ?>
						<td class="bg-info" style="text-align: center;"><b><?php echo number_format($subtotal, 0, ',', '.'); ?></b></td>
					</tr>
					
				</table>

			</div>
		</div>
	</div>
</div>