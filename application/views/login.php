<div class="container mt-5">
    <div class="row">
        <div class="col mt-5">
            <div class="card mt-5 mx-auto" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4"><?= $judul; ?></h5>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('login'); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" name="email" required="" value="<?= set_value('email'); ?>">
                            <label for="email">Email address</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" required="">
                            <label for="password">Password</label>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                        <p class="text-white-50">Belum Punya Akun? <a href="<?= base_url('login/daftar'); ?>" class="text-white">Daftar</a></p>
                        <button type="submit" class="mt-4 btn btn-primary btn-block"><?= $judul; ?> <i class="fas fa-sign-in-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 