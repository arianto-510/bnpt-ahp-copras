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
                        Tambah Data Alternatif
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
                                      placeholder="Masukkan nama" required
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
                                      placeholder="Masukkan nik" required
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
                                      placeholder="Masukkan nomor telepon" required
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
                                      placeholder="Pilih jenis kelamin" required
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
                                      placeholder="Masukkan alamat" required
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

                    <!-- Modal edit -->
                     <!-- Modal edit kriteria-->
                     <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Edit</span>
                                            <span class="fw-light">Data Alternatif</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('dashboard/update_alternatif') ?>" method="post">
                                            <input type="hidden" name="id_alternatif" id="editIdAlternatif">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama</label>
                                                        <input name="nama" id="editNama" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nik</label>
                                                        <input name="nik" id="editNik" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Telepon</label>
                                                        <input name="telepon" id="editTelepon" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Jenis Kelamin</label>
                                                        <input name="jk" id="editJk" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Alamat</label>
                                                        <input name="alamat" id="editAlamat" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="editRowButton" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                            <th style="width: 10%">Aksi</th>
                          </tr>
                        </thead>
                        
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
                              <button class="btn btn-warning btn-edit" data-id="<?php echo $d->id_alternatif; ?>" data-bs-toggle="modal" data-bs-target="#editRowModal">Edit</button>
                                <a href="<?php echo base_url().'dashboard/alternatif_hapus/'.$d->id_alternatif; ?>"><button class="btn btn-danger">Hapus</button></a>
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
<script>
$(document).ready(function(){
    $('.btn-edit').on('click', function(){
        var id = $(this).data('id');
        
        $.ajax({
            url: '<?php echo base_url('dashboard/get_alternatif') ?>',
            method: 'POST',
            data: {id_alternatif: id},
            dataType: 'json',
            success: function(data){
                console.log(data); // Tambahkan ini untuk debugging

                // Periksa apakah ada error
                if (data.error) {
                    alert(data.error);
                } else {
                  $('#editIdAlternatif').val(data.id_alternatif);
                    $('#editNama').val(data.nama);
                    $('#editNik').val(data.nik);
                    $('#editTelepon').val(data.telepon);
                    $('#editJk').val(data.jenis_kelamin);
                    $('#editAlamat').val(data.alamat);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response
            }
        });
    });
});

</script>