<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- JQuery CSS -->
    <link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/datatables/css/dataTables.bootstrap.css"/>
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- icon -->
    <link rel="icon" href="dist/images/favicon.png">

    <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet">
    
    
</head>

<body>

    <div id="wrapper">
    <?php echo $_menu;?>
        <div id="page-wrapper">
            <div class="row">
                <?php echo $_header;?>
                 <?php echo $_content;?>
            </div>
            <!-- /.row -->  
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?PHP echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?PHP echo base_url(); ?>assets/datatables/js/jquery.dataTables.js"></script>
    <script src="<?PHP echo base_url(); ?>assets/datatables/js/dataTables.bootstrap.js"></script>
    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.js"></script>

    <script src="<?php echo base_url();?>assets/jquery/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript">
    $( function() {
    $( ".tanggal" ).datepicker({
        dateFormat:"yy-mm-dd",
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true
    });
    });
    </script>

    <script type="text/javascript">
        $(function() {
            $("#data").dataTable();
        });
        
        $(document).ready(function() {
             //var table = $('.example').DataTable();
            $('.example tbody').on('click', 'tr', function () {
                //var data = table.row( this ).data();
                var id_user = $(this).attr('data-id_user');
                $.ajax({
                        async: true,
                        type : 'post',
                        url : '<?php echo base_url(); ?>jangkrik/data_member/view',
                        data :  'id_user='+ id_user,
                        success : function(data){
                            $('#modal_datamember').modal('show');
                            $('.fetched-data').html(data);//menampilkan data ke dalam modal
                        }
                        
                    });
                
                //alert( 'You clicked on '+data[7]+'\'s row' );
                } );
        } );

        $(document).ready(function() {
             //var table = $('.example').DataTable();
            $('.example1 tbody').on('click', 'tr', function () {
                //var data = table.row( this ).data();
                var id_user = $(this).attr('data-id_user1');
                $.ajax({
                        async: true,
                        type : 'post',
                        url : '<?php echo base_url(); ?>jangkrik/data_member/view1',
                        data :  'id_user='+ id_user,
                        success : function(data){
                            $('#modal_datamember').modal('show');
                            $('.fetched-data').html(data);//menampilkan data ke dalam modal
                        }
                        
                    });
                
                //alert( 'You clicked on '+data[7]+'\'s row' );
                } );
        } );

        //
    </script>
    <!-- <script type="text/javascript">
    //Script Redirect CTRL + U
    function redirectCU(e) {
      if (e.ctrlKey && e.which == 85) {
        return false;
      }
    }
    document.onkeydown = redirectCU;

    //Script Redirect Klik Kanan
    function redirectKK(e) {
      if (e.which == 3) {
        return false;
      }
    }
    document.oncontextmenu = redirectKK;

    </script> -->

</body>

</html>
