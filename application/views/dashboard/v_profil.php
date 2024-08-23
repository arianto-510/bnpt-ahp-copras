
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
      </div>
      


    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
            <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="sudah_ada"){
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                        Maaf! Username, Sudah ada !
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif($_GET['alert']=="username"){
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                        Maaf ! Username sudah ada !
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif($_GET['alert']=="tambah"){
                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                        Berhasl ditambahkan !
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif($_GET['alert']=="sukses"){
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
                <form action="<?php echo base_url('dashboard/update_profil') ?>" method="POST">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <input name="nama" id="addName" type="text" class="form-control" value="<?php echo $profil->nama; ?>"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Username</label>
                                <input name="username" id="addName" type="text" class="form-control" value="<?php echo $profil->username; ?>"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input name="pass" id="addName" type="text" class="form-control" value="<?php echo $profil->password; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                            <button
                              type="submit"
                              id="addRowButton"
                              class="btn btn-primary"
                            >
                              Update
                            </button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
  </div>
</div>