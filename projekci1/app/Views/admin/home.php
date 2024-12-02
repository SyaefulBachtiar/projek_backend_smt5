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
<div class="card-header d-flex justify-content-between">
<a href="<?= base_url('admin/form') ?>" class="p-2" ><i class="fas fa-plus"></i> Tambah</a>
<!-- Example single danger button -->
<div class="btn-group" style="padding-left: 5rem;">
  <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?= base_url('admin/export') ?>">Export To Excel</a></li>
    <li><a class="dropdown-item" href="<?= base_url('admin/pdf'); ?>">Export To Pdf</a></li>
  </ul>
</div>
</div>


    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Foto</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal lahir</th>
                        <th>Jenis kelamin</th>
                        <th>Email</th>
                        <th>Create Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO.</th>
                        <th>Foto</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal lahir</th>
                        <th>Jenis kelamin</th>
                        <th>Email</th>
                        <th>Create Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1; foreach($mhs as $data): ?>
                    <tr>
                        <td><?= $no++ . '.' ?></td>
                        <td>
                        <img src="<?= base_url('img/' . $data['foto']) ?>" alt="Foto Mahasiswa" width="100" height="100">
                        </td>
                        <td><?= $data['npm'] ?></td>
                        <td><?= $data['nama']?></td>
                        <td><?= $data['alamat']?></td>
                        <td><?= $data['tanggal_lahir']?></td>
                        <td><?= $data['jenis_kelamin']?></td>
                        <td><?= $data['email']?></td>
                        <td><?= $data['create_date']?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?= base_url('admin/edit/' . $data['id_mhs']); ?>">
                                <div class="d-inline p-2"><i data-feather='edit'></i></div>
                                </a>
                                <a href="<?= base_url('admin/delete/' . $data['id_mhs']); ?>" data-toggle="modal" data-target="#deleteModal">
                                <div class="d-inline p-2"><i data-feather="trash-2"></i></div>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->


<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan iya untuk delete.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=base_url('admin/delete/' . $data['id_mhs'])?>">Ya</a>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>