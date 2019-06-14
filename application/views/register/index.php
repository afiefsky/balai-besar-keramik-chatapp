<h2 align="center" style="background: red; color: white;">
<?php
  $message = $this->session->flashdata('message');

  if (!!$message) {
    echo $message;
  }
?></h2>
<div align="center" style="color: white;">
  <h2>Form Registrasi</h2>
  <table class="table table-bordered">
    <?php echo form_open('auth/register'); ?>
        <tbody style="line-height: 1.5;">
            <!-- Nama (depan) -->
            <tr>
              <td colspan="2">Nama Depan <b style="color: red;">*</b></td>
            </tr>
            <tr>
              <td width="35%" colspan="2"><input type="text" name="first_name" class="form-control" placeholder="Ralph Edwin" required></td>
            </tr>

            <!-- Nama (belakang) -->
            <tr>
              <td colspan="2">Nama Belakang</td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" name="last_name" class="form-control" placeholder="Scott" required></td>
            </tr>

            <tr><td colspan="2"><br/></td></tr>

            <!-- Email -->
            <tr>
              <td colspan="2">Email <b style="color: red;">*</b></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" name="email" class="form-control" placeholder="scottedwin21@gmail.com" required></td>
            </tr>

            <!-- Konfirmasi Email -->
            <tr>
              <td colspan="2">Konfirmasi Email <b style="color: red;">*</b></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" name="email_confirm" class="form-control" placeholder="scottedwin21@gmail.com" required></td>
            </tr>

            <tr><td><br/></td></tr>

            <!-- Password -->
            <tr>
              <td colspan="2">Password <b style="color: red;">*</b></td>
            </tr>
            <tr>
              <td colspan="2"><input type="password" name="password" class="form-control" placeholder="#3XaMpLeP4sSw0rD!" required></td>
            </tr>

            <!-- Konfirmasi Password -->
            <tr>
              <td colspan="2">Konfirmasi Password <b style="color: red;">*</b></td>
            </tr>
            <tr>
              <td colspan="2"><input type="password" name="password_confirm" class="form-control" placeholder="#3XaMpLeP4sSw0rD!" required></td>
            </tr>

            <tr>
              <td>
                <input type="submit" name="submit" class="btn btn-primary btn-sm" style="width: 30%;" value="Register">
              </td>
              <td align="right">
                <?php echo anchor('auth', 'Cancel', ['class' => 'btn btn-sm', 'style' => 'text-decoration: none;']); ?>
              </td>
            </tr>

            <!--
            <tr>
              <td align="right">Username : </td>
              <td><input type="text" name="username" class="form-control" placeholder="Username" required></td>
            </tr>
            -->
        </tbody>
    <?php echo form_close(); ?>
  </table>
</div>
