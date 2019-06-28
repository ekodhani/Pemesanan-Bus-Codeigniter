<div class="container">
<div class="card mx-auto mt-5" style="width: 90%;">
    <div class="card-body">
        <h1 class="display-4"><?= $judul; ?></h1>
        <hr>
        <form action="<?= base_url('user/edit_profil'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>" name="nama">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="no_telp">Nomer Telepon</label>
                <input type="text" class="form-control" id="no_telp" value="<?= $user['no_telp']; ?>" name="notelp">
                <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="gambar" class="font-weight-bold">Gambar</label><br>
                <div class="row">
                    <div class="col-2">
                        <img src="<?= base_url('assets/image/user/') . $user['image']; ?>" class="rounded-circle">
                    </div>
                    <div class="col">
                        <input type="file" name="image" class="form-control-file mt-2">
                        <small id="gambar" class="form-text text-muted">Maximal Resolusi Gambar 60x60.</small>
                    </div>
                </div>                
            </div>
            <button type="submit" class="btn btn-block btn-success mt-4"><i class="far fa-edit"></i> Edit</button>
        </form>
    </div>
</div>
</div>