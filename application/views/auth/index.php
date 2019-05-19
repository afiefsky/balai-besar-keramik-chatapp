<?php
    echo form_open('auth/login', ['class' => 'form-signin']);
?>
<div class="login">
  <div align="center"><img src="<?php echo base_url(); ?>assets/images/logo.png" height="140" width="115" /></div>
  <h1>BBK Login</h1>
  <h4 style="color: white; background: red;">
    <?php
      if (!!$error) echo $error;

      $this->session->unset_userdata('error');
    ?>
  </h4>
  <form method="post">
    <input type="text" name="username" placeholder="Username" required="required" autofocus/>
    <input type="password" name="password" placeholder="Password" required="required" autocomplete="off" />
    <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login</button>
  </form>
  <p>
    <?php echo anchor('auth/register', 'Baru? Buat akun di sini.', ['class' => '']) ?>
  </p>
</div>
<!-- <?php echo anchor('auth/register', 'Register', ['class' => 'btn btn-lg btn-info btn-block']); ?> -->
<?php
    echo form_close();
?>
