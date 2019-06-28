<div class="container">
    <div class="container mt-4">
        <h1 class="display-4"><?= $judul; ?></h1>
    </div>

    <div class="container mt-2">
        <table class="table table-sm">
            <thead>
                <tr>        
                    <th scope="col">Kode Bus</th>
                    <th scope="col">Tgl Berangkat</th>
                    <th scope="col">kursi</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ( $transaksi as $t ){ ?>
                <tr>
                    <td><?= $t->kode_bis ?></td>
                    <td><?= $t->tgl_berangkat ?></td>
                    <td><?= $t->kursi ?></td>
                    <td><?= $t->status ?></td>
                <tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>