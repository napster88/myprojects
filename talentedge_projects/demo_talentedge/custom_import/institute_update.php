<!DOCTYPE html>
<?php 
include 'db.php';
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Talentedge Institute syncing</title>
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
				<a class="brand" href="#">Talentedge Institute syncing</a>
				
			</div>
		</div>
	</div>
       
	<div id="wrap">
	<div class="container">
            
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
                             <a href="index.php">Batch</a> &nbsp | &nbsp <a href="institute_update.php">Institute</a>
                             <form class="form-horizontal well" action="institute_import.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
                                                <th>Institue key</th>
                                        
                                       
				  	
				 		
				 
				  	</tr>	
				  </thead>
			<?php
	     $SQLSELECT = "SELECT p.id,p.post_title,p.post_status,p.post_type,
max( CASE WHEN tp.meta_key = 'field_59075aff790ec' and p.ID = tp.post_id THEN tp.meta_value END ) as institue_key
FROM `te_postmeta` tp
LEFT join te_posts p on tp.post_id=p.id where p.post_type='institute' and p.id in (44,315,318,319,1066,6546,6542,323,1068,316,36871) 
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
                                                <td><?php echo $row['institue_key']; ?></td>
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
