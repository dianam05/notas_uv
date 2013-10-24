<?php
require_once('connections/conn.php'); 
require_once ('config/config.php');
//print_r($_SESSION);
Class_restrict::restrict_page();
//include('header.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
        
<?php include_once 'public_head.php'; ?>    
		
</head>

<body>
<?php include_once 'header.php'; ?> 

			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Admin</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						
					</div>
				</div>
			</div>
					
			

			

		  
       
<?php include('footer.php'); ?>
</body>
</html>