<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<!--img class="navbar-brand" src="<?php echo base_url();?>dist/images/favicon.png" alt="usm"-->
                <a class="navbar-brand" href="<?php echo base_url();?>home" style="font-size: 30px; color: #31708f;">Administrator</a>
            </div>
            <!-- /.navbar-header -->
            
            <!-- /.navbar-top-links -->
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url();?>home"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>transfer"><i class="glyphicon glyphicon-transfer"></i> Transfer Poin</a>
                        </li>
                    
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-user"></i> Member <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>data_member"><i class="fa fa-user"></i> G Netwok</a>
                                            
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>data_member/data"><i class="fa fa-user"></i> G Poin</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>data_posting"><i class="glyphicon glyphicon-list-alt"></i> Posting</a>
                                </li>
                                <!--li>
                                    <a href="<?php echo base_url(); ?>data_transaksi"><i class="glyphicon glyphicon-transfer"></i> Transaksi</a>
                                </li-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <!--li>
                            <a href="<?php echo base_url(); ?>home/history"><i class="fa fa-user"></i> History Admin</a>
                        </li-->
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-top-links navbar-right">
                    <li style="color: #31708f;"><i class="fa fa-user"></i> <?php echo $this->session->userdata('admin');?></li>   
                    <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>   
                </ul>
            </div>
            <!-- /.navbar-static-side -->
        </nav>