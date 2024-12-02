<?= $this->extend('Views/layout.php') ?>

<?= $this->section('content') ?>

<!-- Content Row -->
<div class="row">

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal lahir</th>
                        <th>Jenis kelamin</th>
                        <th>Email</th>
                        <th>Create Date</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Foto</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal lahir</th>
                        <th>Jenis kelamin</th>
                        <th>Email</th>
                        <th>Create Date</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($mhs as $data): ?>
                    <tr>
                        <td>
                        <img src="<?= base_url('img/' . $data['foto']) ?>" alt="Foto Mahasiswa" width="50" height="50">
                        </td>
                        <td><?= $data['npm'] ?></td>
                        <td><?= $data['nama']?></td>
                        <td><?= $data['alamat']?></td>
                        <td><?= $data['tanggal_lahir']?></td>
                        <td><?= $data['jenis_kelamin']?></td>
                        <td><?= $data['email']?></td>
                        <td><?= $data['create_date']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->


<?= $this->endSection() ?>