<?php
require 'connect.php';
session_start();

//On page 2
$var_value = $_SESSION['varname'];
echo $_SESSION['varname'];

$AccountCredentials = [
    'MemberName' => $_SESSION['user'],
    'MemberEmail' => $_SESSION['email'],
    'MemberId'    =>$_SESSION['id']
];
echo json_encode($AccountCredentials);