<div class="container">
<div class="container mt-4">
  <h1 class="display-4 mb-3"><?= $judul; ?></h1>
  <?= $this->session->flashdata('message'); ?>
</div>

<div class="container mt-5 mb-5">
  <div class="row">
    <?php foreach ( $bus as $bis ){ ?>
      <div class="col-5">
        <div class="card-deck">
          <div class="card">
            <img src="<?= base_url('assets/image/bus/') . $bis->image ?>" class="card-img-top">
            <div class="card-body">
              <label>Nama Bus</label>
              <h5 class="card-title"><?= $bis->nama_bis ?></h5>
              <label>Rute</label>
              <h5 class="card-title"><?= $bis->rute ?></h5>
              <label for="harga">Harga</label>
              <h5 class="card-title"><?= $bis->harga ?></h5>
              <a href="<?= base_url();?>user/detailBus/<?= $bis->kode_bis;?>" class="btn btn-info">See Detail</a>
              <a href="<?= base_url();?>user/bookingBus/<?= $bis->kode_bis;?>" class="btn btn-primary">Booking</a>
            </div>
          </div>
        </div>
      </div>
    <?php }?>                
  </div>
</div>
</div>