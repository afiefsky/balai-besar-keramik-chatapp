<h2 align="center" style="background: green; color: white;">
<?php
  $message = $this->session->flashdata('message');

  if ((bool) $message) {
    echo $message;
  }
?>
</h2>
<?php
    echo form_open('auth/login', ['class' => 'form-signin']);
?>
<div class="login">
  <div align="center"><img src="<?php echo base_url(); ?>assets/images/logo.png" height="140" width="115" /></div>
  <h1>BBK Login</h1>
  <h4 style="color: white; background: red;">
    <?php
      if ((bool) $error) {
          echo $error;
      }

      $this->session->unset_userdata('error');
    ?>
  </h4>
  <form method="post">
    <input type="text" name="email" placeholder="nama@email.com" required="required" autofocus/>
    <input type="password" name="password" placeholder="**********" required="required" autocomplete="off" />
    <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login</button>

    <p align="right" style="color: white;">
      Atau register di <?php echo anchor('auth/register', 'sini', ['style' => 'color: cyan;']) ?>
    </p>
  </form>
</div>
<?php
    echo form_close();
?>
