<h3>Pilih Layanan</h3>
<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Layanan</th>
            <th>Icon</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>R & D</td>
            <td>-icon here-</td>
            <td><button class="btn btn-sm btn-info">Pilih</button></td>
        </tr>
    </tbody>
</table>

<!-- <table class="table table-bordered">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php
    $no = 0;
    $logged_status = 0;
    foreach ($record->result() as $r) {
        $no++;

        if ($r->is_logged_in == 1) {
            $logged_status = '<b><img src="'.base_url().'assets/images/green-circle.png" width="20px" />&nbsp;<u>Online</b>';
        } else {
            $logged_status = '<img src="'.base_url().'assets/images/red-circle.png" width="20px" />&nbsp;Offline';
        }

        echo "<tr>
            <td>$no</td>
            <td>$r->first_name $r->last_name</td>
            <td>$logged_status</td>
            <td>".anchor('chat/redirect/'.$this->session->userdata('user_id').'/'.$r->id, 'Chat', ['class' => 'btn btn-primary btn-sm']).'</td>
        </tr>';
    }
    ?>
    </tbody>
</table> -->
</p>

<!-- <p>
    <table width="100%">
    <tr>
        <td align="center" style="background: #529a33;">
        <a href="https://wa.me/62895343775002" style="color: #ffffff;">Live Chat Whatapp, Klik Di Sini</a>
        </td>
    </tr>
    </table>
</p> -->
<!-- <script src="<?php echo base_url(); ?>js/dashboard.js" type="text/javascript"></script> -->
