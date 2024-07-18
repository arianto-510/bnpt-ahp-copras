<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Data Kriteria</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
              <div class="card">
              <div class="card-header">
                  <div class="card-body">

                  <div class="card-body">
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nik</th>
                <th scope="col">Alternatif</th>
                <th scope="col">Alamat</th>
                <th scope="col">Rengking</th>
                <th style="width: 10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach($penilaian as $p) { 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $p->nik; ?></td>
                <td><?php echo $p->alternatif; ?></td>
                <td><?php echo $p->alamat; ?></td>
                <td><?php echo $p->rengking; ?></td>
                <td>
                    <div class="form-button-action">
                        <a href="<?php echo base_url('dashboard/get_kriteria'); ?>" data-id="<?php echo $p->id_kriteria; ?>" class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editRowModal">Edit</a>
                        <a href="<?php echo base_url().'dashboard/kriteria_hapus/'.$p->id_kriteria; ?>"><button class="btn btn-danger">Hapus</button></a>
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
