<?php
#start session:
session_start();

unset($_SESSION['logout']);


header('Location: index.php');

?>