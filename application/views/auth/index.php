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
<!-- Login start -->
<div class="login">
    <div align="center">
        <img src="<?php echo base_url(); ?>assets/images/logo.png" height="140" width="115" />
    </div>
    <h1>BBK Login</h1>
    <h4 style="color: white; background: red;">
        <?php
        if ((bool) $error) {
            echo $error;
        }

        $this->session->unset_userdata('error');
        ?>
    </h4>

    <input type="text" name="email" placeholder="nama@email.com" required="required" autofocus/>
    <input type="password" name="password" placeholder="**********" required="required" autocomplete="off" />
    <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login</button>

    <p align="right" style="color: white;">
        Atau register di <?php echo anchor('auth/register', 'sini', ['style' => 'color: cyan;']) ?>
    </p>

    <table style="width: 100%">
        <tr>
            <td style="color: white; float: right;">Atau login menggunakan google </td>
        </tr>
        <tr>
            <td style="float: right;">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
            </td>
        </tr>
    </table>
</div>
<!-- End login -->
<?php
echo form_close();
?>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script>
    function onSignIn(googleUser) {
        let profile = googleUser.getBasicProfile()
        let user = {
            id: profile.getId(),
            name: profile.getName(),
            image_url: profile.getImageUrl(),
            email: profile.getEmail()
        }

        let BASE_URL = '<?php echo getenv('BASE_URL'); ?>'
        let URL = BASE_URL + '/index.php/auth/getuser'
        axios.post(URL, user)
            .then(function (response) {
                // handle success
                console.log(response)

                let result = response.data
                if (result !== false) {
                    localStorage.setItem('user', JSON.stringify(result))

                    location.replace(BASE_URL + '/index.php/dashboard')
                }
                else {
                    console.log(false)
                }
            })
            .catch(function (error) {
                // handle error
                console.log(error)
            })
    } // End onSignIn
</script>
