<?php
// Verifica se existe login na sessao. Caso não exista, desvia para a tela de login.
//include_once(.)"libs/seguranca.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrativa | Sistema</title>

    <meta description="Área Administrativa">
    <meta author="Fernando A. R. Reis">
    <meta rel="icon" href="">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo MAINURL?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo MAINURL?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo MAINURL?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo MAINURL?>dist/css/skins/_all-skins.min.css">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
  
    <div class="wrapper">

      <!--Inicio Main Header-->
      <?php include_once("principal-header.php"); ?>
      <!--Fim Main Header-->
      
      <!--Inicio Main Sidebar-->
      <?php include_once("principal-sidebar.php"); ?>
      <!--Fim Main Sidebar-->

      <!--Inicio Conteúdo-->
      <?php include_once("principal-content.php"); ?>
      <!--Fim Conteúdo-->

      <!--Inicio Rodapé-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016. Design por <a href="">FREIS Studio</a>.</strong> Todos os direitos reservados.
      </footer>
      <!--Fim Rodapé-->

      <!-- Inicio Control Sidebar 
       include_once("principal-control-sidebar.php"); 
      Fim Control Sidebar 

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar 
      <div class="control-sidebar-bg"></div>
      -->

    </div><!-- ./wrapper -->

    <!-- Inicio Controles Javascript  -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo MAINURL?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo MAINURL?>bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo MAINURL?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo MAINURL?>dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo MAINURL?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap 
    <script src="/phpMVC/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/phpMVC/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
    <!-- SlimScroll 1.3.0 -->
<!--    <script src="/phpMVC/plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
    <!-- ChartJS 1.0.1 
    <script src="/phpMVC/plugins/chartjs/Chart.min.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="/phpMVC/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo MAINURL?>dist/js/demo.js"></script>
    <!-- Fim Controles Javascript  -->

  </body>
</html>
