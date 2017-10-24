<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('X-Powered-By: Prod-domProjects.com');
header('X-XSS-Protection: 1');
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Vary: Accept-Encoding');

?>
<!doctype html>
    <html lang="<?php echo $lang; ?>">
        <head prefix="og: http://ogp.me/ns#">
        <meta charset="<?php echo $charset; ?>">
        <title>Home</title>
        <meta name="description" content="">
<?php if ($mobile === FALSE): ?>
        <!--[if IE 8]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
<?php else: ?>
        <meta name="HandheldFriendly" content="true">
<?php endif; ?>
<?php if ($mobile == TRUE && $mobile_ie == TRUE): ?>
        <meta http-equiv="cleartype" content="on">
<?php endif; ?>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta property="og:title" content="HOME">
        <meta property="og:type" content="article">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="domProjects">

            <!-- Bootstrap core CSS -->
    <link href="<?php echo ($frameworks_dir . '/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo ($frameworks_dir . '/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo ($frameworks_dir . '/bootstrap/css/grayscale.min.css'); ?>" rel="stylesheet">
    </head>
    <body>

    <header  class="masthead">
     <div class="intro-body ">
        <div class="container">
              <h1 style="text-shadow: -2px -2px 1px #464646;"  class="brand-heading">TerraVERDE</h1>

              <!-- ACCEDER PRINCIPAL -->
                <?php if ($user): ?>
                    <p style="text-shadow: -2px -2px 1px #464646;" class="intro-text">LOGUEADO COMO </p> <h3 style="text-shadow: -2px -2px 1px #464646;" ><?php echo $user_login['firstname'].$user_login['lastname']; ?> </h3>
                    <a href="<?php echo site_url('principal'); ?>" class="btn btn-circle js-scroll-trigger"><i style="text-shadow: -2px -2px 1px #464646;" class="fa fa-user  animated" title="Pagina principal"></i></a>
                <?php endif; ?>
              <!-- FIN ACCEDER PRINCIPAL -->


              <!-- ACCEDER ADMIN-->
                <?php if ($admin_link): ?>
                            <a href="<?php echo site_url('admin'); ?>" class="btn btn-circle js-scroll-trigger"><i style="text-shadow: -2px -2px 1px #464646;" class="fa fa-user-secret  animated" title="Pagina Administración"></i></a>
                <?php endif; ?>
              <!-- FIN ACCEDER ADMIN -->

              <!-- BOTON LOGIN O SALIR -->
                <?php if ($logout_link): ?>
                            <a class="btn btn-circle js-scroll-trigger" href="<?php echo site_url('auth/logout/public'); ?>"><i style="text-shadow: -2px -2px 1px #464646;" class="fa fa-times animated" title="Salir"></i></a>
                <?php else: ?>
                            <p style="text-shadow: -2px -2px 1px #464646;" class="intro-text">Bienvenido.</p>
                            <a class="btn btn-circle js-scroll-trigger" href="<?php echo site_url('auth/login'); ?>"><i style="text-shadow: -2px -2px 1px #464646;" class="fa fa-unlock-alt animated" title="Pagina login"></i></a>
                <?php endif; ?>
                <!-- FIN BOTON LOGIN O SALIR -->

        </div>
      </div>
    </header>

    </body>
</html>