<?php
   session_start();
   if(session_destroy()){
       echo "success";
   }else{
       echo "未知错误";
   }
?>
