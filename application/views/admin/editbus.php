<div class="container">
<div class="card mx-auto mt-5" style="width: 90%;">
    <div class="card-body">
        <h1 class="display-4"><?= $judul; ?></h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kode_bis">Kode Bis</label>
                <input type="kode_bis" class="form-control" name="kode_bis" id="kode_bis" value="<?= $detail['kode_bis']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="name">Nama Bis</label>
                <input type="text" class="form-control" id="nama" value="<?= $detail['nama_bis']; ?>" name="nama_bis">
                <?= form_error('nama_bis', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="kursi">Jumlah Kursi</label>
                <input type="text" class="form-control" id="kursi" value="<?= $detail['kursi']; ?>" name="kursi">
                <?= form_error('kursi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jam_berangkat">Jam Berangkat</label>
                <input type="time" class="form-control" id="jam_berangkat" value="<?= $detail['jam_berangkat']; ?>" name="jam_berangkat">
                <?= form_error('jam_berangkat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select class="form-control" id="kelas" name="kelas">
                    <option>Premium</option>
                    <option>Reguler</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" value="<?= $detail['harga']; ?>" name="harga">
                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"><?= $detail['keterangan']; ?></textarea>
                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="rute">Rute</label>
                <input type="text" class="form-control" id="rute" value="<?= $detail['rute']; ?>" name="rute">
                <?= form_error('rute', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="gambar" class="font-weight-bold">Gambar</label><br>
                <div class="row">
                    <div class="col-2">
                        <img src="<?= base_url('assets/image/bus/') . $detail['image']; ?>" class="rounded" width="100">
                    </div>
                    <div class="col">
                        <input type="file" name="image" class="form-control-file mt-2">
                    </div>
                </div>                
            </div>
            <button type="submit" class="btn btn-block btn-success mt-4"><i class="far fa-edit"></i> Edit Bus</button>
        </form>
    </div>
</div>
</div>