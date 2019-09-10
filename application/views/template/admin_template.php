<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    if ($this->session->userdata('role') == 1) {
        $link = 'assets/css/chat.css';
    } else {
        $link = 'assets/css/chat_admin.css';
    }
    ?>
    <title>BBK Chat</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/icons/logo-white.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/camera.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . $link; ?>">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/'; ?>jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/latest-v2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript">
      var base_url = "<?php echo base_url(); ?>"
    </script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/dashboard">
            <img src="<?php echo base_url(); ?>assets/images/logo.png" height="30" width="35" />
          </a>
          <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/admin">
            BBK Chat
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>
            <?php
            if ($this->session->userdata('role') == 1) {
                echo anchor('magazine', 'Notice Board');
            } else {
            }
            ?>
            </li>
            <li>
            <?php
            if ($this->session->userdata('role') == 1) {
                echo anchor('chat/group', 'Group Chat');
            } else {
            }
            ?>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo base_url(); ?>uploads/avatars/<?php echo $this->session->userdata('avatar'); ?>" height="25" width="30" />
                  <?php echo $this->session->userdata('first_name'); ?>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('user/setting/'.$this->session->userdata('user_id'), 'Pengaturan'); ?></li>
                <li role="separator" class="divider"></li>
                <li><?php echo anchor('auth/logout', 'Keluar'); ?></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">
      <?php echo $contents; ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
