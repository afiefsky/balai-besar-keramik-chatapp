<h2>Daftar Chat User <?php echo $this->uri->segment(3) ?></h2>
<h2 align="center" style="background: green; color: white;">
    <?php
    $message = $this->session->flashdata('message');

    if ((bool) $message) {
        echo $message;
    }
    ?>
</h2>
<?php echo anchor('user/create', 'Create User', ['class' => 'btn btn-primary']); ?>

<br /><br />

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Chat ID</td>
        <th>User ID</td>
        <th>Nama Belakang</td>
        <th>Status Keaktifan</td>
        <th>Aksi</td>
    </tr>
    <?php
    $no = 0;

    foreach ($chats->result() as $chat) {
        $no++;
        echo "<tr>
            <td>$no</td>
            <td>$chat->topic</td>
            <td>" . anchor('chat/user/' . $chat->id, 'Check', ['class' => 'btn btn-primary btn-sm']) . "</td>
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