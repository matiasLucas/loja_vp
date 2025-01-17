<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/res/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/res/admin/plugins/iCheck/square/blue.css">  
 

</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Página de Administração</b> Loja VP</a>
  </div>
  <div class="login-box-body">
     <p class="login-box-msg">Entre com usuário e senha</p>

    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
    <?php } ?>   

    <form name="formLogin" id="formLogin" action="/admin/login" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuário" name="login" id="login">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Senha" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
      </div>
    </form>

  </div>
</div>
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/res/admin/plugins/jQuery/jquery.validate.min.js"></script>  
<script src="/res/admin/plugins/jQuery/localization/messages_pt_BR.js"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $("#formLogin").validate({
      rules:{
        login:{                  
          required: true
        },
        password:{                  
          required: true
        }
      }         
    })
  })
</script>

</body>
</html>
