<?php

	//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  //echo "Type: " . $_FILES["file"]["type"] . "<br />";
 // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
 // echo "Stored in: " . $_FILES["file"]["tmp_name"];
$filename = time().substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));  
$response = array();  
/*
if(move_uploaded_file($_FILES['photo']['tmp_name'], $filename)){  
    $response['isSuccess'] = true;  
    $response['name'] = $name;  
    $response['gender'] = $gender;  
    $response['photo'] = $filename;  
}else{  
    $response['isSuccess'] = false;  
}  
*/
echo "123";
echo json_encode($response);  
?>
