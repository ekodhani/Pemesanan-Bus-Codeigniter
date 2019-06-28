<div class="container">
<div class="container mt-2">
    <h1 class="display-4"><?= $judul; ?></h1>
</div>

<div class="container mt-2">
    <a href="" onclick="print()"class="btn btn-success mt-3 mb-3"><i class="fas fa-print"></i> Print</a>
    <table class="table table-sm">
    <thead>
        <tr>        
        <th scope="col">Kode Pesan</th>
        <th scope="col">Kode Bus</th>
        <th scope="col">Email</th>
        <th scope="col">Tgl Berangkat</th>
        <th scope="col">Jumlah Kursi Yang Di Pesan</th>
        <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ( $transaksi as $t ){ ?>
        <tr>        
        <td><?= $t->id_pesan ?></td>
        <td><?= $t->kode_bis ?></td>
        <td><?= $t->email ?></td>
        <td><?= $t->tgl_berangkat ?></td>
        <td><?= $t->kursi ?></td>
        <td><?= $t->status ?></td>
        </tr>
    <?php } ?>        
    </tbody>
    </table>
</div>
</div>