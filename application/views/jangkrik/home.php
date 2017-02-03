<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Point</title>
 
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>
  <body>
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

    <div class="col-md-4 col-md-offset-4 form-login">
        <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <form action="<?php echo base_url(); ?>pos/transfer" class="inner-login" method="post">
            <h3 class="text-center title-login">G-POIN</h3>
                <div class="form-group">
                    <select type="text" class="form-control" name="tipe">
                      <option value="">-</option>
                      <option value="G-POIN">G-POIN</option>
                      <option value="G-NETWORK">G-NETWORK</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="jmlpoin" placeholder="Poin">
                     <?php echo form_error('jmlpoin','<small class="btn btn-danger btn-block btn-flat"">','</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                
                <input type="submit" class="btn btn-block btn-custom-green" value="Transfer" />

            </form>
        </div>
    </div>
 
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>