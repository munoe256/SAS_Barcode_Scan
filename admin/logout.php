<?php

session_start();

unset($_SESSION['staffno']);
unset($_SESSION['admin']);

header('Location: index.php');

?>