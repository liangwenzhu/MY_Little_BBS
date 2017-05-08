<?php
   session_start();
   /**/
   unset( $_SESSION [ 'username' ]);
   unset($_SESSION['userid']);
   echo "success";
   
   /*
   if(unset( $_SESSION [ 'username' ]) &&  unset($_SESSION['userid'])){
       
   }else{
       echo "未知错误";
   }
   */
?>
