<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Kas Keluar
                        </div>

                        <!--{}{}{}{}{}{}{} Tambah Data {}{}{}{}{}{}{}-->

                            <div class="panel-body">
                                <button class="btn btn-success " data-toggle="modal" data-target="#myModal">Tambah Data </button>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                                        </div>
                                        <form action="" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="kode" />
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <input class="form-control" type="text" name="nama" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" type="date" name="tgl" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input class="form-control" type="number" name="jumlah" />
                                                </div>
                                    </div>

                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                                         </div>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                            session_start();
                            if(isset($_POST['tambah'])) {
                                $kode = $_POST['kode'];
                                $nama = $_POST['nama'];
                                $tgl = $_POST['tgl'];
                                $jumlah = $_POST['jumlah'];

                                $sql = $conn->query("insert into kas (kode, keterangan, tgl, jumlah, jenis, keluar)values(null, '$nama', '$tgl', 0 , 'keluar', '$jumlah') ");

                                if($sql) {
                        ?>

                        <script type="text/javascript">
                            alert("Simpan Data Berhasil");
                            window.location.href="?page=keluar";
                        </script>

                        <?php 

                            }
                        }

                        ?>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Keluar</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $no=1;
                                            $sql = mysqli_query($conn, "SELECT * FROM kas WHERE jenis='keluar' ORDER BY keterangan ASC");

                                            while ($data = $sql->fetch_assoc()) {
                                                ?>
                                            <tr>
                                            <td align='center'><?php echo $no++; ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                                            <td align='right'><?php echo number_format($data['keluar']).",-"?></td>

                                                <td align="center">

                                                    <a id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['kode']; ?>" data-keterangan="<?php echo $data['keterangan']; ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jumlah="<?php echo $data['keluar']; ?>" class='btn btn-info'><i class='fa fa-edit'></i> Edit</a>


                                                    <a onclick="return confirm('Yakin Akan Menghapus Data..??')" href='?page=keluar&aksi=hapus&id=<?php echo $data['kode']; ?>' class='btn btn-danger'><i class='fa fa-trash'></i> Busek</a>
                                                </td>
                                            </tr>
                                            
                                        <?php
                                             $total = $total+$data['keluar'];

                                            }
                                        ?>
                                    </tbody>
                                    <tr>
                                        <th colspan="4" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
                                        <td align="right" style="font-size: 17px;"><?php echo "Rp." .number_format($total).",-"; ?></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Halaman Edit -->

                            <div class="panel-body">
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                                        </div>
                                        <form action="" method="post">
                                        <div class="modal-body" id="modal_edit">
                                            <input type="hidden" name="kode" />
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <input class="form-control" type="text" name="keterangan" id="keterangan" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" type="date" name="tgl" id="tgl" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input class="form-control" type="number" name="jumlah" id="jumlah" />
                                                </div>
                                    </div>

                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                         </div>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                     <!-- JQUERY SCRIPTS -->
                         <script src="../assets/js/jquery-1.10.2.js"></script>

                         <script type="text/javascript">
                             $(document).on("click", "#edit_data", function() {
                                var kode = $(this).data('id');
                                var keterangan = $(this).data('keterangan');
                                var tgl = $(this).data('tgl');
                                var jumlah = $(this).data('jumlah');

                                $("#modal_edit #kode").val(kode);
                                $("#modal_edit #keterangan").val(keterangan);
                                $("#modal_edit #tgl").val(tgl);
                                $("#modal_edit #jumlah").val(jumlah);
                             })
                         </script>

                         <?php 

                            if(isset($_POST['edit'])) {
                                $kode = $_POST['kode'];
                                $keterangan = $_POST['keterangan'];
                                $tgl = $_POST['tgl'];
                                $jumlah = $_POST['jumlah'];

                                $sql = mysqli_query($conn, "UPDATE kas SET keterangan='$keterangan', tgl='$tgl', jumlah=0, jenis='keluar', keluar='$jumlah' WHERE kode='$kode' ");

                                 if($sql) {

                                        ?>

                                        <script type="text/javascript">
                                            alert("Ubah Data Berhasil");
                                            window.location.href="?page=keluar";
                                        </script>

                                        <?php 

                                        }
                                            }

                                         ?>

                        <!-- Akhir Halaman Edit -->

                        </div>
                    </div>
                </div>