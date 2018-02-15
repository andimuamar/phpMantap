<?php 
require_once('koneksi.php');

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$sql = "SELECT * FROM wisudawan WHERE id = '$id'";

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result);

}else if(!empty($_POST)){

  $id_users = $_POST['id_users'];

  $ttl = strtotime($_POST['tgl_lahir']);

  $query = "UPDATE wisudawan SET ttl = '$ttl' WHERE id = '$id_users'";
  $result_update = mysqli_query($conn, $query);

  echo'<script>alert("Success Mengupdate Data");window.location="data_wisudawan.php";</script>';
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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <input type="hidden" name="id_users" value="<?php echo $row['id'] ?>">
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group date">
                    <input type="text" class="form-control" id="datepicker" placeholder="<?php 
                              $data = $row['ttl'];
                              $tgl_lahir = date('d-M-Y', $data); 
                              echo $tgl_lahir; 
                            ?>" name="tgl_lahir" readonly>
              </div>
          </div>           
          <div class="form-group">
            <input type="submit" value="update" class="btn btn-danger">
          </div>                
        </form>
        <div class="jumbotron" style="border-radius: 0px;background-color: transparent;padding:2px;border:1px solid #cacecb;">
            <ul class="container details">
              <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>Nama Mahasiswa : <?php echo $row['nm_wisudawan'] ?></p></li>
              <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>Nama Ayah / Ibu : <?php echo $row['ayah_ibu'] ?></p></li>
              <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>Judul Skripsi : <?php echo $row['judul_skripsi'] ?></p></li>
              <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>IPK : <?php echo $row['ipk'] ?></p></li>
              <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>NPM : <?php echo $row['npm'] ?></p></li>
              <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>Predikat : <?php echo $row['predikat'] ?></p></li>
              <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>Kampus : <?php echo strtoupper($row['kampus']); ?> Ibnusina Kota Batam</p></li>
            </ul>
        </div>
                            
                          
		</div>
	</div>
  <script type="text/javascript">
    $('#datepicker').datepicker();
</script>
      
               
               