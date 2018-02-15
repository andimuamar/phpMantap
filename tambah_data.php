<?php 

include('header.php');
require_once('koneksi.php');

if(!empty($_POST)){

	$nm_wisudawan = $_POST['nm_wisudawan'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$ttl = strtotime($_POST['tgl_lahir']);
	$p_studi = $_POST['p_studi'];
	$ipk = $_POST['ipk'];
	$predikat = $_POST['predikat'];
	$nm_ayah_ibu = $_POST['nm_ayah_ibu'];
	$judul_skripsi = $_POST['judul_skripsi'];
	$kampus = $_POST['kampus'];

	$fname = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];

	$up = "profile/";

	move_uploaded_file($tmp_name, $up.$fname);

	$query = "INSERT INTO wisudawan (nm_wisudawan, 
										tempat_lahir,
										ttl, 
										program_studi, 
										ipk, 
										predikat,
										ayah_ibu,
										judul_skripsi,
										kampus,
										foto) VALUES ('$nm_wisudawan',
														'$tempat_lahir',
														'$ttl',
														'$p_studi',
														'$ipk',
														'$predikat',
														'$nm_ayah_ibu',
														'$judul_skripsi',
														'$kampus',
														'$fname')";

	$result = mysqli_query($conn, $query);

	echo 'success';														


}

?>

<div class="container">
	<?php include('nav.php') ?>
	<div class="jumbotron" style="background-color: transparent;">
	<div class="row">
		<h2>Tambah Data Wisudawan</h2>
		<hr>
		<div class="col-lg-12">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Wisudawan</label>
					<input type="text" name="nm_wisudawan" class="form-control">
				</div>
				<div class="form-group">
					<label>Tempat Tgl Lahir</label>
					<div class="row">
						<div class="col-lg-8">
							<input type="text" name="tempat_lahir" class="form-control" placeholder="tempat lahir">
						</div>
						<div class="col-lg-4">
							<div class="input-group date">
							      <input type="text" class="form-control" id="datepicker" placeholder="MM/DD/YYYY" name="tgl_lahir">
							</div>
						</div>
					</div>					
				</div>
				<div class="form-group">
					<label>Program Studi</label>
					<select class="form-control" name="p_studi">
						<option value="tehnik informatika">TEHNIK INFORMATIKA</option>
						<option value="tehnik industri">TEHNIK INDUSTRI</option>
					</select>
				</div>
				<div class="form-group">
					<label>IPK</label>
					<input type="text" name="ipk" class="form-control">
				</div>
				<div class="form-group">
					<label>Predikat</label>
					<select name="predikat" class="form-control">
						<option value="memuaskan">Memuaskan</option>
						<option value="dengan pujian">Dengan Pujian</option>
					</select>
				</div>
				<div class="form-group">
					<label>Nama Ayah / Ibu</label>
					<input type="text" name="nm_ayah_ibu" class="form-control">
				</div>
				<div class="form-group">
					<label>Judul Skripsi</label>
					<input type="text" name="judul_skripsi" class="form-control">
				</div>
				<div class="form-group">
					<label>Kampus</label>
					<select name="kampus" class="form-control">
						<option value="stt">STT</option>
						<option value="stikes">STIKES</option>
						<option value="stie">STIE</option>						
						<option value="stai">STAI</option>
					</select>
				</div>
				<div class="form-group">
					<label>Foto</label>
					<input type="file" name="file" id="file" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="tambah data" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
	</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js'></script>
<script type="text/javascript">
	$('#datepicker').datepicker();
</script>