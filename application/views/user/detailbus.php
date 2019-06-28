<div class="container text-center mt-3">
    <h1 class="display-4"><?= $judul; ?></h1>
</div>
<div class="container mt-4 mb-5">
    <div class="card mx-auto" style="width : 50%;">
        <img src="<?= base_url('assets/image/bus/') . $detail['image']; ?>" class="card-img-top">
        <div class="card-body">
            <h4 class="card-title">Nama Bus</h4>
            <p class="card-text"><?= $detail['nama_bis']; ?></p>
            <h4 class="card-title">Jumlah Kursi</h4>
            <p class="card-text"><?= $detail['kursi']; ?></p>
            <h4 class="card-title">Kelas</h4>
            <p class="card-text"><?= $detail['kelas']; ?></p>
            <h4 class="card-title">Jam Keberangkatan</h4>
            <p class="card-text"><?= $detail['jam_berangkat']; ?></p>
            <h4 class="card-title">Keterangan</h4>
            <p class="card-text"><?= $detail['keterangan']; ?></p>
            <h4 class="card-title">Harga</h4>
            <p class="card-text"><?= $detail['harga']; ?></p>
            <h4 class="card-title">Rute</h4>
            <p class="card-text"><?= $detail['rute'];?></p>
            
            <a href="<?= base_url('user'); ?>" class="btn btn-info">Kembali</a>
            <a href="<?= base_url();?>user/bookingBus/<?= $detail['kode_bis'];?>" class="btn btn-primary">Booking</a>
        </div>
    </div>
</div>
