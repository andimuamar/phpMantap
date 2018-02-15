<?php 
include('header.php'); 
require_once('koneksi.php');

$sql = "SELECT * FROM wisudawan";
$result = mysqli_query($conn, $sql);

?>
<style>
.modal-dialog {
    max-width: 70%;
</style>
<body>
	<div class="container">
		<?php include('nav.php') ?>
		<div class="row">	
			<div class="col-lg-12">				
					<div class="index-content">					    
					    	<div class="example">
					    		<table id="example" style="font-size:12px;" class="table table-striped table-bordered" cellspacing="0" width="100%">
					    			<thead>
					    			<tr>
					    				<th>No</th>
					    				<th>Nama Wisudawan</th>
					    				<th>Npm</th>
					    				<th>Tempat Lahir</th>
					    				<th>Tgl Lahir</th>
					    				<th>Program Studi</th>
					    				<th>Ipk</th>
					    				<th>Predikat</th>
					    				<th>Ayah/Ibu</th>
					    				<th>Judul Skripsi</th>
					    				<th>Option</th>
					    			</tr>
					    			</thead>
					    			<tbody>
					    			<?php
					    			$no = 0;

					    			while($row = mysqli_fetch_array($result)){
					    				$no++;
					    				echo'<tr>
					    					<td>'.$no.'</td>
					    					<td>'.$row['nm_wisudawan'].'</td>
					    					<td>'.$row['npm'].'</td>
					    					<td>'.$row['tempat_lahir'].'</td>
					    					<td>'.$row['ttl'].'</td>
					    					<td>'.$row['program_studi'].'</td>
					    					<td>'.$row['ipk'].'</td>
					    					<td>'.$row['predikat'].'</td>
					    					<td>'.$row['ayah_ibu'].'</td>
					    					<td>'.$row['judul_skripsi'].'</td>
					    					<td><a class="slide" data-id='.$row['id'].' data-toggle="modal" data-target="#myModal">Update</a></td>
					    				</tr>';

					    			}
					    			?>					    			
					    				
					    			</tbody>
					    		</table>
					    	</div>
					        <script type="text/javascript">
					        	$(document).ready(function(){

					        		$('.slide').click(function(){
					        			var id = $(this).data('id');

					        			$.ajax({
					        				url:'detail_update.php',
					        				type:'get',
					        				data:'id='+id,
					        				success:function(data){
					        					$('#result').html(data);
					        				}
					        			})
					        		});
					        	});
					        </script>	

					         <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #42f492;">
          <h4 class="modal-title">Update Wisudawan / Wisudawati</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div id="result"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" style="border-top-color: #42f492;">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>				          
					</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>