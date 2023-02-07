<div class="container-fluid">
    <div class="row g-0">
        <div class="col-6">
            <div class="card border">
                <div class="card-body">
                    <h1 class="card-title mt-5 text-center mb-4"><?= $judul; ?></h1>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('login/daftar'); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" name="name" required="" value="<?= set_value('name'); ?>">
                            <label for="name">Full name</label>
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                        <div class="inputBox">
                            <input type="number" name="no_telp" required="" value="<?= set_value('no_telp'); ?>">
                            <label for="no_telp">Number phone</label>
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
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
                        <div class="inputBox">
                            <input type="password" name="confirm_password" required="">
                            <label for="confirm_password">Confirm password</label>
                            <?= form_error('confirm_password', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="mb-3 btn btn-primary"><?= $judul; ?></button>
                        </div>
                        <p class="text-center">Sudah punya akun ? <a href="<?= base_url('login'); ?>">Login</a></p>
                    </form>
                    <!-- untuk OAuth Signup -->
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
        <div class="col-6">
            <div class="bg-image-register"></div>
        </div>
    </div>
</div>