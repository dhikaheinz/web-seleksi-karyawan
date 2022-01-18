  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Dashboard</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
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
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3><?= $d_total_kar ?></h3>

                          <p>Jumlah Calon Karyawan</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bag"></i>
                      </div>
                      <a href="<?= base_url('karyawan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3><?= $d_total_terima ?><sup style="font-size: 20px;"></sup></h3>

                          <p>Jumlah Calon Diterima</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="<?= base_url('hasilkaryawan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3><?= $d_total_tolak ?></h3>

                          <p>Jumlah Calon Tidak Diterima</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                      <a href="<?= base_url('hasilkaryawan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
              <section class="col-lg-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data Calon Karyawan
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="<?= base_url('karyawan') ?>" class="btn btn-primary ">Lihat Detail</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <!-- Morris chart - Sales -->
                              <table class="table table-hover table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">ID Karayawan</th>
                                          <th scope="col">Nama Karyawan</th>
                                          <th scope="col">Usia</th>
                                          <th scope="col">Pendidikan</th>
                                          <th scope="col">Pengalaman</th>
                                          <th scope="col">Nilai Test</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($d_cal_kar->result() as $z) : ?>
                                          <tr>
                                              <th scope="row"><?= $i++; ?></th>
                                              <td><?= $z->id_karyawan ?></td>
                                              <td><?= $z->nm_karyawan ?></td>
                                              <td><?= $z->usia_karyawan ?></td>
                                              <td>
                                                  <?php
                                                    if ($z->pendidikan  == "1") {
                                                        $pend = "SMP";
                                                    } else if ($z->pendidikan == "2") {
                                                        $pend = "SMA/SMK";
                                                    } else {
                                                        $pend = "Sarjana S1";
                                                    } ?>
                                                  <?= $pend ?>
                                              </td>
                                              <td><?= $z->pengalaman ?> Bulan</td>
                                              <td><?= $z->nilai_test ?></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data Hasil Calon Karyawan
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="<?= base_url('hasilkaryawan') ?>" class="btn btn-primary ">Lihat Detail</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <!-- Morris chart - Sales -->
                              <table class="table table-hover table-bordered table-striped">
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
                                      <?php foreach ($d_kar->result() as $c) : ?>
                                          <tr>
                                              <th scope="row"><?= $i++; ?></th>
                                              <td><?= $c->id_karyawan ?></td>
                                              <td><?= $c->nm_karyawan ?></td>
                                              <td><?= $c->usia_karyawan ?></td>
                                              <td>
                                                  <?php
                                                    if ($c->pendidikan == "1") {
                                                        $pend = "SMP";
                                                    } else if ($c->pendidikan == "2") {
                                                        $pend = "SMA/SMK";
                                                    } else {
                                                        $pend = "Sarjana S1";
                                                    } ?>
                                                  <?= $pend ?>
                                              </td>
                                              <td><?= $c->pengalaman ?> Bulan</td>
                                              <td><?= $c->nilai_test ?></td>
                                              <td><?php
                                                    if ($c->nilai_fuzzy >= 60) {
                                                        $hasil = "Diterima";
                                                    } else if ($c->nilai_fuzzy == 0) {
                                                        $hasil = "Belum Di Proses";
                                                    } else {
                                                        $hasil = "Ditolak";
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
                  <!-- /.card -->


              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->

              <!-- /.card -->

              <!-- Calendar -->

              <!-- /.card -->
  </section>
  <!-- right col -->
  </div>
  <!-- /.row (main row) -->
  </div>
  <!-- /.container-fluid -->
  </section>
  <!-- /.content -->