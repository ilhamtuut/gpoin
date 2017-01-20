<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
 
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-4 col-md-offset-4 form-login">
    <?php if($this->session->flashdata('fail_login')) : ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('fail_login'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>
 
        <div class="outter-form-login">
          <div class="logo-login">
              <em class="glyphicon glyphicon-user"></em>
          </div>
              <form action="<?php echo base_url(); ?>auth/cek_login" class="inner-login" method="post">
              <h3 class="text-center title-login">Administrator</h3>

                  <div class="form-group">
                      <input type="text" class="form-control" name="username" placeholder="Username" required>
                  </div>

                  <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  
                  <input type="submit" class="btn btn-block btn-custom-green" value="Login"/>
                  
                  <!--div class="text-center forget">
                      <p>Forgot Password ?</p>
                  </div-->
              </form>
        </div>
    </div>
 
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  </body>
</html>