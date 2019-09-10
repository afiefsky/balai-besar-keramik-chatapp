<h2>Daftar Lawan Bicara <?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h2>
<h2 align="center" style="background: green; color: white;">
    <?php
    $message = $this->session->flashdata('message');

    if ((bool) $message) {
        echo $message;
    }
    ?>
</h2>
<?php echo anchor('admin/index', 'Kembali', ['class' => 'btn btn-info']); ?>

<br /><br />

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Depan</td>
        <th>Nama Belakang</td>
        <th>Aksi</td>
    </tr>
    <?php
    $no = 0;

    if ($chats->num_rows() === 0) {
        echo "<tr><td colspan='4'>Tidak ada percakapan ditemukan</td></tr>";
    }

    foreach ($chats->result() as $chat) {
        $no++;
        echo "<tr>
            <td>$no</td>
            <td>$chat->first_name</td>
            <td>$chat->last_name</td>
            <td>" . anchor('chat/delete/' . $chat->id, 'Hapus', ['class' => 'btn btn-danger btn-sm']) . "</td>
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