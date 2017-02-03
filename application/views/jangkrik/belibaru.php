<div class="col-lg-12">
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
						
					</tr>
				</thead>
				
				<tbody>
				<?php 
				$no=1;
				foreach ($baru as $data) {
				 ?>
				<tr>
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td style="text-align: center;"><?php echo $data->username; ?></td>
					<td style="text-align: center;"><?php echo $data->namalengkap; ?></td>
					<td style="text-align: center;"><?php echo $data->poin; ?></td>
					<td style="text-align: center;"><?php echo $data->harga+$data->kode_unik ; ?></td>
					<td style="text-align: center;"><?php echo $data->tgl_beli; ?></td>
					
				</tr>
				<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
