  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Proses Fuzzy Sugeno</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Proses Fuzzy Sugeno</li>
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
                              Data Calon Pegawai
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>
                              <div class="table-responsive">
                                  <table class="table table-hover table-bordered table-striped table2">
                                      <thead>
                                          <tr>

                                              <th width="1%">ID</th>
                                              <th width="5%">Nama</th>
                                              <th width="1%">Usia</th>
                                              <th width="1%">Pendidikan</th>
                                              <th width="1%">Pengalaman</th>
                                              <th width="1%">Nilai Test</th>
                                              <th width="1%">Nilai Fuzzy Sugeno</th>
                                              <th width="10%">Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php foreach ($data_karyawan as $c) : ?>
                                              <tr>

                                                  <td><?= $c['id_karyawan'] ?></td>
                                                  <td><?= $c['nm_karyawan'] ?></td>
                                                  <td><?= $c['usia_karyawan'] ?></td>
                                                  <td><?= $c['pendidikan'] ?></td>
                                                  <td><?= $c['pengalaman'] ?></td>
                                                  <td><?= $c['nilai_test'] ?></td>
                                                  <td <?= $c['nilai_fuzzy'] >= 60 ? 'class="bg-success" style="font-size:13px; text-align:center; font-weight:bold;"' : 'class="bg-danger" style="font-size:13px; text-align:center; font-weight:bold;"' ?>><?= $c['nilai_fuzzy'] ?></td>
                                                  <td>
                                                      <center>
                                                          <a href="<?= base_url('prosessugeno/fuzzyfikasi/') . $c['id_karyawan'] . '/' . $c['usia_karyawan'] . '/' . $c['pendidikan'] . '/' . $c['pengalaman'] . '/' . $c['nilai_test']; ?>" class="badge badge-warning" style="font-size: 13px; padding:7px;">Proses Fuzzy</a>
                                                          <a href="<?= base_url('prosessugeno/detail_fuzzy/') . $c['id_karyawan'] ?>" class="badge badge-success" style="font-size: 13px; padding:7px;">Detail Fuzzy</a>
                                                          <a href="<?= base_url('prosessugeno/delete_proses_fuzzy/') . $c['id_karyawan'] ?>" class="badge badge-danger" style="font-size: 13px; padding:7px;">Delete Hasil Fuzzy</a>
                                                      </center>
                                                  </td>
                                              </tr>
                                          <?php endforeach; ?>
                                      </tbody>
                                  </table>
                              </div>
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