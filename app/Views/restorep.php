<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? esc($title) : 'Judul' ?> -</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data Pesanan Terhapus</h6>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pemilik</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Merek Genset</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($deletedPesanan)): ?>
                    <?php foreach ($deletedPesanan as $order) : ?>
                    <tr>
                        <td><?= esc($order->nama_pemilik) ?></td>
                        <td><?= esc($order->no_telp) ?></td>
                        <td><?= esc($order->alamat) ?></td>
                        <td><?= esc($order->merk_genset) ?></td>
                        <td><?= esc($order->status) ?></td>
                        <td>
                            <a href="<?= base_url('home/restore2/' . esc($order->id_pesanan)) ?>" class="btn btn-sm btn-success">Restore</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pesanan yang dihapus</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
