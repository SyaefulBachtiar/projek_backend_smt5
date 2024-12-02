<?= $this->extend('Views/layout.php') ?>
<?= $this->section('content') ?>




<!-- awal -->
<div class="container-fluid">
<div class="card mb-3">
<div class="card-header">
<a href="<?php echo site_url('admin/home') ?>">
    <i data-feather="arrow-left"></i> Back
</a>

</div>
<div class="card-body">
<form action="<?= base_url('admin/store') ?>" method="POST"  enctype="multipart/form-data" class="user">
<?= csrf_field(); ?>
<div class="form-group">
<label for="nim">NIM*</label>
<input class="form-control" type="text" name="nim"

placeholder="NIM Mahasiswa" required/>
<div class="invalid-feedback">
</div>

</div>
<div class="form-group">
<label for="nama">Nama*</label>
<input class="form-control" type="text" name="nama"

placeholder="Nama Mahasiswa" required/>
<div class="invalid-feedback">
</div>
</div>
<div class="form-group">
<label for="email">Email*</label>

<input class="form-control" type="email" name="email"

id="email" placeholder="Email" required/>
<div class="invalid-feedback">
</div>
</div>
<div class="form-group">
<label for="tanggal_lahir">Tanggal lahir*</label>
<input class="form-control" type="date" name="tanggal_lahir"

placeholder="Nama Mahasiswa" required/>
<div class="invalid-feedback">
</div>
</div>
<div class="form-group">
<label for="jenis_kelamin">Jenis Kelamin*</label>
<select name="jenis_kelamin" class="form-control">
<option value="L">Laki-laki</option>
<option value="P">Perempuan</option>
</select>
<div class="invalid-feedback">
</div>
</div>
<div class="form-group">
<label for="alamat">Alamat*</label>
<textarea class="form-control" name="alamat"

required></textarea>

<div class="invalid-feedback">
</div>
</div>
<div class="form-group">
<label for="image">Image*</label>
<input class="form-control-file"
type="file" name="image" required/>
<div class="invalid-feedback">
</div>
</div>
<div class="form-group">
<label for="create_date">Create date*</label>
<input class="form-control" name="create_date" required type="datetime-local">
<div class="invalid-feedback">
</div>
</div>
<button type="submit" class="btn btn-success pull-center">

Submit </button>
</form>
</div>
<div class="card-footer small text-muted">
* required fields
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- akhir -->



<?= $this->endSection()?>