<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/notas_uv/resources/'; // Relative to the root

$someVar = $_POST['someKey'];

if (!empty($_FILES) ) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$id = md5(uniqid());
	$targetFile = rtrim($targetPath,'/') . '/' .$id. $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
        move_uploaded_file($tempFile,$targetFile);
        echo $id.$_FILES['Filedata']['name'];
        
        
//	if (in_array($fileParts['extension'],$fileTypes)) {
//		move_uploaded_file($tempFile,$targetFile);
//		echo $id.$_FILES['Filedata']['name'];
//	} else {
//		echo 'Invalid file type.';
//	}
}
function get_image()
{
    $someVar = $_POST['someKey'];
    return $someVar;
}
?>
