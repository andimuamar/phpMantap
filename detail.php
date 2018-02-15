<?php 
require_once('koneksi.php');

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$sql = "SELECT * FROM wisudawan WHERE id = '$id'";

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result);

}

?>
<style type="text/css">
	 .details li {
      list-style: none;
    }
    li {
        margin-bottom:10px;
        
    }
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<img src="profile/<?php echo $row['foto'] ?>" class="img-fluid" alt="Responsive image">
		</div>
		<div class="col-lg-8">
			<div class="container" style="border-bottom:0px solid black">
                            <h2>Nama : <?php echo $row['nm_wisudawan'] ?></h2>
                          </div>
                            <hr>
                          <ul class="container details">
                            <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>Tanggal Lahir : 
                            <?php 
                              $data = $row['ttl'];
                              $tgl_lahir = date('d-M-Y', $data); 
                              echo $tgl_lahir; 
                            ?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>Nama Ayah / Ibu : <?php echo $row['ayah_ibu'] ?></p></li>
                            <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>Judul Skripsi : <?php echo $row['judul_skripsi'] ?></p></li>
                            <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>IPK : <?php echo $row['ipk'] ?></p></li>
                            <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>NPM : <?php echo $row['npm'] ?></p></li>
                            <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>Predikat : <?php echo $row['predikat'] ?></p></li>
                            <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>Kampus : <?php echo strtoupper($row['kampus']); ?> Ibnusina Kota Batam</p></li>
                          </ul>
		</div>
	</div>    
               
               