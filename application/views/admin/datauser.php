<div class="container mt-2">
    <div class="display-4 mb-3"><?= $judul; ?></div>
    <div class="row">
        <div class="col-6">
        <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    
</div>
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-6">
            <ul class="list-group">
                <?php foreach ( $anggota as $ang ){ ?>
                <li class="list-group-item">
                    <?= $ang->nama; ?>
                    <a href="<?= base_url();?>admin/hapususer/<?= $ang->id_user; ?>" onclick="return confirm('Yakin?');" class="badge badge-pill badge-success float-right">Hapus</a>
                    <a href="<?= base_url();?>admin/detailuser/<?= $ang->id_user; ?>" class="badge badge-pill badge-info mr-2 float-right">detail</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>