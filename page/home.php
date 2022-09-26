<?php 

    $sql = mysqli_query($conn, "SELECT * FROM kas");

    while ($data = mysqli_fetch_assoc($sql)) {
        $jumlah = $data['jumlah'];
        $total_masuk = $total_masuk+$jumlah; 


        $keluar = $data['keluar'];
        $total_keluar = $total_keluar+$keluar;

        $jenis = $data['jenis'];
        $total = $total_masuk-$total_keluar;
    }

?>

<!-- /. NAV SIDE  -->
<marquee>Selamat Datang Di System Informasi Pengelolaan Kas Smk Bisma</marquee>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Halaman Utama</h2>   
                        <h5>Pengelolaan Kas Smk Bina Islam Mandiri Kersana</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Rp." .number_format($total_masuk); ?>,-</p>
                    <p class="text-muted">Total Kas Masuk</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="glyphicon glyphicon-floppy-open"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Rp." .number_format($total_keluar); ?>,-</p>
                    <p class="text-muted">Total Kas Keluar</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="glyphicon glyphicon-floppy-disk"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Rp." .number_format($total); ?>,-</p>
                    <p class="text-muted">Saldo</p>
                </div>
             </div>
		     </div>