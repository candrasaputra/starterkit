<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>

  <link rel="stylesheet" href="<?php echo base_url()?>assets/template/lte2/bootstrap/css/bootstrap.min.css">
  <style type="text/css">
    body{background: #eee;}
    html,body{
        position: relative;
        height: 100%;
    }

    .login-container{
        position: relative;
        width: 500px;
        margin: 80px auto;
        padding: 20px 40px 40px;
        text-align: center;
        background: #fff;
        border: 1px solid #ccc;
    }

    .login-container::before,.login-container::after{
        content: "";
        position: absolute;
        width: 100%;height: 100%;
        top: 3.5px;left: 0;
        background: #fff;
        z-index: -1;
        -webkit-transform: rotateZ(4deg);
        -moz-transform: rotateZ(4deg);
        -ms-transform: rotateZ(4deg);
        border: 1px solid #ccc;

    }

    .login-container::after{
        top: 5px;
        z-index: -2;
        -webkit-transform: rotateZ(-2deg);
         -moz-transform: rotateZ(-2deg);
          -ms-transform: rotateZ(-2deg);

    }

    .avatar{
        width: 100px;height: 100px;
        margin: 10px auto 30px;
        background-size: cover;
    }

    .form-box input[class="cs"]{
        width: 100%;
        padding: 10px;
        text-align: center;
        height:40px;
        border: 1px solid #ccc;;
        background: #fafafa;
        transition:0.2s ease-in-out;

    }

    .form-box input[class="cs"]:focus{
        outline: 0;
        background: #eee;
    }

    .form-box input[class="cs"]{
        border-radius: 5px 5px 5px 5px;
        
    }

    .form-box select[class="cs"]{
        width: 100%;
        padding: 10px;
        text-align: center;
        height:40px;
        border: 1px solid #ccc;;
        background: #fafafa;
        transition:0.2s ease-in-out;

    }

    .form-box select[class="cs"]:focus{
        outline: 0;
        background: #eee;
    }

    .form-box select[class="cs"]{
        border-radius: 5px 5px 5px 5px;
        
    }

    .form-box input.login{
        margin-top:15px;
        padding: 10px 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="login-container">
        
        

        
        <img class="avatar" src="<?php echo base_url()?>assets/img/lain/lock.png">
       
        <div class="form-box">
        <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-danger alert-dismissible bts-bwh" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><?php echo $this->session->flashdata('message');?></center>
        </div>
        <?php endif ?>
        
        <div class="alert alert-info alert-dismissible bts-bwh" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><strong>TOLONG DIBACA!</strong><br/>Demi keamanan dan kenyamanan kedepannya Anda diwajibakan untuk mengubah password sebelum melanjutkan aktifitas ke dalam sistem ini. <br/> <strong>Perlu diingat bahwa Password ibarat identitas diri jadi jangan diberitahu ke yang lain ya!</strong> <br><br> BUTUH BANTUAN? Klik <a href="<?php echo base_url('assets/img/gantipass.jpg'); ?>" target="_blank" style="color: red;">disini</a>.</center>
        </div>
			<form action="<?php echo base_url('changepwd/process_ubah'); ?>" method="POST">
                    <span>Password Lama :</span>
                    <input type="password" class="cs" name="old" value="">
                    <br/><br/>
                    <span>Masukan Password baru :</span>
					<input type="password" class="cs" name="new" value="">
                    <br/><br/>
                    <span>Ulangi Password baru :</span>
                    <input type="password" class="cs" name="new_confirm" value="">
				<br/>
				<br/>
				<input type="submit" class="btn btn-primary btn-block login" value="Ubah">
			</form>
			<a href="<?php echo base_url('logout') ?>" class="btn btn-danger btn-block login">Logout</a>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
    $("input[type=password]").val('');
</script>