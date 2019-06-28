<div class="container mt-2">
    <h1 class="display-4"><?= $judul; ?></h1>
</div>
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-6">
        <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    
    <a href="<?= base_url('admin/tambah'); ?>" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah Data BUS</a>
        <div class="row">
                <?php foreach ( $bus as $bis ){ ?>
                <div class="col-5">
                    <div class="card-deck">
                        <div class="card">
                            <img src="<?= base_url('assets/image/bus/') . $bis->image ?>" class="card-img-top">
                            <div class="card-body">
                                <label for="nama">Nama PO</label>
                                <h5 class="card-title"><?= $bis->nama_bis ?></h5>
                                <label for="rute">Rute</label>
                                <p class="card-text"><?= $bis->rute ?></p>
                                <a href="<?= base_url();?>admin/detailBus/<?= $bis->kode_bis;?>" class="btn btn-info">Detail</a>
                                <a href="<?= base_url();?>admin/editBus/<?= $bis->kode_bis;?>" class="btn btn-success">Edit</a>
                                <a href="<?= base_url();?>admin/hapusBus/<?= $bis->kode_bis;?>" class="btn btn-danger" onclick="return confirm('Yakin?');">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>                
        </div>
</div>
