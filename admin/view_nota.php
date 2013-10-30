<?php
require_once('../connections/conn.php'); 
require_once ('../config/config.php');

if (isset($_SESSION['nt_user_id'])) {
	if ($_GET['note'] == '') {
	header('location:'.ROOT_URL.$_SESSION['nt_user_id'].'/ver_nota/');
	exit;
	}
}

//print_r($_SESSION);
Class_restrict::restrict_page();
//include('header.php'); 


?>
<!DOCTYPE html>
<html lang="es">
<head>
        
<?php include_once '../public_head.php'; ?>    
		
</head>

<body>
<?php include_once '../header.php'; ?> 

    
    
<?php include('../footer.php'); ?>
</body>
</html>