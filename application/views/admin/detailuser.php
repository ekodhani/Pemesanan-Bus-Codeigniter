<div class="container">
    <h1 class="display-4"><?= $judul; ?></h1>
</div>
<div class="container mt-4 mb-5">
    <div class="card mx-auto" style="width : 20rem;">
        <img src="<?= base_url('assets/image/user/') . $anggota['image']; ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">ID User</h5>
            <p class="card-text"><?= $anggota['id_user']; ?></p>
            <h5 class="card-title">ID Role</h5>
            <p class="card-text"><?= $anggota['id_role']; ?></p>
            <h5 class="card-title">Nama User</h5>
            <p class="card-text"><?= $anggota['nama']; ?></p>
            <h5 class="card-title">No Telepon</h5>
            <p class="card-text"><?= $anggota['no_telp']; ?></p>
            <h5 class="card-title">Email Address</h5>
            <p class="card-text"><?= $anggota['email']; ?></p>
            
            
            <a href="<?= base_url('admin/datauser'); ?>" class="btn btn-info">Kembali</a>
            <a href="<?= base_url();?>admin/hapususer/<?= $anggota['id_user']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger">Hapus</a>
        </div>
    </div>
</div>
