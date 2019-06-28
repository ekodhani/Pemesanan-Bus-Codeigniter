    <!-- sidebar -->
    <div id="container">
        <div id="sidebar">
            <ul class="sidebar-nav">
                <li class="text-center">
                    <img src="<?= base_url('assets/image/user/') . $user['image']; ?>" class="rounded-circle sidebar-brand mt-5">
                    <h6 class="pt-1 text-white"><?= $user['nama']; ?></h6>
                </li>
                <hr>
                <li class="mt-5">
                    <a href="<?= base_url('user'); ?>"><i class="fas fa-list-ul"></i> Daftar Bus</a>
                </li>
                <li>
                    <a href="<?= base_url('user/pemesanan'); ?>"><i class="fas fa-ticket-alt"></i> Pemesanan</a>
                </li>
                <li>
                    <a href="<?= base_url('user/transaksi'); ?>"><i class="fas fa-history"></i> Riwayat Pemesanan</a>
                </li>
                <li>
                    <a href="<?= base_url('user/edit_profil'); ?>"><i class="fas fa-user"></i> Profil</a>
                </li>
                <li>
                    <a href="<?= base_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    <!-- akhir sidebar -->