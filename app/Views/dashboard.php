<?= $this->extend('base'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-3 table-responsive">
    <div class="card">
        <div class="card-header">
            <b>Data Pengguna</b>
        </div>
        <div class="card-body">
            <a class="btn btn-secondary mb-3" href="/add">Add User</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead <?php if(!$user) echo "style=\"display:none;\""; ?>>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($user as $row) : ?>
                        <tr>
                            <th class="py-3"><?= $row['id']; ?></th>
                            <td class="py-3"><?= $row['nama']; ?></td>
                            <td class="py-3"><?= $row['alamat']; ?></td>
                            <td class="text-end">
                                <a class="btn btn-secondary" href="/edit/<?= $row['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="/delete/<?= $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>
