<div class="container">
    <h1 class="display-4"><?= $judul; ?></h1>
</div>
<div class="container mt-4 mb-5">
    <div class="card mx-auto" style="width : 30rem;">
        <img src="<?= base_url('assets/image/bus/') . $detail['image']; ?>" class="card-img-top">
        <div class="card-body">
            <h4 class="card-title">Nama PO</h4>
            <p class="card-text"><?= $detail['nama_bis']; ?></p>
            <h4 class="card-title">Jumlah Kursi</h4>
            <p class="card-text"><?= $detail['kursi']; ?></p>
            <h4 class="card-title">Jam keberangkatan</h4>
            <p class="card-text"><?= $detail['jam_berangkat']; ?></p>
            <h4 class="card-title">Kelas</h4>
            <p class="card-text"><?= $detail['kelas']; ?></p>
            <h4 class="card-title">Keterangan</h4>
            <p class="card-text"><?= $detail['keterangan']; ?></p>
            <h4 class="card-title">Rute</h4>
            <p class="card-text"><?= $detail['rute'];?></p>
            
            <a href="<?= base_url('admin/daftarbus'); ?>" class="btn btn-info">Kembali</a>
            <a href="<?= base_url();?>admin/editBus/<?= $detail['kode_bis'];?>" class="btn btn-success">Edit</a>
            <a href="<?= base_url();?>admin/hapusBus/<?= $detail['kode_bis'];?>" onclick="return confirm('Yakin?');" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
