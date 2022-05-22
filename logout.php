<?php
// logout the user when the press the button logout on the navbar
    session_start();
     $_SESSION = array();
     session_destroy();
     header ('Location: index.php');
?>