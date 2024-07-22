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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Urutkan hasil_akhir berdasarkan nilai_akhir
                                    usort($hasil_akhir, function ($a, $b) {
                                        return $b->nilai_akhir <=> $a->nilai_akhir;
                                    });

                                    // Tambahkan rangking
                                    $rangking = 1;
                                    foreach ($hasil_akhir as $hasil) : ?>
                                        <tr>
                                            <td><?php echo $hasil->nama; ?></td>
                                            <td><?php echo number_format($hasil->nilai_akhir, 4); ?></td>
                                            <td><?php echo $rangking++; ?></td>
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