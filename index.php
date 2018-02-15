<?php 
include('header.php'); 
require_once('koneksi.php');

$sql = "SELECT * FROM wisudawan WHERE kampus = 'stt' ORDER BY nm_wisudawan ASC";
$result = mysqli_query($conn, $sql);

?>
<style>
.modal-dialog {
    max-width: 70%;
</style>
<body>
	<div class="container">
		<?php include('nav.php') ?>
			
			<div class="container" style="margin-top: 50px;">
				<div class="row">
					<div class="col-lg-8">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="img/slide.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="img/slide2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="img/slide3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
						
					</div>
					<div class="col-lg-4">    
						
						<ul class="list-group">
  <li class="list-group-item active"><i class="fa fa-user" aria-hidden="true"></i> Login</li>
  <li class="list-group-item"><i class="fa fa-globe" aria-hidden="true"></i> STT-Ibnusina.ac.id</li>
  <li class="list-group-item"><i class="fa fa-facebook" aria-hidden="true"></i>  Facebook</li>
  <li class="list-group-item"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</li>
  <li class="list-group-item"><i class="fa fa-youtube" aria-hidden="true"></i> Youtube</li>
  <li class="list-group-item"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</li>
  <li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i> Lokasi Kami</li>
</ul>
					</div>
				</div>
			</div>
			 
		</div>
	</div>
	
</body>
</html>