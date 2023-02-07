<div class="container">
    <div class="row g-0">
        <div class="col-6">
            <div class="bg-image"></div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4"><?= $judul; ?></h1>
                    <?php if($this->session->flashdata('message')) { ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php } else if($this->session->flashdata('message-success')) {?>
                    <div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
                    <?php } ?>
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
                        <!-- untuk reset password -->
                        <!-- <div class="mb-3 text-center">
                            <a href="<?= base_url('login/reset_password'); ?>">Forgot password ?</a>
                        </div> -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="mb-3 btn btn-primary"><?= $judul; ?></button>
                        </div>
                        <p class="text-center">Belum Punya Akun? <a href="<?= base_url('login/daftar'); ?>">Daftar</a></p>
                    </form>
                    <!-- untuk OAuth Login -->
                    <!-- <span class="divider line one-line">Or</span>
                    <div class="d-grid gap-2">
                        <a href="" class="btn btn-outline-primary">
                            <div class="row">
                                <div class="col-2">
                                    <img src="<?= base_url('assets/image/icon/google.png'); ?>" alt="Google" width="20">
                                </div>
                                <div class="col-10">
                                    Login with Google
                                </div>
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>