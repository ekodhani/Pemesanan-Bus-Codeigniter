<div class="container">
    <h1 class="display-4 mt-2 mb-3">Selamat datang <?= $user['nama']; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="card bg-info">
                    <div class="card-body mb-2 mt-2">
                        <h5 class="card-title mb-2 text-white"><i class="fas fa-bus"></i> Daftar Bus</h5>
                        <a href="<?= base_url('admin/daftarbus'); ?>" class="btn btn-danger mt-2">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-info">
                    <div class="card-body mb-2 mt-2">
                        <h5 class="card-title mb-2 text-white"><i class="fas fa-users"></i> Data User</h5>
                        <a href="<?= base_url('admin/datauser'); ?>" class="btn btn-danger mt-2">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-info">
                    <div class="card-body mb-2 mt-2">
                        <h5 class="card-title mb-2 text-white"><i class="fas fa-money-check-alt"></i> Data Transaksi</h5>
                        <a href="<?= base_url('admin/datatransaksi'); ?>" class="btn btn-danger mt-2">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
