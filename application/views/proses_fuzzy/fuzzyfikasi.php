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
                              Proses Derajat Keanggotaan
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover col-md-15 table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th scope="col" style="text-align:center;" rowspan="3">ID</th>
                                          <th scope="col" style="text-align:center;" colspan="3">Usia (U)</th>
                                          <th scope="col" style="text-align:center;" colspan="3">Pendidikan (PEND)</th>
                                          <th scope="col" style="text-align:center;" colspan="3">Pengalaman (PENG)</th>
                                          <th scope="col" style="text-align:center;" colspan="3">Nilai Test (NT)</th>
                                      </tr>
                                      <tr>
                                          <th scope="col">Muda</th>
                                          <th scope="col">Dewasa</th>
                                          <th scope="col">Tua</th>
                                          <th scope="col">SMP</th>
                                          <th scope="col">SMA</th>
                                          <th scope="col">S1</th>
                                          <th scope="col">Sedikit</th>
                                          <th scope="col">Sedang</th>
                                          <th scope="col">Banyak</th>
                                          <th scope="col">Rendah</th>
                                          <th scope="col">Sedang</th>
                                          <th scope="col">Tinggi</th>
                                      </tr>
                                      <tr>
                                          <th scope="col">18</th>
                                          <th scope="col">25</th>
                                          <th scope="col">40</th>
                                          <th scope="col">1</th>
                                          <th scope="col">2</th>
                                          <th scope="col">3</th>
                                          <th scope="col">4</th>
                                          <th scope="col">8</th>
                                          <th scope="col">12</th>
                                          <th scope="col">40</th>
                                          <th scope="col">70</th>
                                          <th scope="col">90</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>

                                          <td><?= $detail_derajat['id_karyawan'] ?></td>
                                          <td><?= $detail_derajat['usia_muda'] ?></td>
                                          <td><?= $detail_derajat['usia_dewasa'] ?></td>

                                          <td>
                                              <?= $detail_derajat['usia_tua'] ?>
                                          </td>
                                          <td>
                                              <?= $detail_derajat['pend_smp'] ?>
                                          </td>
                                          <td><?= $detail_derajat['pend_sma'] ?>

                                          </td>
                                          <td><?= $detail_derajat['pend_diploma'] ?>
                                          </td>
                                          <td><?= $detail_derajat['peng_sedikit'] ?>

                                          </td>
                                          <td><?= $detail_derajat['peng_sedang'] ?>

                                          </td>
                                          <td><?= $detail_derajat['peng_banyak'] ?>

                                          </td>
                                          <td><?= $detail_derajat['nilai_rendah'] ?>

                                          </td>
                                          <td><?= $detail_derajat['nilai_sedang'] ?>

                                          </td>
                                          <td><?= $detail_derajat['nilai_tinggi'] ?>
                                          </td>

                                      </tr>

                                  </tbody>
                              </table>
                          </div>

                      </div>
                      <!-- /.card-body -->
                  </div>

                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Nilai Rule 1-81
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body md-0">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover col-md-15 table-bordered table-striped table-sm">
                                  <thead>
                                      <tr>
                                          <th scope="col" style="text-align:center;">ID</th>
                                          <th scope="col" style="text-align:center;">R1</th>
                                          <th scope="col" style="text-align:center;">R2</th>
                                          <th scope="col" style="text-align:center;">R3</th>
                                          <th scope="col" style="text-align:center;">R4</th>
                                          <th scope="col" style="text-align:center;">R5</th>
                                          <th scope="col" style="text-align:center;">R6</th>
                                          <th scope="col" style="text-align:center;">R7</th>
                                          <th scope="col" style="text-align:center;">R8</th>
                                          <th scope="col" style="text-align:center;">R9</th>
                                          <th scope="col" style="text-align:center;">R10</th>
                                          <th scope="col" style="text-align:center;">R11</th>
                                          <th scope="col" style="text-align:center;">R12</th>
                                          <th scope="col" style="text-align:center;">R13</th>
                                          <th scope="col" style="text-align:center;">R14</th>
                                          <th scope="col" style="text-align:center;">R15</th>
                                          <th scope="col" style="text-align:center;">R16</th>
                                          <th scope="col" style="text-align:center;">R17</th>
                                          <th scope="col" style="text-align:center;">R18</th>
                                          <th scope="col" style="text-align:center;">R19</th>
                                          <th scope="col" style="text-align:center;">R20</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><?= $detail_rule['id_karyawan'] ?></td>
                                          <td><?= $detail_rule['rule1'] ?></td>
                                          <td><?= $detail_rule['rule2'] ?></td>
                                          <td><?= $detail_rule['rule3'] ?></td>
                                          <td><?= $detail_rule['rule4'] ?></td>
                                          <td><?= $detail_rule['rule5'] ?></td>
                                          <td><?= $detail_rule['rule6'] ?></td>
                                          <td><?= $detail_rule['rule7'] ?></td>
                                          <td><?= $detail_rule['rule8'] ?></td>
                                          <td><?= $detail_rule['rule9'] ?></td>
                                          <td><?= $detail_rule['rule10'] ?></td>
                                          <td><?= $detail_rule['rule11'] ?></td>
                                          <td><?= $detail_rule['rule12'] ?></td>
                                          <td><?= $detail_rule['rule13'] ?></td>
                                          <td><?= $detail_rule['rule14'] ?></td>
                                          <td><?= $detail_rule['rule15'] ?></td>
                                          <td><?= $detail_rule['rule16'] ?></td>
                                          <td><?= $detail_rule['rule17'] ?></td>
                                          <td><?= $detail_rule['rule18'] ?></td>
                                          <td><?= $detail_rule['rule19'] ?></td>
                                          <td><?= $detail_rule['rule20'] ?></td>
                                      </tr>

                                  </tbody>
                              </table>
                              <table class="table table-hover col-md-15 table-bordered table-striped table-sm">
                                  <thead>
                                      <tr>
                                          <th scope="col" style="text-align:center;">ID</th>
                                          <th scope="col" style="text-align:center;">R21</th>
                                          <th scope="col" style="text-align:center;">R22</th>
                                          <th scope="col" style="text-align:center;">R23</th>
                                          <th scope="col" style="text-align:center;">R24</th>
                                          <th scope="col" style="text-align:center;">R25</th>
                                          <th scope="col" style="text-align:center;">R26</th>
                                          <th scope="col" style="text-align:center;">R27</th>
                                          <th scope="col" style="text-align:center;">R28</th>
                                          <th scope="col" style="text-align:center;">R29</th>
                                          <th scope="col" style="text-align:center;">R30</th>
                                          <th scope="col" style="text-align:center;">R31</th>
                                          <th scope="col" style="text-align:center;">R32</th>
                                          <th scope="col" style="text-align:center;">R33</th>
                                          <th scope="col" style="text-align:center;">R34</th>
                                          <th scope="col" style="text-align:center;">R35</th>
                                          <th scope="col" style="text-align:center;">R36</th>
                                          <th scope="col" style="text-align:center;">R37</th>
                                          <th scope="col" style="text-align:center;">R38</th>
                                          <th scope="col" style="text-align:center;">R39</th>
                                          <th scope="col" style="text-align:center;">R40</th>


                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><?= $detail_rule['id_karyawan'] ?></td>
                                          <td><?= $detail_rule['rule21'] ?></td>
                                          <td><?= $detail_rule['rule22'] ?></td>
                                          <td><?= $detail_rule['rule23'] ?></td>
                                          <td><?= $detail_rule['rule24'] ?></td>
                                          <td><?= $detail_rule['rule25'] ?></td>
                                          <td><?= $detail_rule['rule26'] ?></td>
                                          <td><?= $detail_rule['rule27'] ?></td>
                                          <td><?= $detail_rule['rule28'] ?></td>
                                          <td><?= $detail_rule['rule29'] ?></td>
                                          <td><?= $detail_rule['rule30'] ?></td>
                                          <td><?= $detail_rule['rule31'] ?></td>
                                          <td><?= $detail_rule['rule32'] ?></td>
                                          <td><?= $detail_rule['rule33'] ?></td>
                                          <td><?= $detail_rule['rule34'] ?></td>
                                          <td><?= $detail_rule['rule35'] ?></td>
                                          <td><?= $detail_rule['rule36'] ?></td>
                                          <td><?= $detail_rule['rule37'] ?></td>
                                          <td><?= $detail_rule['rule38'] ?></td>
                                          <td><?= $detail_rule['rule39'] ?></td>
                                          <td><?= $detail_rule['rule40'] ?></td>
                                      </tr>

                                  </tbody>
                              </table>
                              </table>
                              <table class="table table-hover col-md-15 table-bordered table-striped table-sm">
                                  <thead>
                                      <tr>
                                          <th scope="col" style="text-align:center;">ID</th>
                                          <th scope="col" style="text-align:center;">R41</th>
                                          <th scope="col" style="text-align:center;">R42</th>
                                          <th scope="col" style="text-align:center;">R43</th>
                                          <th scope="col" style="text-align:center;">R44</th>
                                          <th scope="col" style="text-align:center;">R45</th>
                                          <th scope="col" style="text-align:center;">R46</th>
                                          <th scope="col" style="text-align:center;">R47</th>
                                          <th scope="col" style="text-align:center;">R48</th>
                                          <th scope="col" style="text-align:center;">R49</th>
                                          <th scope="col" style="text-align:center;">R50</th>
                                          <th scope="col" style="text-align:center;">R51</th>
                                          <th scope="col" style="text-align:center;">R52</th>
                                          <th scope="col" style="text-align:center;">R53</th>
                                          <th scope="col" style="text-align:center;">R54</th>
                                          <th scope="col" style="text-align:center;">R55</th>
                                          <th scope="col" style="text-align:center;">R56</th>
                                          <th scope="col" style="text-align:center;">R57</th>
                                          <th scope="col" style="text-align:center;">R58</th>
                                          <th scope="col" style="text-align:center;">R59</th>
                                          <th scope="col" style="text-align:center;">R60</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><?= $detail_rule['id_karyawan'] ?></td>
                                          <td><?= $detail_rule['rule41'] ?></td>
                                          <td><?= $detail_rule['rule42'] ?></td>
                                          <td><?= $detail_rule['rule43'] ?></td>
                                          <td><?= $detail_rule['rule44'] ?></td>
                                          <td><?= $detail_rule['rule45'] ?></td>
                                          <td><?= $detail_rule['rule46'] ?></td>
                                          <td><?= $detail_rule['rule47'] ?></td>
                                          <td><?= $detail_rule['rule48'] ?></td>
                                          <td><?= $detail_rule['rule49'] ?></td>
                                          <td><?= $detail_rule['rule50'] ?></td>
                                          <td><?= $detail_rule['rule51'] ?></td>
                                          <td><?= $detail_rule['rule52'] ?></td>
                                          <td><?= $detail_rule['rule53'] ?></td>
                                          <td><?= $detail_rule['rule54'] ?></td>
                                          <td><?= $detail_rule['rule55'] ?></td>
                                          <td><?= $detail_rule['rule56'] ?></td>
                                          <td><?= $detail_rule['rule57'] ?></td>
                                          <td><?= $detail_rule['rule58'] ?></td>
                                          <td><?= $detail_rule['rule59'] ?></td>
                                          <td><?= $detail_rule['rule60'] ?></td>
                                      </tr>

                                  </tbody>
                              </table>
                              <table class="table table-hover col-md-15 table-bordered table-striped table-sm">
                                  <thead>
                                      <tr>
                                          <th scope="col" style="text-align:center;">ID</th>

                                          <th scope="col" style="text-align:center;">R61</th>
                                          <th scope="col" style="text-align:center;">R62</th>
                                          <th scope="col" style="text-align:center;">R63</th>
                                          <th scope="col" style="text-align:center;">R64</th>
                                          <th scope="col" style="text-align:center;">R65</th>
                                          <th scope="col" style="text-align:center;">R66</th>
                                          <th scope="col" style="text-align:center;">R67</th>
                                          <th scope="col" style="text-align:center;">R68</th>
                                          <th scope="col" style="text-align:center;">R69</th>
                                          <th scope="col" style="text-align:center;">R70</th>
                                          <th scope="col" style="text-align:center;">R71</th>
                                          <th scope="col" style="text-align:center;">R72</th>
                                          <th scope="col" style="text-align:center;">R73</th>
                                          <th scope="col" style="text-align:center;">R74</th>
                                          <th scope="col" style="text-align:center;">R75</th>
                                          <th scope="col" style="text-align:center;">R76</th>
                                          <th scope="col" style="text-align:center;">R77</th>
                                          <th scope="col" style="text-align:center;">R78</th>
                                          <th scope="col" style="text-align:center;">R79</th>
                                          <th scope="col" style="text-align:center;">R80</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><?= $detail_rule['id_karyawan'] ?></td>

                                          <td><?= $detail_rule['rule61'] ?></td>
                                          <td><?= $detail_rule['rule62'] ?></td>
                                          <td><?= $detail_rule['rule63'] ?></td>
                                          <td><?= $detail_rule['rule64'] ?></td>
                                          <td><?= $detail_rule['rule65'] ?></td>
                                          <td><?= $detail_rule['rule66'] ?></td>
                                          <td><?= $detail_rule['rule67'] ?></td>
                                          <td><?= $detail_rule['rule68'] ?></td>
                                          <td><?= $detail_rule['rule69'] ?></td>
                                          <td><?= $detail_rule['rule70'] ?></td>
                                          <td><?= $detail_rule['rule71'] ?></td>
                                          <td><?= $detail_rule['rule72'] ?></td>
                                          <td><?= $detail_rule['rule73'] ?></td>
                                          <td><?= $detail_rule['rule74'] ?></td>
                                          <td><?= $detail_rule['rule75'] ?></td>
                                          <td><?= $detail_rule['rule76'] ?></td>
                                          <td><?= $detail_rule['rule77'] ?></td>
                                          <td><?= $detail_rule['rule78'] ?></td>
                                          <td><?= $detail_rule['rule79'] ?></td>
                                          <td><?= $detail_rule['rule80'] ?></td>
                                      </tr>

                                  </tbody>
                              </table>
                              <table class="table table-hover col-md-15 table-bordered table-striped table-sm">
                                  <thead>
                                      <tr>
                                          <th scope="col" style="text-align:center;">ID</th>
                                          <th scope="col" style="text-align:center;">R81</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><?= $detail_rule['id_karyawan'] ?></td>

                                          <td><?= $detail_rule['rule81'] ?></td>
                                      </tr>

                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Proses Defuzzyfikasi
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover col-md-15 table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th scope="col" style="text-align:center;">ID</th>
                                          <th scope="col" style="text-align:center;">Nama</th>
                                          <th scope="col" style="text-align:center;">Hasil</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><?= $detail_karyawan['id_karyawan'] ?></td>
                                          <td><?= $detail_karyawan['nm_karyawan'] ?></td>
                                          <td><?= $detail_karyawan['nilai_fuzzy'] ?></td>
                                      </tr>
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