<?php
      session_start();
      unset($_SESSION['auth']);
      setcookie('rememberme','',0,'/');
      echo 'logout'; 
?>
