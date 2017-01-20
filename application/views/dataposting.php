<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
       
        <div class="table-responsive">
			<table id="data" class="table table-bordered table-hover table-striped">
				<thead class="bg-primary">
					<tr>
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Username</th>
						<th style="text-align: center;">Jumlah Poin</th>
						<!--th style="text-align: center;">Tanggal</th-->
						<th style="text-align: center;">Tanggal Update</th>
						<th style="text-align: center;">Keterangan</th>
					</tr>
				</thead>
				
				<tbody>

				<?php 
				$no=1;
				foreach($posting as $data) { ?>
				<tr>
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td><?php echo $data->username; ?></td>
					<td style="text-align: center;"><?php echo $data->jml; ?></td>
					<!--td style="text-align: center;"><?php echo $data->tgl; ?></td-->
					<td style="text-align: center;"><?php echo $data->status; ?></td>
					<td><?php echo $data->ket; ?></td>
				</tr>
				<?php }
				foreach($posting2 as $data) { ?>
				<tr>
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td><?php echo $data->username; ?></td>
					<td style="text-align: center;"><?php echo $data->jml; ?></td>
					<!--td style="text-align: center;"><?php echo $data->tgl; ?></td-->
					<td style="text-align: center;"><?php echo $data->status; ?></td>
					<td><?php echo $data->ket; ?></td>
				</tr>
				<?php 
			    	}
			    ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
