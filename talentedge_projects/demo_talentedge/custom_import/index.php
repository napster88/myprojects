<!DOCTYPE html>
<?php 
include 'db.php';
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Talentedge Batch syncing</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">
	</head>
	<body>    

	<!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Talentedge Batch syncing</a>
				
			</div>
		</div>
	</div>
       
	<div id="wrap">
	<div class="container">
            
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
                             <a href="index.php">Batch</a> &nbsp | &nbsp <a href="institute_update.php">Institute</a>
				<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV/Excel File:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		

		<table class="table table-bordered">
			<thead>
				  	<tr>
                                                <th>Sr.No.</th>
				  		<th>Batch ID</th>
				  		<th>Name</th>
                                                <th>Status</th>
                                                
                                                <th>post_type</th>
                                                <th>batch_code</th>
                                                <th>institue_id</th>
                                                <th>institue_key</th>
                                                <th>product_parent_id</th>
                                                <th>crm_programme_id</th>
                                                <th>crm_id_programme</th>
                                       
				  	
				 		
				 
				  	</tr>	
				  </thead>
			<?php
	     $SQLSELECT = "SELECT p.id,p.post_title,p.post_status,p.post_type,
                            max( CASE WHEN tp.meta_key = 'batch_name' and p.ID = tp.post_id THEN tp.meta_value END ) as batch_code,
                            max( CASE WHEN tp.meta_key = 'c_institute' and p.ID = tp.post_id THEN tp.meta_value END ) as institue_id,
                            max( CASE WHEN tp.meta_key = '_institue' and p.ID = tp.post_id THEN tp.meta_value END ) as institue_key,
                            max( CASE WHEN tp.meta_key = 'product_parent' and p.ID = tp.post_id THEN tp.meta_value END ) as product_parent_id,
                            max( CASE WHEN tp.meta_key = 'crm_programme_id' and p.ID = tp.post_id THEN tp.meta_value END ) as crm_programme_id,
                            max( CASE WHEN tp.meta_key = 'crm_id_programme' and p.ID = tp.post_id THEN tp.meta_value END ) as crm_id_programme
                            FROM `te_postmeta` tp
LEFT join te_posts p on tp.post_id=p.id where p.post_type='product' and p.id in (19550,325,1016,1049,1051,1058,7208,1060,1360,17629,6652,7126,24076,6697,1062,975,19155,16775,7380,23879,25949,7544,25332,16055,15950,1035,36879,36995,25121,19657,
327,1342,18556,37641,
977,985,1012,1024,1033,1040,1262,1344,1356,1358,6758,7211,15891,17283,21690,22142,22571,23726,27595,31846,31977,35006,36212,
1037,1053,1056,1064,1329,1330,1349,1350,1353,6700,7202,14413,17605,17875,23879,25121,25317,26275,29345,31668,33775,33808,36879,36995,37416,37670,37671,7175,25174) 
GROUP by p.ID";
				$result_set =  mysqli_query($conn,$SQLSELECT);
                                $i=1;
				while($row = mysqli_fetch_array($result_set))
				{
				?>
			
					<tr>    
                                                <td><?php echo $i; ?></td>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['post_title']; ?></td>
						<td><?php echo $row['post_status']; ?></td>
                                                <td><?php echo $row['post_type']; ?></td>
                                                
                                                <td><?php echo $row['batch_code']; ?></td>
                                                <td><?php echo $row['institue_id']; ?></td>
                                                <td><?php echo $row['institue_key']; ?></td>
                                                <td><?php echo $row['product_parent_id']; ?></td>
                                                <td><?php echo $row['crm_programme_id']; ?></td>
                                                <td><?php echo $row['crm_id_programme']; ?></td>
                                                
					</tr>
				<?php
                                 $i++;
				}
			?>
		</table>
	</div>

	</div>

	</body>
</html>
