<div class="container">
<div class="container mt-4">
    <h1 class="display-4"><?= $judul; ?></h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="display-4 mx-auto"><?= $pemesanan['id_pesan']; ?></div>
            </div>
        </div>
    </div>
    <h5 class="mt-3">Nama : <?= $user['nama']; ?></h5>
    <h5 class="mt-3">Kode Pembayaran : <?= $pemesanan['id_pesan']; ?></h5>
    <h5 class="mt-3">Tujuan : <?= $pemesanan['rute']; ?></h5>
    <h5 class="mt-3">Jam Keberangkatan : <?= $pemesanan['jam_berangkat']; ?></h5>
    <h5 class="mt-3">Harga : Rp.<?= $pemesanan['harga']; ?></h5>
    <h5 class="mt-3">Kursi yang di pesan : <?= $pemesanan['kursi']; ?></h5>
    <h5 class="mt-3">Tanggal Berangkat : <?= $pemesanan['tgl_berangkat']; ?></h5>
    <h5 class="mt-3">Status Pembayaran : <?= $pemesanan['status']; ?></h5>
</div>

<div class="container text-right mb-5">
    <hr>
    <h5 class="mt-5">Total Bayar : Rp.<?= $pemesanan['harga'] * $pemesanan['kursi'];?></h5>
    <a href="" onclick="print()" class="btn btn-danger float-left mt-3"><i class="fas fa-print"></i> Cetak Bukti</a>
    <a href="<?= base_url('user'); ?>" class="btn btn-success mt-3">Kembali Memesan</a>
</div>
</div>