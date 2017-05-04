<?php
/*
if(
        ($_FILES["file"]["type"] !== "image/gif")
    && ($_FILES["file"]["type"] !== "image/jpeg")
    && ($_FILES["file"]["type"] !== "image/png")
    && ($_FILES["file"]["type"] !== "image/pjpeg")
){
    echo "error format";
}else*/
	if($_FILES["file"]["size"] > 102400){
            echo "error size";
}elseif($_FILES["file"]["error"] > 0){
    echo "error";
}else{
    $_FILES["file"]["name"] = md5($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/" . $_FILES["file"]["name"]);

    include ('conn.php');
    session_start();
    $userhead = $_FILES["file"]["name"];
    $username = $_SESSION['username'];
    $sql = "UPDATE Users
        SET userHead = '$userhead'
        WHERE userName = '$username'";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo $userhead;
    }
    mysql_close($con);
   // echo $_FILES["file"]["name"];
}

//
//if ((($_FILES["file"]["type"] == "image/gif")
//        || ($_FILES["file"]["type"] == "image/jpeg")
//        || ($_FILES["file"]["type"] == "image/png")
//        || ($_FILES["file"]["type"] == "image/pjpeg"))
//    && ($_FILES["file"]["size"] < 200000))
//{
//    if ($_FILES["file"]["error"] > 0)
//    {
//        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
//    }
//    else
//    {
//        $_FILES["file"]["name"] = md5($_FILES["file"]["name"]);
//        if (file_exists("upload/" . $_FILES["file"]["name"]))
//        {
//        }
//        else
//        {
//            move_uploaded_file($_FILES["file"]["tmp_name"],
//                "upload/" . $_FILES["file"]["name"]);
//        }
//    }
//}
//else
//{
//    echo "error";
//}

?>
