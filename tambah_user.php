<div class="page-header">
    <h1>Tambah Pengguna</h1>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form action="aksi.php?act=tambah_user" method="POST">
             <div class="form-group" hidden>
                <label>Kode <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kode_user" value="<?= set_value('kode_user', kode_oto('kode_user', 'tb_admin', 'U', 3)) ?>" />
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
