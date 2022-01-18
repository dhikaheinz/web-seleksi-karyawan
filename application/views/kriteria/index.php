  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Kriteria Karayawan</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Kriteria Karayawan</li>
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
                              Kriteria karyawan
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover col-md-12">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Kriteria</th>
                                          <th scope="col">Nama Rendah</th>
                                          <th scope="col">Nama Sedang</th>
                                          <th scope="col">Nama Tinggi</th>
                                          <th scope="col">Nilai Rendah</th>
                                          <th scope="col">Nilai Sedang</th>
                                          <th scope="col">NIlai Tinggi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($data_kriteria as $c) : ?>
                                          <tr>
                                              <th scope="row"><?= $i++; ?></th>
                                              <td><?= $c['nm_kriteria'] ?></td>
                                              <td><?= $c['nm_rendah'] ?></td>
                                              <td><?= $c['nm_sedang'] ?></td>
                                              <td><?= $c['nm_tinggi'] ?></td>
                                              <td><?= $c['batas_rendah'] ?></td>
                                              <td><?= $c['batas_sedang'] ?></td>
                                              <td><?= $c['batas_tinggi'] ?></td>
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