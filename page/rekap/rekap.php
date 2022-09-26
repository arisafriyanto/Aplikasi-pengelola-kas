<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Kas Rekap
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Masuk</th>
                                            <th>Jenis</th>
                                            <th>Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $no=1;
                                            $sql = mysqli_query($conn, "SELECT * FROM kas ORDER BY keterangan ASC");

                                            while ($data = $sql->fetch_assoc()) {
                                                ?>
                                            <tr>
                                            <td align='center'><?php echo $no++; ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                                            <td align='right'><?php echo number_format($data['jumlah']).",-"?></td>
                                            <td align='center'><?php echo $data['jenis']; ?></td>
                                            <td align='right'><?php echo number_format($data['keluar']).",-"?></td>
                                            </tr>
                                            
                                        <?php
                                             $total = $total+$data['jumlah'];

                                             $total_keluar = $total_keluar+$data['keluar'];

                                             $saldo = $total-$total_keluar;

                                            }
                                        ?>
                                    </tbody>
                                    <tr>
                                        <th colspan="5" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
                                        <td align="right" style="font-size: 17px;"><?php echo "Rp." .number_format($total).",-"; ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" style="text-align: center; font-size: 20px;">Total Kas Keluar</th>
                                        <td align="right" style="font-size: 17px;"><?php echo "Rp." .number_format($total_keluar).",-"; ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" style="text-align: center; font-size: 20px;">Saldo Akhir</th>
                                        <td align="right" style="font-size: 17px;"><?php echo "Rp." .number_format($saldo).",-"; ?></td>
                                    </tr>
                                </table>
                            </div>

                            
                        </div>
                    </div>
                </div>