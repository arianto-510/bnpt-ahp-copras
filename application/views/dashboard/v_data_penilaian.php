<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Penilaian</h3>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah Data Penilaian
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold"> Penilaian</span>
                                            <span class="fw-light"> Baru </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small">
                                            Tambah data Penilaian
                                        </p>
                                        <form class="" action="<?php echo base_url('dashboard/tambah_penilaian') ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama</label>
                                                        <select class="form-select" aria-label="Default select example" name="nama" id="nama">
                                                            <option selected>Pilih nama</option>
                                                            <?php foreach ($alternatif as $a) : ?>
                                                                <option value="<?php echo $a->id_alternatif; ?>"><?php echo $a->nama; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <!-- <input name="nama" id="addName" type="text" class="form-control" placeholder="Masukkan nama" required /> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pendapatan</label>
                                                        <select class="form-select" aria-label="Default select example" name="pendapatan" id="pendapatan">
                                                            <option selected>Pendapatan per bulan</option>
                                                            <option value="1">>Rp.3.000.00</option>
                                                            <option value="2">Rp.1000.001 - Rp. 2000.000</option>
                                                            <option value="3">Rp. 750.001 - Rp. 1000.000</option>
                                                            <option value="4">Rp. 500.001 - Rp. 750.000</option>
                                                            <option value="5">Rp. 0 - Rp. 500.000</option>
                                                        </select>

                                                        <!-- <input name="nik" id="addName" type="text" class="form-control" placeholder="Masukkan pendapatan" required /> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tanggungan</label>
                                                        <select class="form-select" aria-label="Default select example" name="tanggungan" id="tanggungan">
                                                            <option selected>Jumlah tanggungan</option>
                                                            <option value="1">Tidak ada tanggungan</option>
                                                            <option value="2">1 0rang</option>
                                                            <option value="3">2 - 5 orang</option>
                                                            <option value="4">5 - 7 orang</option>
                                                            <option value="5">> 7 orang</option>
                                                        </select>
                                                        <!-- <input name="telepon" id="addName" type="text" class="form-control" placeholder="Masukkan jumlah tanggungan" required /> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pendidikan</label>
                                                        <select class="form-select" aria-label="Default select example" name="pendidikan" id="pendidikan">
                                                            <option selected>Riwayat pendidikan</option>
                                                            <option value="1">> D1</option>
                                                            <option value="2">SMA</option>
                                                            <option value="3">SMP</option>
                                                            <option value="4">SD</option>
                                                            <option value="5">Tidak sekolah</option>
                                                        </select>
                                                        <!-- <input name="jk" id="addPosition" type="text" class="form-control" placeholder="Riwayat pendidikan" required /> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pekerjaan</label>
                                                        <select class="form-select" aria-label="Default select example" name="pekerjaan" id="pekerjaan">
                                                            <option selected>Status pekerjaan</option>
                                                            <option value="1">Tetap</option>
                                                            <option value="2">Tidak tetap</option>
                                                        </select>
                                                        <!-- <input name="alamat" id="addOffice" type="text" class="form-control" placeholder="Status pekerjaan" required /> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">
                                                    Tambah
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
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
                                            <span class="fw-light">Data Penilaian</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('dashboard/update_penilaian') ?>" method="post">
                                            <input type="hidden" name="id_penilaian" id="editIdPerhitungan">
                                            <input type="hidden" name="id_alternatif" id="editIdAlternatif"> <!-- Hidden input for ID -->

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama</label>
                                                        <input type="text" id="editNama" class="form-control" readonly> <!-- Readonly input for Nama -->
                                                    </div>
                                                </div>
                                                <!-- Other fields -->
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pendapatan</label>
                                                        <select class="form-select" aria-label="Default select example" name="pendapatan" id="editPendapatan">
                                                            <option selected>Pendapatan per bulan</option>
                                                            <option value="1">>Rp.3.000.00</option>
                                                            <option value="2">Rp.1000.001 - Rp. 2000.000</option>
                                                            <option value="3">Rp. 750.001 - Rp. 1000.000</option>
                                                            <option value="4">Rp. 500.001 - Rp. 750.000</option>
                                                            <option value="5">Rp. 0 - Rp. 500.000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tanggungan</label>
                                                        <select class="form-select" aria-label="Default select example" name="tanggungan" id="editTanggungan">
                                                            <option selected>Jumlah tanggungan</option>
                                                            <option value="1">Tidak ada tanggungan</option>
                                                            <option value="2">1 orang</option>
                                                            <option value="3">2 - 5 orang</option>
                                                            <option value="4">5 - 7 orang</option>
                                                            <option value="5">> 7 orang</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pendidikan</label>
                                                        <select class="form-select" aria-label="Default select example" name="pendidikan" id="editPendidikan">
                                                            <option selected>Riwayat pendidikan</option>
                                                            <option value="1">> D1</option>
                                                            <option value="2">SMA</option>
                                                            <option value="3">SMP</option>
                                                            <option value="4">SD</option>
                                                            <option value="5">Tidak sekolah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pekerjaan</label>
                                                        <select class="form-select" aria-label="Default select example" name="pekerjaan" id="editPekerjaan">
                                                            <option selected>Status pekerjaan</option>
                                                            <option value="1">Tetap</option>
                                                            <option value="2">Tidak tetap</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="editRowButton" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Pendapatan</th>
                                        <th>Jumlah Tanggungan</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($perhitungan as $p) : ?>
                                        <tr>
                                            <td><?php echo $p->nama; ?></td>
                                            <td><?php echo $p->pendapatan; ?></td>
                                            <td><?php echo $p->j_tanggungan; ?></td>
                                            <td><?php echo $p->pendidikan; ?></td>
                                            <td><?php echo $p->pekerjaan; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button class="btn btn-warning btn-edit" data-id="<?php echo $p->id; ?>" data-bs-toggle="modal" data-bs-target="#editRowModal">Edit</button>
                                                    <a href="<?php echo base_url() . 'dashboard/perhitungan_hapus/' . $p->id; ?>">
                                                        <button class="btn btn-danger">Hapus</button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?php echo base_url('dashboard/get_perhitungan') ?>',
                method: 'POST',
                data: {
                    id_perhitungan: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $('#editIdPerhitungan').val(data.id);
                        $('#editIdAlternatif').val(data.id_alternatif);
                        $('#editNama').val(data.nama); // Set nama to the readonly input
                        $('#editPendapatan').val(data.pendapatan);
                        $('#editTanggungan').val(data.j_tanggungan);
                        $('#editPendidikan').val(data.pendidikan);
                        $('#editPekerjaan').val(data.pekerjaan);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>