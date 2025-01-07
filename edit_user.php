<?php
$user = $db->get_row("SELECT * FROM tb_admin WHERE kode_user='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Edit Pengguna</h1>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form action="aksi.php?act=edit_user" method="POST">
            <input type="hidden" name="kode_user" value="<?= $user->kode_user ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $user->nama_user ?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?= $user->user ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level" required>
                    <option value="admin" <?= ($user->level == 'admin') ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= ($user->level == 'user') ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
