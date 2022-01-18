  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Users</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Users</li>
                  </ol>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">


          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
              <section class="col-lg connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data User
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="" class="btn btn-primary mr-5 float-right" data-toggle="modal" data-target="#newUserModal">Tambah User</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <!-- Morris chart - Sales -->
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Username</th>
                                          <th scope="col">Password</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">Address</th>
                                          <th scope="col">Level</th>
                                          <th scope="col">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($data_user as $user) : ?>
                                          <tr>
                                              <th scope="row"><?= $i++; ?></th>
                                              <td><?= $user['username'] ?></td>
                                              <td><?= $user['password'] ?></td>
                                              <td><?= $user['nama'] ?></td>
                                              <td><?= $user['address'] ?></td>
                                              <td><?= $user['level'] == 1 ? "Admin" : "Kasir" ?></td>
                                              <td>
                                                  <a href="<?= base_url('user/edit/') . $user['id']; ?>" class="badge badge-success">Edit</a>
                                                  <a href="<?= base_url('user/hapus/') . $user['id']; ?>" onclick="return confirm('Hapus Data User?');" class="badge badge-danger">hapus</a>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
              </section>
              <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  <!-- Modal -->
  <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="newUserModalLabel">Tambah User Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('user/tambah'); ?>" method="POST">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                      </div>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="password" name="password" placeholder="Password" required minlength="5">
                      </div>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Full Name" required>
                      </div>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                      </div>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <select class="form-control form-control-sm" id="level" name="level" required>
                              <option>Level</option>
                              <option value="1">Admin</option>
                              <option value="2">Kasir</option>
                          </select>
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
              </form>
          </div>
      </div>
  </div>