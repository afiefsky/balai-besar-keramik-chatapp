<?php
    echo form_open('auth/login', ['class' => 'form-signin']);

    echo $error;
    $this->session->unset_userdata('error');
?>
<p align="center">
  <img src="<?php echo base_url(); ?>assets/images/logo-black.png" height="120" width="110" />
</p>
<h2 class="form-signin-heading">BKK Chat</h2>
<table class="table table-bordered">
  <tbody>
      <tr>
          <td>Username</td>
          <td>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
          </td>
      </tr>
      <tr>
          <td>Password</td>
          <td>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </td>
      </tr>
  </tbody>
</table>
<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button> <br />
<?php echo anchor('auth/register', 'Register', ['class' => 'btn btn-lg btn-info btn-block']); ?>
<?php
    echo form_close();
?>