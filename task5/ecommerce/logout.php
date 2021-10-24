<?php
session_start();
include_once "app/middleware/auth.php";
unset($_SESSION['user']);
header('location:login.php');