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
                    <a href="<?= base_url('admin'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/daftarbus'); ?>"><i class="fas fa-bus"></i> Daftar Bus</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/datauser'); ?>"><i class="fas fa-users"></i> Data user</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/datatransaksi'); ?>"><i class="fas fa-money-check-alt"></i> Data Transaksi</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/edit_profil'); ?>"><i class="fas fa-user-cog"></i> Profil</a>
                </li>
                <li>
                    <a href="<?= base_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    <!-- akhir sidebar -->