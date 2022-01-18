  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Data Calon Karayawan</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Data Calon Karayawan</li>
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

          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
              <section class="col-lg connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data Calon karyawan
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="" class="btn btn-primary mr-1" data-toggle="modal" data-target="#newKaryawanModalLabel">Tambah Data</a>
                                  </li>
                                  <li>
                                      <div class="dropdown inline">
                                          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Export
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <a class="dropdown-item" href="<?= base_url('HasilKaryawan/pdf'); ?>">PDF</a>
                                              <a class="dropdown-item" href="<?= base_url('HasilKaryawan/excel'); ?>">EXEL</a>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover col-md-6" id="table1">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">ID Karayawan</th>
                                          <th scope="col">Nama Karyawan</th>
                                          <th scope="col">Usia</th>
                                          <th scope="col">Pendidikan</th>
                                          <th scope="col">Pengalaman</th>
                                          <th scope="col">Nilai Test</th>
                                          <th scope="col">Hasil</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($data_karyawan as $c) : ?>
                                          <tr>
                                              <th scope="row"><?= $i++; ?></th>
                                              <td><?= $c['id_karyawan'] ?></td>
                                              <td><?= $c['nm_karyawan'] ?></td>
                                              <td><?= $c['usia_karyawan'] ?></td>
                                              <td>
                                                  <?php
                                                    if ($c['pendidikan']  == "1") {
                                                        $pend = "SMP";
                                                    } else if ($c['pendidikan'] == "2") {
                                                        $pend = "SMA/SMK";
                                                    } else {
                                                        $pend = "Sarjana S1";
                                                    } ?>
                                                  <?= $pend ?>
                                              </td>
                                              <td><?= $c['pengalaman'] ?> Bulan</td>
                                              <td><?= $c['nilai_test'] ?></td>
                                              <td><?php
                                                    if ($c['nilai_fuzzy'] >= 60) {
                                                        $hasil = "Diterima";
                                                    } else if ($c['nilai_fuzzy'] < 60) {
                                                        $hasil = "Ditolak";
                                                    } else {
                                                        $hasil = "Belum DI Proses";
                                                    }
                                                    echo $hasil ?></td>

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
  <div class="modal fade" id="newKaryawanModalLabel" tabindex="-1" role="dialog" aria-labelledby="newColorModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="newKaryawanModalLabel">Tambah Calon Karyawan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('karyawan/tambah'); ?>" method="POST">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                      </div>
                      <div class="form-group">
                          <input type="number" class="form-control" id="usia" name="usia" placeholder="Usia" required>
                      </div>
                      <div class="form-group">
                          <select name="pendidikan" id="pendidikan" class="form-control">
                              <option value="">Select Pendidikan</option>
                              <option value="1">SMP</option>
                              <option value="2">SMA/SMK</option>
                              <option value="3">Sarjana S1</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <input type="number" class="form-control" id="pengalaman" name="pengalaman" placeholder="Pengalaman Bekerja" required>
                          <i style="font-size: 12px;">*Pengalaman Dihitung Total Bulan</i>
                      </div>
                      <div class="form-group">
                          <input type="number" class="form-control" id="nilai_test" name="nilai_test" placeholder="Nilai Test" required>
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