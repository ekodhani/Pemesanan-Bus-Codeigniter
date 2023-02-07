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
                    <form action="<?= base_url('login/reset_password'); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" name="email" required="" value="<?= set_value('email'); ?>">
                            <label for="email">Email address</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="mb-3 btn btn-primary"><?= $judul; ?></button>
                        </div>
                        <p class="text-center">Sudah punya akun? <a href="<?= base_url('login'); ?>">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>