<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <title>Data Hasil Akhir</title>
</head>
<body>
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Hasil Akhir</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Hasil Akhir Perhitungan COPRAS</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nilai Akhir</th>
                                            <th>Rangking</th>
                                            <th>Ket</th>
                                            <?php if($this->session->userdata('level') == 'admin') : ?>
                                            <th>Aksi</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        usort($hasil_akhir, function ($a, $b) {
                                            return $b->nilai_akhir <=> $a->nilai_akhir;
                                        });

                                        $rangking = 1;
                                        foreach ($hasil_akhir as $hasil) : ?>
                                            <tr>
                                                <td><?php echo $hasil->nama_warga; ?></td>
                                                <td><?php echo number_format($hasil->nilai_akhir, 4); ?></td>
                                                <td><?php echo $rangking++; ?></td>
                                                <td>
                                                    <?php if($hasil->status == 0) : ?>
                                                        <span class="">-</span>
                                                    <?php elseif($hasil->status == 1) : ?>
                                                        <span class="badge badge-success">Dapat</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-danger">Tidak Dapat</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if($this->session->userdata('level') == 'admin') : ?>
                                                <td>
                                                    <?php if($hasil->status == 0) : ?>
                                                        <a class="badge badge-center bg-primary me-1" href="<?php echo base_url().'dashboard/verifikasi/'.$hasil->id ?>"><i class="bx bx-edit-alt"></i>Verifikasi Dapat</a>
                                                        <a class="badge badge-center bg-danger" href="<?php echo base_url().'dashboard/cancel/'.$hasil->id ?>"><i class="bx bx-trash"></i>Cancel</a>
                                                    <?php elseif($hasil->status == 1) : ?>
                                                        <a class="badge badge-center bg-danger" href="<?php echo base_url().'dashboard/cancel/'.$hasil->id ?>"><i class="bx bx-trash"></i>Cancel</a>
                                                    <?php else : ?>
                                                        <a class="badge badge-center bg-primary me-1" href="<?php echo base_url().'dashboard/verifikasi/'.$hasil->id ?>"><i class="bx bx-edit-alt"></i>Verifikasi Dapat</a>
                                                    <?php endif; ?>
                                                </td>
                                                <?php endif; ?>
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
            $('#add-row').DataTable({
                "searching": true,
                "ordering": true,
                "paging": true
            });
        });
    </script>
</body>
</html>
