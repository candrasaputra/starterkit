<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
    <link href="<?php echo base_url(); ?>/assets/favicon.png" rel="icon" sizes="192x192" />
  <link href="<?php echo base_url(); ?>/assets/favicon.png" rel="icon" sizes="128x128" />
  
  <link rel="stylesheet" href="<?php echo base_url('assets/calmlogin/css/style-custom.css'); ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel=icon href="<?php echo base_url();?>assets/favicon.png" sizes="16x16" type="image/png">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/login/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/login/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/login/dist/css/Login.css">
</head>

<body>
  <div class="container">
      <div class="card card-container">
          <img id="img-front" class="img-responsive center-block" src="<?php echo base_url();?>assets/favicon.png" />
          <p id="profile-name" class="profile-name-card">
            Selamat Datang!<br/>
          </p>
            <div class="profile-name-card">
              <center>
                <div id="infoMessage"><?php echo $message;?></div>
              </center>
            </div>
            <?php $attributes = array('class' => 'form-signin', 'data-toggle' => 'validator'); ?>
            <?php echo form_open("login", $attributes);?>
                <?php
                  $identity['required'] = 'required';
                  $identity['placeholder'] = 'Username';
                  $identity['class'] = 'form-control';
                  $password['required'] = 'required';
                  $password['placeholder'] = 'Password';
                  $password['class'] = 'form-control';

                  switch ($_SERVER['HTTP_HOST']) {
                    case 'localhost':
                      $identity['value'] = '';
                      $password['value'] = '';
                      break;
                    default:
                      $identity['value'] = '';
                      $password['value'] = '';
                      break;
                  }
                ?>
                <div class="input-container">
                  <?php echo form_input($identity);?>
                  <div class="bar"></div>
                </div>
                <div class="input-container">
                  <?php echo form_input($password);?>
                  <div class="bar"></div>
                </div>
                <div class="button-container">
                  <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">Login</button>
                </div>
              <?php echo form_close();?>
              <p><a href="forgot_password" class="forgot-password"><?php echo lang('login_forgot_password');?></a></p>
      </div>
  </div>
</body>
</html>