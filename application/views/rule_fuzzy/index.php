  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Rule Fuzzy</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Rule Fuzzy</li>
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
                              Rule Fuzzy
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover col-md-12 table-bordered table-striped" id="table1">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Usia</th>
                                          <th scope="col"></th>
                                          <th scope="col">Pendidikan</th>
                                          <th scope="col"></th>
                                          <th scope="col">Pengalaman</th>
                                          <th scope="col"></th>
                                          <th scope="col">Nilai Test</th>
                                          <th scope="col"></th>
                                          <th scope="col">Hasil</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($data_rule as $c) : ?>
                                          <tr>
                                              <th scope="row"><?= $i++; ?></th>
                                              <td><?= $c['usia'] ?></td>
                                              <th scope="col" style="font-size: 12px; color:red;">AND</th>
                                              <td><?= $c['pendidikan'] ?></td>
                                              <th scope="col" style="font-size: 12px; color:red;">AND</th>
                                              <td><?= $c['pengalaman'] ?></td>
                                              <th scope="col" style="font-size: 12px; color:red;">AND</th>
                                              <td><?= $c['nilai_test'] ?></td>
                                              <th scope="col" style="font-size: 12px; color:red;">THEN</th>
                                              <td><b><?= $c['hasil'] ?></b></td>
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