<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Manajement User
                        </div>

                       <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th style="text-align: center;">Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $no=1;
                                            $sql = mysqli_query($conn, "SELECT * FROM user ORDER BY username ASC");

                                            while ($data = $sql->fetch_assoc()) {
                                                ?>
                                            <tr>
                                            <td align='center'><?php echo $no++; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td align='center'><?php echo $data['password'];?></td>
                                            </tr>
                                    </tbody>
                                    <?php 
                                    	}
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>