<?php
session_start();
unset($_SESSION["ID"]);
unset($_SESSION["ROLE"]);
unset($_SESSION["NAME"]);
header("Location:../index.php");
?>


