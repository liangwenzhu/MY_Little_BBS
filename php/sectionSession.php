<?php
   session_start();
    $sectionId = $_POST[sectionId];
    $_SESSION['sessionid'] = $sectionId;
	//echo $_SESSION['sessionid'];
?>
