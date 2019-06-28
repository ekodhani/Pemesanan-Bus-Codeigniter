<div class="container">
<div class="container mt-2">
    <h1 class="display-4"><?= $judul; ?></h1>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="tgl_keberangkatan">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control" id="tgl_keberangkatan" name="tgl_berangkat">
                    <?= form_error('tgl_berangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kursi">Jumlah Kursi</label>
                    <select class="form-control" id="kursi" name="kursi">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group float-right">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $detail['harga']; ?>" style="border : hidden; background-color : white; " readonly>
                    <!--  -->
                    <label for="jam_berangkat" class="mt-3">Jam Keberangkatan</label>
                    <input type="text" class="form-control" id="jam_berangkat" name="jam_berangkat" value="<?= $detail['jam_berangkat']; ?>" style="border : hidden; background-color : white; " readonly>
                    <!--  -->
                    <label for="rute" class="mt-3">Rute</label>
                    <input type="text" class="form-control" id="rute" name="rute" value="<?= $detail['rute']; ?>" style="border : hidden; background-color : white; " readonly>
                    <!--  -->
                </div>

                <button type="submit" class="btn btn-primary">Kirim</button>
                <a href="<?= base_url('user'); ?>" class="btn btn-info">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>