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
</div>      
                <div class="col-lg-6 col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i> 
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jumlah_member + $jumlah_simember;?></div>
                                    <div>Data Member</div>
                                </div>
                            </div>
                        </div>
                        <a data-toggle="collapse" href="#collapse1">
                        <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                        </a>
                            <div id="collapse1" class="panel-collapse collapse">
                                 <ul class="nav">
                                    <li>
                                        <a href="<?php echo base_url(); ?>data_member"><i class="fa fa-user"></i> G Netwok</a>
                                            
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>data_member/data"><i class="fa fa-user"></i> G Poin</a>
                                    </li>   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="panel panel-green">
                        <div class="panel-heading"> 
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i> 
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jumlah_posting + $jumlah_siposting;?></div>
                                    <div>Data Posting</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>data_posting">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--div class="col-lg-4 col-md-5">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i> 
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jumlah_poin1 + $jumlah_poin2;?></div>
                                    <div>Jumlah Poin</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            <!-- /.row -->