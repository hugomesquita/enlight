<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?= base_url('assets/images/logo-splash.svg') ?>" type="image/svg" />
  <title>Painel Enlight</title>
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/signin.css') ?>" rel="stylesheet">
</head>
<body class="text-center bg-primary">
  <form class="form-signin" method="POST"  action="<?=base_url('painel/login/token')?>">
    <img style="width:100%" class="mb-4" src="<?= base_url('assets/images/logo-enl.png') ?>" alt=""> 
    <input autocomplete="off" type="email" name="LoginAP" id="LoginAP" class="form-control" placeholder="Usuário / username" required autofocus> 
    <input autocomplete="off" type="password" name="SenhaAP" id="SenhaAP" class="form-control" placeholder="Senha / password" required>
    <div class="checkbox mb-3">
      <label><input type="checkbox" value="remember-me"> Lembrar meu login</label>
    </div>
    <?php echo validation_errors(); ?>
    <button class="btn btn-lg btn-outline-light btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
  </form>
</body>
</html>