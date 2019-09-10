<h2>Daftar User</h2>
<h2 align="center" style="background: green; color: white;">
    <?php
    $message = $this->session->flashdata('message');

    $login_user_id = $this->session->userdata('user_id');

    if ((bool) $message) {
        echo $message;
    }
    ?>
</h2>
<?php echo anchor('user/create', 'Create User', ['class' => 'btn btn-info']); ?>

<br /><br />

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Email</td>
        <th>Nama Depan</td>
        <th>Nama Belakang</td>
        <th>Status Keaktifan</td>
        <th>Aksi</td>
    </tr>
    <?php
    $no = 0;
    $aktif_status = '';
    $button_activate = '';
    foreach ($record->result() as $r) {
        if ($r->email === 'admin@mail.com') continue;

        if ($r->is_activated == 1) {
            $aktif_status = 'Aktif';
            $button_activate = '';
        } else {
            $aktif_status = 'Belum Aktif';
            $button_activate = anchor('user/activate/'.$r->id, 'Aktifkan!', ['class' => 'btn btn-success btn-sm']);
        }
        $no++;
        echo "<tr>
            <td>$no</td>
            <td>$r->email</td>
            <td>$r->first_name</td>
            <td>$r->last_name</td>
            <td>$aktif_status</td>
            <td>".
                anchor('chat/redirect/' . $login_user_id . '/' . $r->id, 'Chat', ['class' => 'btn btn-primary btn-sm']) . " " .
                anchor('chat/user/' . $r->id, 'Check', ['class' => 'btn btn-info btn-sm'])
            ."</td>
        </tr>";
    }
    ?>
</table>
<script>
const confirm = () => Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if (result.value) {
        Swal.fire(
            'Chat cleared!',
            'User chat has been cleared.',
            'success'
        )
    }
})
</script>