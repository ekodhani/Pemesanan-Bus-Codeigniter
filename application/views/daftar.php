<div class="container mt-3 mb-5">
    <div class="row">
        <div class="col mt-4 mb-5">
            <div class="card mt-5 mx-auto" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4"><?= $judul; ?></h5>
                    <form action="<?= base_url('login/daftar'); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" name="nama" required="">
                            <label for="nama">Nama Lengkap</label>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="notelp" required="">
                            <label for="notelp">Nomor Telepon</label>
                            <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" required="">
                            <label for="email">Email</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" required="">
                            <label for="password">Password</label>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password1" required="">
                            <label for="password">Retype Password</label>
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <p class="text-white-50">Sudah Punya Akun? <a href="<?= base_url('login'); ?>" class="text-white">Masuk</a></p>
                        <button type="submit" class="mt-4 btn btn-primary btn-block"><?= $judul; ?> <i class="fas fa-user-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 