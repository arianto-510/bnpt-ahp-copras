<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Desa</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i> Tambah Desa
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="sudah_ada"){
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                        Maaf! Desa, Sudah ada di kecamatan tersebut!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif($_GET['alert']=="sudah_ada2"){
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                        Maaf! Desa, Sudah ada di kecamatan tersebut!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif($_GET['alert']=="tambah"){
                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                        Berhasl ditambahkan !
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif($_GET['alert']=="ubah"){
                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                        Berhasil diubah!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif($_GET['alert']=="hapus"){
                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                        Berhasil dihapus!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }
                        }
                    ?>
                        <!-- Modal tambah kriteria-->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Tambah</span>
                                            <span class="fw-light">Desa</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('tugas/tambah_desa') ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Desa</label>
                                                        <input name="desa" id="addDesa" type="text" class="form-control" placeholder="Masukkan desa" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm 12">
                                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                                    <select id="kecamatan" class="select2 form-select" name="kecamatan" required>
                                                        <option selected>Kecamatan</option>    
                                                        <?php foreach($kecamatan as $k) : ?>                                     
                                                        <option value="<?php echo $k->kecamatan_id ?>"><?php echo $k->kecamatan ?></option>                                                           
                                                        <?php endforeach; ?>                                                          
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
                                            <span class="fw-light">Desa</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('tugas/update_desa') ?>" method="post">
                                            <input type="hidden" name="desa_id" id="editDesaId">
                                            <input type="hidden" name="desa_lama" id="editDesaLama">
                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Desa</label>
                                                            <input name="desa" id="editDesa" type="text" class="form-control" required />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm 12">
                                                    <input type="text" hidden name="idKec_lama" id="idKec_lama">
                                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                                    <select id="editKecamatan2" class="select2 form-select" name="kecamatan" required>
                                                        <option value="">Kecamatan</option>    
                                                        <?php foreach($kecamatan as $k) : ?>                                     
                                                            <option value="<?php echo $k->kecamatan_id ?>"><?php echo $k->kecamatan ?></option>                                                           
                                                        <?php endforeach; ?>                                                          
                                                    </select>
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
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Desa</th>
                                    <th scope="col">Kecamatan</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($desa as $d){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->desa; ?></td>
                                    <td><?php echo $d->kecamatan; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <button class="btn btn-warning btn-edit" data-id="<?php echo $d->desa_id; ?>" data-bs-toggle="modal" data-bs-target="#editRowModal">Edit</button>
                                            <a href="<?php echo base_url().'tugas/desa_hapus/'.$d->desa_id; ?>"><button class="btn btn-danger">Hapus</button></a>
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
            url: '<?php echo base_url('tugas/get_desa') ?>',
            method: 'POST',
            data: {desa_id: id},
            dataType: 'json',
            success: function(data){
                console.log(data); // Tambahkan ini untuk debugging

                // Periksa apakah ada error
                if (data.error) {
                    alert(data.error);
                } else {
                    $('#editDesaId').val(data.desa_id);               
                    $('#editDesa').val(data.desa);
                    $('#editDesaLama').val(data.desa);
                    $('#idKec_lama').val(data.kecamatan_id);
                    $('#editKecamatan2').val(data.kecamatan_id);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response
            }
        });
    });
});

</script>