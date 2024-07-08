<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Data Alternatif</h3>
              
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add Row
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> New</span>
                              <span class="fw-light"> Row </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Tambah data alternatif
                            </p>
                            <form class="" action="<?php echo base_url('dashboard/tambah_alternatif') ?>" method="post">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Nama</label>
                                    <input name="nama"
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="Masukkan nama"
                                    />
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Nik</label>
                                    <input name="nik"
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="Masukkan nik"
                                    />
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Telepon</label>
                                    <input name="telepon"
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="Masukkan nomor telepon"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>Jenis Kelamin</label>
                                    <input name="jk"
                                      id="addPosition"
                                      type="text"
                                      class="form-control"
                                      placeholder="Pilih jenis kelamin"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Alamat</label>
                                    <input name="alamat"
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      placeholder="Masukkan alamat"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer border-0">
                                <button
                                  type="submit"
                                  id="addRowButton"
                                  class="btn btn-primary"
                                >
                                  Add
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-danger"
                                  data-dismiss="modal"
                                >
                                  Close
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                          <th>Nama</th>
                            <th>Nik</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            
                        <?php 
                            // $no = 1;
                            foreach($alternatif as $d){ 
                        ?>

                          <tr>
                            <td><?php echo $d->nama; ?></td>
                            <td><?php echo $d->nik; ?></td>
                            <td><?php echo $d->telepon; ?></td>
                            <td><?php echo $d->jenis_kelamin; ?></td>
                            <td><?php echo $d->alamat; ?></td>
                            <td>
                              <div class="form-button-action">
                                <button class="btn btn-warning">Edit</button>
                                <button class="btn btn-danger"><a href="<?php echo base_url().'dashboard/alternatif_hapus/'.$d->id_alternatif; ?>">Hapus</button>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
</div>
</div>