<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
        <div class="table-responsive">
			<table id="data" class="table table-bordered table-hover table-striped example1">
				<thead class="bg-primary">
					<tr>

						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Username</th>
						<th style="text-align: center;">Email</th>
						<th style="text-align: center;">No Hp</th>
						<th style="text-align: center;">Alamat</th>
						<th style="text-align: center;">Tanggal Registrasi</th>
						<th style="text-align: center;">Keterangan</th>
						
					</tr>
				</thead>
				
				<tbody>

				<?php 
				 $no=1;
				 	foreach($member2 as $data) { ?>
				<tr data-id_user1="<?php echo $data->id_user; ?>">
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td><?php echo $data->username; ?></td>
					<td><?php echo $data->email; ?></td>
					<td><?php echo $data->nohp; ?></td>
					<td><?php echo $data->alamat; ?></td>
					<td><?php echo $data->tglreg; ?></td>
					<td>
						<?php 
						if($member2 < 0){
							echo "G NETWORK";
						}else{
							echo "G POIN";
						}
						?>
					</td>
					
				</tr>
				<?php }
			    	
			    ?>
				</tbody>
			</table>

			</div>
		</div>
	</div>
</div>



<!-- modal -->
<div class="modal fade" id="modal_datamember" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h3 class="modal-title"><i class="fa fa-user"></i> View Detail Member</h3>
            </div>
            <div class="modal-body">
            	<div class="fetched-data"></div>	
            </div>
            <div class="modal-footer">
            	<button class="btn btn-danger btn-sm" data-dismiss="modal">
                	Keluar
                </button>
            </div>
        </div>
    </div>
</div>
