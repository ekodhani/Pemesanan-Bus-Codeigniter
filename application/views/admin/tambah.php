<div class="container">
    <h1 class="display-4 mt-4 mb-4 text-center"><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>
</div>

<div class="container">
    <div class="card bg-light mb-3 mx-auto" style="max-width: 50rem;">
    <div class="card-header text-center font-weight-bolder"><?= $judul; ?></div>
        <div class="card-body">
            <form action="<?= base_url('admin/tambahact'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Bus</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kursi">Jumlah Kursi</label>
                    <input type="text" class="form-control" id="kursi" name="kursi">
                    <?= form_error('kursi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <option value="Premium">Premium</option>
                        <option value="Reguler">Reguler</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="rute">rute</label>
                    <textarea class="form-control" id="rute" rows="3" name="rute"></textarea>
                    <?= form_error('rute', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-block btn-primary mt-4">Tambah</button>
            </form>
        </div>
    </div>
</div>