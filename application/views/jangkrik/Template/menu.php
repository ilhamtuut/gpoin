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
                <a class="navbar-brand" href="<?php echo base_url();?>jangkrik/home" style="font-size: 30px; color: #31708f;">Administrator</a>
            </div>
            <!-- /.navbar-header -->
            
            <!-- /.navbar-top-links -->
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url();?>jangkrik/home"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>jangkrik/transfer"><i class="glyphicon glyphicon-transfer"></i> Transfer Poin</a>
                        </li>
                    
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-user"></i> Member <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>jangkrik/data_member"><i class="fa fa-user"></i> G Netwok</a>
                                            
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>jangkrik/data_member/data"><i class="fa fa-user"></i> G Poin</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/data_posting"><i class="glyphicon glyphicon-list-alt"></i> Posting</a>
                                </li>
                                <!--li>
                                    <a href="<?php echo base_url(); ?>data_transaksi"><i class="glyphicon glyphicon-transfer"></i> Transaksi</a>
                                </li-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> Data Pembelian Poin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/beli/baru"><i class="glyphicon glyphicon-download-alt"></i> Pembelian Baru</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/beli/masuk"><i class="glyphicon glyphicon-edit"></i> Konfirmasi Pembelian</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/beli/accept"><i class="glyphicon glyphicon-check"></i> History Konfirmasi ACC </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/beli/cancel"><i class="glyphicon glyphicon-remove"></i> History Konfirmasi Cancel</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> Data Penghasilan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/hasil/total"><i class="glyphicon glyphicon-download-alt"></i> Total Buy GPoin</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/hasil/poin_masuk"><i class="glyphicon glyphicon-import"></i> Jumlah Poin Masuk </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jangkrik/hasil/poin_keluar"><i class="glyphicon glyphicon-export"></i> Jumlah Poin Keluar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Setting Rekening Admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-bank"></i> Bank <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li>
                                            <a href="#"><i class="glyphicon glyphicon-user"></i> Admin Bank <span class="fa arrow"></span></a>
                                            <ul class="nav">
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/bank/insert_bank"><i class="glyphicon glyphicon-save"></i> Insert</a>
                                                    
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/bank/active_bank"><i class="glyphicon glyphicon-ok-circle"></i> Active</a>
                                                    
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/bank/deactive_bank"><i class="glyphicon glyphicon-remove-circle"></i> Deactivated</a>
                                                </li>
                                               
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-bank"></i> Nama Bank <span class="fa arrow"></span></a>
                                            <ul class="nav">
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/bank/insert_bank_member"><i class="glyphicon glyphicon-save"></i> Insert</a>
                                                    
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/bank/active_bank_member"><i class="glyphicon glyphicon-ok-circle"></i> Active</a>
                                                    
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/bank/deactive_bank_member"><i class="glyphicon glyphicon-remove-circle"></i> Deactivated</a>
                                                </li>
                                               
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="glyphicon glyphicon-user"></i> Customer Service <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/customer/insert"><i class="glyphicon glyphicon-save"></i> Insert</a>
                                                    
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/customer/active"><i class="glyphicon glyphicon-ok-circle"></i> Active</a>
                                                    
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>jangkrik/customer/deactive"><i class="glyphicon glyphicon-remove-circle"></i> Deactivated</a>
                                                </li>
                                       
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>jangkrik/home/history"><i class="glyphicon glyphicon-user"></i> History Transfer Admin</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-top-links navbar-right">
                    <li style="color: #31708f;"><i class="glyphicon glyphicon-user"></i> <?php echo $this->session->userdata('admin');?></li>   
                    <li><a href="<?php echo base_url(); ?>jangkrik/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>   
                </ul>
            </div>
            <!-- /.navbar-static-side -->
        </nav>