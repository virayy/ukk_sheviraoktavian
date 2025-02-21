<body>
            <!-- Recent Sales Start -->
            <div class="d-flex align-items-center justify-content-between mb-4">
    <h6 class="mb-0">Users</h6>
    <div>
        <a href="<?= base_url('home/tambahuser') ?>" class="btn btn-sm btn-success">Tambah</a>
        <a href="" class="btn btn-sm btn-primary">Show All</a>
    </div>
</div>
                    <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
    <thead>
        <tr class="text-dark">
            <th scope="col">Username</th>
            <th scope="col">Level</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($nah as $key) { ?>
        <tr>
            <td><?= $key->username ?></td>
            <td><?= $key->level ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="<?= base_url('home/detailuser/' . $key->id) ?>">Detail</a>
                <a class="btn btn-sm btn-warning" href="<?= base_url('home/resetpassword/' . $key->id) ?>">Reset Password</a>
                <a class="btn btn-sm btn-danger" href="<?= base_url('home/hapususer/' . $key->id) ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

