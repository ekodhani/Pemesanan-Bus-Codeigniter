<div class="container">
<div class="container mt-4">
    <h1 class="display-4"><?= $judul; ?></h1>
    <hr>
</div>

<div class="container mt-2">
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-sm">
    <thead>
        <tr>        
        <th scope="col">Kode Bus</th>
        <th scope="col">Tgl Berangkat</th>
        <th class="text-center" scope="col">Jumlah Kursi Yang Di Pesan</th>
        <th scope="col">Jam Keberangkatan</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ( $pemesanan as $p ){ ?>
        <tr>
        <td><?= $p->kode_bis ?></td>
        <td><?= $p->tgl_berangkat ?></td>
        <td class="text-center"><?= $p->kursi ?></td>
        <td><?= $p->jam_berangkat ?></td>
        <td><?= $p->status ?></td>
        <td>
            <a href="<?= base_url();?>user/bayarbooking/<?= $p->id_pesan ?>" class="btn btn-success">Bayar</a>
            <a href="<?= base_url();?>user/batalbooking/<?= $p->id_pesan ?>" class="btn btn-danger">Batalkan</a>
        </td>
        </tr>
    <?php } ?>        
    </tbody>
    </table>
</div>
</div>