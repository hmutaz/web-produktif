<?= $this->extend('base'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-3 align-self-center text-center">
    <h1>Welcome, <?= session()->get('username') ?>!</h1>
</div>

<?= $this->endSection('content'); ?>
