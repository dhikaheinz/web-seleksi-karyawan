<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Karyawan</h1>
    </div>



    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Form</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <form class="col-md-4" method="post">
                        <?= $this->session->flashdata('message'); ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" id="id_karyawan" value="<?= $edit_karyawan['id_karyawan']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Calon Karyawan</label>
                            <input type="text" class="form-control" id="nm_karyawan" value="<?= $edit_karyawan['nm_karyawan']; ?>" name="nm_karyawan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usia Karyawan</label>
                            <input type="text" class="form-control" id="usia_karyawan" value="<?= $edit_karyawan['usia_karyawan']; ?>" name="usia_karyawan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option value="">Select Pendidikan</option>
                                <option value="1" <?= $edit_karyawan['pendidikan'] == "1" ? "selected" : null ?>>SMP</option>
                                <option value="2" <?= $edit_karyawan['pendidikan'] == "2" ? "selected" : null ?>>SMA/SMK</option>
                                <option value="3" <?= $edit_karyawan['pendidikan'] == "3" ? "selected" : null ?>>Diploma</option>
                            </select>
                        </div>
                        <label for="exampleInputEmail1">Pengalaman</label>
                        <div class="form-inline">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control mr-4" id="pengalaman" value="<?= $edit_karyawan['pengalaman']; ?>" name="pengalaman" required>
                                <small id="passwordHelpInline" class="text-muted">
                                    <b style="font-size: 12px;"> Dihitung Bulan</b>
                                </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nilai Test</label>
                            <input type="text" class="form-control" id="nilai_test" value="<?= $edit_karyawan['nilai_test']; ?>" name="nilai_test" required>
                        </div>
                        <a href="<?= base_url('Karyawan'); ?>" class="btn btn-info">Kembali</a>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->