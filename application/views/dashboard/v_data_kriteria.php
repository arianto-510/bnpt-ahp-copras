<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="container">
                    <div class="page-inner">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <form action="<?= base_url() . 'ahpcopras/kalkulasi' ?>" method="post">
                                    <div class="page-header">
                                        <h3 class="fw-bold mb-3">Data Bobot</h3>
                                    </div>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <?php foreach ($kriteria as $k) : ?>
                                                    <th scope="col"><?= $k->nama_kriteria; ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $baris = 0;
                                            foreach ($kriteria as $k) : ?>
                                                <tr>
                                                    <?php
                                                    $kolom = 0;
                                                    foreach ($kriteria as $k) : ?>
                                                        <td scope="col"><input type="number" name="matrix[]" class="form-control" required value="<?php echo isset($arr[$baris][$kolom]) ? $arr[$baris][$kolom] : ''; ?>"></td>
                                                    <?php $kolom++;
                                                    endforeach; ?>
                                                </tr>
                                            <?php $baris++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary" name="kalkulasi" type="submit">Kalkulasi</button>
                                </form>

                                <?php if (!empty($weights)) : ?>
                                    <h3>Hasil Pembobotan AHP</h3>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kriteria</th>
                                                <th scope="col">Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($weights as $index => $weight) : ?>
                                                <tr>
                                                    <td><?= $kriteria[$index]->nama_kriteria; ?></td>
                                                    <td><?= $weight; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Tambah</span>
                                            <span class="fw-light">Kriteria</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('dashboard/tambah_kriteria') ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Kriteria</label>
                                                        <input name="nama" id="addNama" type="text" class="form-control" placeholder="Masukkan nilai bobot" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal edit kriteria-->
                        <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Edit</span>
                                            <span class="fw-light">Kriteria</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('dashboard/update_kriteria') ?>" method="post">
                                            <input type="hidden" name="id_kriteria" id="editIdKriteria">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Kriteria</label>
                                                        <input name="nama" id="editNama" type="text" class="form-control" required />
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
                        <div class="page-header">
                            <h3 class="fw-bold mb-3">Data Kriteria</h3>
                        </div>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Bobot</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kriteria as $k) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $k->nama_kriteria; ?></td>
                                        <td><?php echo $k->nilai; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button class="btn btn-warning btn-edit" data-id="<?php echo $k->id_kriteria; ?>" data-bs-toggle="modal" data-bs-target="#editRowModal">Edit</button>
                                                <a href="<?php echo base_url() . 'dashboard/kriteria_hapus/' . $k->id_kriteria; ?>"><button class="btn btn-danger">Hapus</button></a>
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

        <script>
            $(document).ready(function() {
                $('.btn-edit').on('click', function() {
                    var id = $(this).data('id');

                    $.ajax({
                        url: '<?php echo base_url('dashboard/get_kriteria') ?>',
                        method: 'POST',
                        data: {
                            id_kriteria: id
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data); // Tambahkan ini untuk debugging

                            // Periksa apakah ada error
                            if (data.error) {
                                alert(data.error);
                            } else {
                                $('#editIdKriteria').val(data.id_kriteria);
                                // $('#editKode').val(data.kode_kriteria);
                                $('#editNama').val(data.nama_kriteria);
                                // $('#editBobot').val(data.nilai);
                                // $('#editRengking').val(data.rengking);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); // Log error response
                        }
                    });
                });
            });

            function editKriteria(id, nama) {
                $('#editIdKriteria').val(id);
                $('#editNama').val(nama);
            }
        </script>

    </div>
</div>