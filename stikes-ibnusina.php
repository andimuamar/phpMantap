<?php 
include('header.php'); 
require_once('koneksi.php');

$sql = "SELECT * FROM wisudawan WHERE kampus = 'stikes' ORDER BY nm_wisudawan ASC";
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
					    	<div class="row">
					    		<?php 

					    		while($row = mysqli_fetch_array($result)){

					    			echo '<a class="slide" data-id="'.$row['id'].'" data-toggle="modal" data-target="#myModal">
							                <div class="col-lg-3" style="margin-bottom:20px;">
							                    <div class="card">
							                        <img src="img/'.$row['foto'].'">
							                        <p style="text-align: center;">Nama : '.$row['nm_wisudawan'].'<br>'.strtoupper($row['kampus']).' Ibnusina Batam</p>					                        
							                        <a href="blog-ici.html"></a>
							                    </div>
							                </div>
							            </a>';
					    		}

					            ?>				            
					        </div>
					        <script type="text/javascript">
					        	$(document).ready(function(){

					        		$('.slide').click(function(){
					        			var id = $(this).data('id');

					        			$.ajax({
					        				url:'detail.php',
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
        <div class="modal-header">
          <h4 class="modal-title">Detail Wisudawan / Wisudawati</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div id="result"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>				        
					</div>
			</div>
		</div>
	</div>
	
</body>
</html>