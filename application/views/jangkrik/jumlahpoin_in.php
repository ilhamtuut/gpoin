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
			        	<form action="<?php echo base_url();?>jangkrik/hasil/poin_in" method="post" >
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
				            <th style="text-align: center;">No</th>
				            <th>Username</th>
				            <th>Keterangan</th>
				            <th style="text-align: center;">Tanggal Transaksi</th>
				            <th style="text-align: center;">Poin</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php 
					$no=1;
					$total=0;
					foreach($transaksi as $data) { 
					$total+=$data->kredit;
					?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td><?php echo $data->username; ?></td>
						<td><?php echo $data->ket; ?></td>
						<td style="text-align: center;"><?php echo $data->tgl; ?></td>
						<td style="text-align: center;"><?php echo $data->kredit; ?></td>
					</tr>
					<?php 
				    }
					 foreach($transaksi1 as $data) { 
					 $total+=$data->kredit; 
					 ?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td><?php echo $data->username; ?></td>
						<td><?php echo $data->ket; ?></td>
						<td style="text-align: center;"><?php echo $data->tgl; ?></td>
						<td style="text-align: center;"><?php echo $data->kredit; ?></td>
					</tr>
					<?php 
				    	}
				    ?>
				    </tbody>
				    <tr>	
						<td class="bg-info" colspan="4" style="text-align: center;"><b>Total Poin</b></td>
						<td class="bg-info" style="text-align: center;"><b> <?php echo number_format($total,2,".","."); ?></b></td>
					</tr>
				</table>
			</div> 
			</div>
	</div>
</div>  