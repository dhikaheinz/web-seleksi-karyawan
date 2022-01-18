<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>



    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <form class="col-md-5" method="post">
                        <?= $this->session->flashdata('message'); ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Id</label>
                            <input type="text" class="form-control" id="id_petugas" value="<?= $edit_user['id']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="username" value="<?= $edit_user['username']; ?>" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" id="password" value="<?= $edit_user['password']; ?>" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="nama" value="<?= $edit_user['nama']; ?>" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" id="address" value="<?= $edit_user['address']; ?>" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level</label>
                            <select class="form-control form-control-sm" id="level" name="level" required>
                                <option>Level</option>
                                <option value="1" <?= $edit_user['level'] == 1 ? "selected" : null ?>>Admin</option>
                                <option value="2" <?= $edit_user['level'] == 2 ? "selected" : null ?>>Kasir</option>
                            </select>
                        </div>

                        <a href="<?= base_url('user'); ?>" class="btn btn-info">Kembali</a>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->