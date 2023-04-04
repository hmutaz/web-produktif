<?= $this->extend('base'); ?>

<?= $this->section('content'); ?>

<div class="row py-3 mx-3">
    <div class="col-xl-4 col-md-3 col-sm-2"></div>
    <div class="col-xl-4 col-md-6 col-sm-8">
        <div class="card top-centered">
        <div class="card-header">
            <b>Tambah Data Pengguna</b>
        </div>
        <div class="card-body">
            <form action="create" method="post">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-3 col-form-label">Nama:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat:</label>
                    <div class="
                    col-sm-9">
                        <input type="text" class="form-control" name="alamat" autocomplete="off">
                    </div>
                </div>
                <button class="btn btn-dark" type="submit">Save</button>
            </form>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-3 col-sm-2"></div>
</div>

<?= $this->endSection('content'); ?>