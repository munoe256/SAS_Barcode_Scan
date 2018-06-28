<?php

session_start();
If(!isset($_SESSION['fullname'])){
	header('Location: login.php');
}
If(!isset($_SESSION['accesslevel'])){
	header('Location: login.php');
}
If(!isset($_SESSION['fullname'])){
	header('Location: login.php');
}
If(!isset($_SESSION['username'])){
	header('Location: login.php');
}
If(!isset($_SESSION['surname'])){
	header('Location: login.php');
}
If(!isset($_SESSION['counter'])){
	header('Location: login.php');
}
?>