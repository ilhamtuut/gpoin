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
						<th style="text-align: center;">Admin</th>
						<th style="text-align: center;">Kegiatan</th>
						<th style="text-align: center;">Tanggal</th>
					</tr>
				</thead>
				
				<tbody>

				<?php 
				 $no=1;
				 foreach($admin as $data) { ?>
				<tr>
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td><?php echo $data->username; ?></td>
					<td><?php echo $data->kegiatan; ?></td>
					<td style="text-align: center;"><?php echo $data->tgl; ?></td>
				</tr>
				<?php }
			    ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>



