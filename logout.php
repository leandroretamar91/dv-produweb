<?php

session_start();
session_unset();
$_SESSION['isLogged'] = false;

header("Location: index.php");