<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Kecamatan</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i> Tambah Kecamatan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="sudah_ada"){
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                        Maaf! Kecamatan, Sudah ada !
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
                                            <span class="fw-light">Kecamatan</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('tugas/tambah_kec') ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Kecamatan</label>
                                                        <input name="kecamatan" id="addkec" type="text" class="form-control" placeholder="Masukkan kecamatan" required />
                                                    </div>
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
                                            <span class="fw-light">Kecamatan</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('tugas/update_kec') ?>" method="post">
                                            <input type="hidden" name="kecamatan_id" id="editKecId">
                                            <input type="hidden" name="slug_kec" id="editSlugKec">
                                            <input type="hidden" name="kec_lama" id="editK2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Kecamatan</label>
                                                            <input name="kec" id="editK" type="text" class="form-control" required />
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
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Slug Kecamatan</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($kecamatan as $k){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $k->kecamatan; ?></td>
                                    <td><?php echo $k->slug_kec; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <button class="btn btn-warning btn-edit" data-id="<?php echo $k->kecamatan_id; ?>" data-bs-toggle="modal" data-bs-target="#editRowModal">Edit</button>
                                            <a href="<?php echo base_url().'tugas/kec_hapus/'.$k->kecamatan_id; ?>"><button class="btn btn-danger">Hapus</button></a>
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
            url: '<?php echo base_url('tugas/get_kec') ?>',
            method: 'POST',
            data: {kecamatan_id: id},
            dataType: 'json',
            success: function(data){
                console.log(data); // Tambahkan ini untuk debugging

                // Periksa apakah ada error
                if (data.error) {
                    alert(data.error);
                } else {
                    $('#editKecId').val(data.kecamatan_id);
                    $('#editSlugKec').val(data.slug_kecamatan);
                    $('#editK').val(data.kecamatan);
                    $('#editK2').val(data.kecamatan);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response
            }
        });
    });
});

</script>